<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 21/11/2018
 * Time: 16:34
 */

namespace App\Controller\admin;

use App\Entity\Article;
use App\Form\CompteType;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CompteController extends Controller
{
    /**
     * @Route("/compte",name="compte")
     */
    public function compte()
    {
        $userId = $this->getUser()->getId();
        $repository = $this->getDoctrine()->getManager()->getRepository(User::class);
        $compte = $repository->findOneBy(
            ['id' => $userId]
        );
        $user = new User();
        $form = $this->createForm(CompteType::class, $user, array(
        ));

        return $this->render('admin/compte.html.twig',[
            'form' => $form->createView(),
            'compte' => $compte,
        ]);
    }
}