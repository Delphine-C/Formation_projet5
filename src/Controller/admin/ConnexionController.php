<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 21/11/2018
 * Time: 16:34
 */

namespace App\Controller\admin;

use App\Form\ConnexionType;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ConnexionController extends Controller
{
    /**
     * @Route("/connexion",name="connexion_page")
     */
    public function connexion(Request $request)
    {
        $user = new User();
        $form = $this->createForm(ConnexionType::class, $user);
        if($request->isMethod('POST')){
            $form->handleRequest($request);
            return $this->render('home.html.twig');
        }

        return $this->render('admin/connexion.html.twig', [
            'form' => $form->createView()
        ]);
    }
}