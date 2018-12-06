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
use Symfony\Component\HttpFoundation\Response;
class JqueryController extends Controller
{
    /**
     * @Route("/jquery-display-article",name="jquery-display-article")
     */
    public function connexion(Request $request)
    {
        $data = $request->query->get('display');
        $user = $this->getUser();
        $articles = [];
        $fullUsername = $user->getFirstname().' '.$user->getLastname();
        $repository = $this->getDoctrine()->getManager()->getRepository(Article::class);
        if($data === 'admin'){
            $ownArticles = $repository->findBy(
                array('author' => $fullUsername), // Critere
                array('date' => 'desc'),        // Tri
                5,                              // Limite
                0                               // Offset
            );
            foreach ($ownArticles as $article){
                $articles[] = [
                    'id'=>$article->getId(),
                    'title'=>$article->getTitle(),
                    'author'=>$article->getAuthor(),
                    'content'=>$article->getContent(),
                    'date'=>$article->getDate()
                ];
            }
            $response = new Response();
            $tabArticle = json_encode(array('article' => $articles));
            $response->headers->set('Content-Type', 'application/json');
            $response->setContent($tabArticle);
            return $this->render('admin/include_admin_articles.html.twig',[
                'other_articles' => $response,
            ]);
        }
    }
}