<?php
namespace OpenPhoneBook\WebBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @author djungowski
 * 
 * @group functional
 *
 */
class PhonebookControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/phonebook');
        $this->assertRegExp('/"record":\[.*\]/', $crawler->text());
        $this->assertRegExp('/"total":[0-9]+/', $crawler->text());
    }
}
