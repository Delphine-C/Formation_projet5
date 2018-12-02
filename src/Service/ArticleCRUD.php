<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 02/12/2018
 * Time: 20:32
 */

namespace App\Service;

use Doctrine\Common\Persistence\ObjectManager;

class ArticleCRUD
{
    private $em;

    public function __construct(ObjectManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function getArticles()
    {
        $articles = $this->em
            ->getRepository('AppBundle:Article')
            ->findAll();

        return $articles;
    }
}