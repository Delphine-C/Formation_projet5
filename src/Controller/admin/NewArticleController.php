<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 04/12/2018
 * Time: 16:22
 */

namespace App\Controller\admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Component\HttpFoundation\Request;
use App\Service\ArticleCRUD;

class NewArticleController extends Controller
{
    /**
     * @Route("/creer-article",name="new_article")
     */
    public function newArticle(Request $request, ArticleCRUD $articleCRUD)
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article)
            ->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $articleCRUD->saveArticle($article);

            return $this->redirectToRoute('blog_page');
        }

        return $this->render('admin/add_article.html.twig', [
            'form'=>$form->createView()
        ]);
    }
}