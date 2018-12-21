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

class ProjectController extends Controller
{
    /**
     * @Route("/project/{project}",name="project_page")
     */
    public function articleAction($project)
    {
        return $this->render('projects/'.$project.'.html.twig');
    }
}