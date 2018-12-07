<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 02/12/2018
 * Time: 20:32
 */

namespace App\Service;

use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;

class CompteCRUD
{
    private $em;

    public function __construct(ObjectManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function getComptes()
    {
        $comptes = $this->em
            ->getRepository(User::class)
            ->findAll();

        return $comptes;
    }

    public function getCompte($id)
    {
        $compte = $this->em
            ->getRepository(User::class)
            ->find($id);

        return $compte;
    }

    public function saveCompte($compte)
    {
        $this->em->persist($compte);
        $this->em->flush();
    }

    public function deleteCompte($id)
    {
        $compte = $this->em
            ->getRepository(User::class)
            ->find($id);

        $this->em->remove($compte);
        $this->em->flush();
    }
}