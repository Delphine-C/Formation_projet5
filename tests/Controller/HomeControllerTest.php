<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 21/12/2018
 * Time: 19:18
 */

namespace App\Tests\Controller;

use App\Controller\HomeController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerTest extends WebTestCase
{
    public function testAccessHomepage()
    {
        $client = static::createClient();
        $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}