<?
namespace tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class APITest extends WebTestCase
{
    public function testApi()
    {
        $client = static::createClient();

        $client->request('GET', '/api/classification');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $client->request('GET', '/api/race/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals(22, count(json_decode($client->getResponse()->getContent())));

        $client->request('GET', '/api/pilot/1212');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals(0, count(json_decode($client->getResponse()->getContent())));

        $client->request('GET', '/api/pilot/5fd7dbd8425291733653f7a1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals(10, count(json_decode($client->getResponse()->getContent())));
    }
}