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
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
class JqueryController extends Controller
{
    /**
     * @Route("/jquery-display-article",name="jquery-display-article")
     */
    public function connexion(Request $request)
    {
        // if user is not login
        $user = $this->getUser();
        if (is_null($user)) {
            $this->addFlash('error', "Veuillez vous connecter pour accéder à cette page.");
            return $this->redirectToRoute("connexion");
        }

        $data = $request->query->get('display');
        $articles = [];
        $fullUsername = $user->getFirstname().' '.$user->getLastname();
        $repository = $this->getDoctrine()->getManager()->getRepository(Article::class);
        if($data === 'admin'){
            $ownArticles = $repository->findAll();
            foreach ($ownArticles as $article){
                $articles[] = [
                    'id'=>$article->getId(),
                    'title'=>$article->getTitle(),
                    'author'=>$article->getAuthor(),
                    'content'=>$article->getContent(),
                    'date'=>$article->getDate()
                ];
            }
            $content = $this->render('admin/include_admin_articles.html.twig', array('other_articles'=>$articles))->getContent();
            return $response = new Response($content);
        }else{
            return $response = new Response("user");
        }
    }
}