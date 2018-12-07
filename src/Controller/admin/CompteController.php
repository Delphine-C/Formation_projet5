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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CompteController extends Controller
{
    /**
     * @Route("/compte/{id}", name="compte")
     */
    public function compte($id, Request $request, CompteCRUD $compteCrud, UserPasswordEncoderInterface $encoder)
    {
        $user = $compteCrud->getCompte($id);
        $form = $this->createForm(CompteType::class, $user)
            ->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $encoded = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encoded);
            $compteCrud->saveCompte($user);
            return $this->redirectToRoute('dashboard');
        }

        return $this->render('admin/compte.html.twig',[
            'form' => $form->createView(),
            'compte' => $user,
        ]);
    }
}