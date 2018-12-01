<?php
/**
 * Created by PhpStorm.
 * User: Benoit
 * Date: 01/12/2018
 * Time: 19:20
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ProposController extends Controller
{
    /**
     * @Route("/propos",name="propos_page")
     */
    public function contact()
    {
        return $this->render('propos.html.twig');
    }
}