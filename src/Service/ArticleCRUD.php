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
            ->getRepository('App:Article')
            ->findAll();

        return $articles;
    }

    public function getArticle($id)
    {
        $article = $this->em
            ->getRepository('App:Article')
            ->find($id);

        return $article;
    }

    public function saveArticle($article)
    {
        $this->em->persist($article);
        $this->em->flush();
    }
}