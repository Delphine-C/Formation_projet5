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
use App\Service\Userlogin;
use App\Service\ArticleCRUD;

class DashboardController extends Controller
{
    /**
     * @Route("/dashboard",name="dashboard")
     */
    public function connexion(Userlogin $userlogin, ArticleCRUD $articleCRUD)
    {
        // if user is not login
        $user = $this->getUser();
        $userlogin->testLoggedInUser($user);

        $authorId = $user->getId();
        $ownArticles = $articleCRUD->getOwnArticles($authorId);

        $otherArticles = $this->getDoctrine()->getManager()
            ->getRepository(Article::class)
            ->otherArticles($authorId);

        return $this->render('admin/dashboard.html.twig', [
            'own_articles' => $ownArticles,
            'other_articles' => $otherArticles,
        ]);
    }
}