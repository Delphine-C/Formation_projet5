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
     * @Route("/delete/{id}",name="delete_article")
     */
    public function deleteArticle($id, ArticleCRUD $articleCRUD)
    {
        $articleCRUD->deleteArticle($id);

        return $this->redirectToRoute('dashboard');
    }
}