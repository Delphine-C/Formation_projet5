<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 21/11/2018
 * Time: 16:34
 */

namespace App\Controller\admin;

use App\Form\CompteType;
use App\Entity\User;
use App\Service\CompteCRUD;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ComptesController extends Controller
{
    /**
     * @Route("/comptes", name="comptes")
     */
    public function comptes(Request $request, CompteCRUD $compteCrud)
    {
        $user = new User();
        $users = $compteCrud->getComptes();
        $form = $this->createForm(CollectionType::class, $users, [
            "entry_type" => CompteType::class,
            "entry_options" => ['label'=> false]
        ])
            ->handleRequest($request);
        return $this->render('admin/comptes.html.twig',[
            'form' => $form->createView(),
            "comptes" => $users
        ]);
    }
}