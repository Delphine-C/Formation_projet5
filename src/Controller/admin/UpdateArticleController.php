<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 04/12/2018
 * Time: 16:58
 */

namespace App\Controller\admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ArticleType;
use App\Service\ArticleCRUD;
use Symfony\Component\HttpFoundation\Request;
use App\Service\Userlogin;

class UpdateArticleController extends Controller
{
    /**
     * @Route("/modifier-article/{id}",name="update_article")
     */
    public function updateArticle($id, ArticleCRUD $articleCRUD, Request $request, Userlogin $userlogin)
    {
        // if user is not login
        $user = $this->getUser();
        $userlogin->testLoggedInUser($user);

        $article = $articleCRUD->getArticle($id);
        $authorArticle = $article->getAuthor()->getId();
        $role = $user->getAccount();

        // if article is not by user
        if ($user->getId() === $authorArticle | $role === "ROLE_ADMIN") {
            $form = $this->createForm(ArticleType::class, $article)
                ->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $articleCRUD->saveArticle($article);

                return $this->redirectToRoute("blog_page");
            }
            return $this->render('admin/article.html.twig', ['form' => $form->createView()]);
        }

        return $this->redirectToRoute("dashboard");
    }
}