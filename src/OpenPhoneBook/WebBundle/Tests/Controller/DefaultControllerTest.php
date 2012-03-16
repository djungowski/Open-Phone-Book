<?php

namespace OpenPhoneBook\WebBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');
        $this->assertTrue($crawler->filter('title:contains("Phone")')->count() > 0);
        $this->assertRegExp('/extjs/', $crawler->text());
    }
}
