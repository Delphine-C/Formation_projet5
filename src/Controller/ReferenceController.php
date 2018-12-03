<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 21/11/2018
 * Time: 16:34
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ReferenceController extends Controller
{
    /**
     * @Route("/references",name="reference_page")
     */
    public function getReferencesAction()
    {
        return $this->render("references.html.twig");
    }
}