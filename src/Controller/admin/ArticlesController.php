<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 21/11/2018
 * Time: 16:34
 */

namespace App\Controller\admin;

use App\Entity\Article;
use App\Form\ConnexionType;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ArticlesController extends Controller
{
    /**
     * @Route("/articles",name="articles")
     */
    public function connexion()
    {
        // if user is not login
        $user = $this->getUser();
        if (is_null($user)) {
            $this->addFlash('error', "Veuillez vous connecter pour accéder à cette page.");
            return $this->redirectToRoute("connexion");
        }

        $authorId = $user->getId();
        $repository = $this->getDoctrine()->getManager()->getRepository(Article::class);
        $ownArticles = $repository->findBy(
            array('author' => $authorId), // Critere
            array('date' => 'desc'),        // Tri
            5,                              // Limite
            0                               // Offset
        );


        return $this->render('admin/articles.html.twig',[
            'own_articles' => $ownArticles,
        ]);
    }
}