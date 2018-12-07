<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 21/11/2018
 * Time: 16:34
 */

namespace App\Controller\admin;

use App\Form\TaskType;
use App\Entity\User;
use App\Entity\Task;
use App\Service\CompteCRUD;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ComptesController extends Controller
{
    /**
     * @Route("/comptes", name="comptes")
     */
    public function compte(Request $request, CompteCRUD $compteCrud, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $task = new Task();
        $users = $compteCrud->getComptes();
        foreach($users as $user){
            $task->getUsers()->add($user);
        }
        $form = $this->createForm(TaskType::class, $task)
            ->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $encoded = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encoded);
            $compteCrud->saveCompte($user);
            return $this->redirectToRoute('dashboard');
        }

        return $this->render('admin/comptes.html.twig',[
            'form' => $form->createView(),
            'compte' => $user,
        ]);
    }
}