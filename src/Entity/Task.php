<?php
// src/Entity/Task.php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Task
{
    protected $user;

    public function __construct()
    {
        $this->user = new ArrayCollection();
    }

    public function getUsers()
    {
        return $this->user;
    }
}