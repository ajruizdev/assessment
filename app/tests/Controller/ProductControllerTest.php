<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductControllerTest extends WebTestCase
{
    public function testList()
    {
        $client = static::createClient();
        $client->request('GET', '/products');

        $this->assertResponseIsSuccessful();
    }

    public function testListWithCategoryParam()
    {
        $client = static::createClient();
        $client->request('GET', '/products?category=boots');

        $this->assertResponseIsSuccessful();
    }

    public function testListWithPricesLessThanParam()
    {
        $client = static::createClient();
        $client->request('GET', '/products?pricesLessThan=80000');

        $this->assertResponseIsSuccessful();
    }

    public function testListWithCategoryAndPricesLessThanParams()
    {
        $client = static::createClient();
        $client->request('GET', '/products?category=test&pricesLessThan=80000');

        $this->assertResponseIsSuccessful();
    }
}
