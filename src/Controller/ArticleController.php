<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 03/12/2018
 * Time: 18:25
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\ArticleCRUD;

class ArticleController extends Controller
{
    /**
     * @Route("/article/{id}",name="article_page")
     */
    public function articleAction($id, ArticleCRUD $CRUD)
    {
        $article = $CRUD->getArticle($id);

        return $this->render('article.html.twig', ['article' => $article]);
    }
}