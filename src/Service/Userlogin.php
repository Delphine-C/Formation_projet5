<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 08/12/2018
 * Time: 15:27
 */

namespace App\Service;


class Userlogin
{
    public function testLoggedInUser($user)
    {
        if (is_null($user)) {
            $this->addFlash('error', "Veuillez vous connecter pour accéder à cette page.");

            return $this->redirectToRoute("connexion");
        }
    }
}