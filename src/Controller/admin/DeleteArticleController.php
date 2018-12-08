<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 05/12/2018
 * Time: 15:11
 */

namespace App\Controller\admin;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Service\ArticleCRUD;
use App\Service\Userlogin;

class DeleteArticleController extends Controller
{
    /**
     * @Route("/supprimer-article/{id}",name="delete_article")
     */
    public function deleteArticle($id, ArticleCRUD $articleCRUD,Userlogin $userlogin)
    {
        // if user is not login
        $user = $this->getUser();
        $userlogin->testLoggedInUser($user);

        // if user is not an admin
        $role = $this->getUser()->getAccount();

        if($role === "ROLE_ADMIN"){
            $articleCRUD->deleteArticle($id);
        }

        return $this->redirectToRoute('dashboard');
    }
}