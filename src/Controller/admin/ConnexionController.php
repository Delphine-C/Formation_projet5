<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 21/11/2018
 * Time: 16:34
 */

namespace App\Controller\admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ConnexionController extends Controller
{
    /**
     * @Route("/connexion",name="connexion_page")
     */
    public function connexion()
    {
        return $this->render('admin/connexion.html.twig');
    }
}