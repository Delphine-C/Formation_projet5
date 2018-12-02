<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 21/11/2018
 * Time: 16:30
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\ArticleCRUD;

class BlogPageController extends Controller
{
    /**
     * @Route("/blog",name="blog_page")
     */
    public function blog(ArticleCRUD $CRUD)
    {
        $articles = $CRUD->getArticles();
        //return $this->render('blog.html.twig', ['articles' => $articles]);
        return $this->render('blog.html.twig');
    }
}