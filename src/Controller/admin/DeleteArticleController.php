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

class DeleteArticleController extends Controller
{
    /**
     * @Route("/supprimer-article/{id}",name="delete_article")
     */
    public function deleteArticle($id, ArticleCRUD $articleCRUD)
    {
        // if user is not login
        $user = $this->getUser();
        if (is_null($user)) {
            $this->addFlash('error', "Veuillez vous connecter pour accéder à cette page.");
            return $this->redirectToRoute("connexion");
        }

        // if user is not an admin
        $role = $this->getUser()->getAccount();

        if($role === "ROLE_ADMIN"){
            $articleCRUD->deleteArticle($id);
        }

        return $this->redirectToRoute('dashboard');
    }
}