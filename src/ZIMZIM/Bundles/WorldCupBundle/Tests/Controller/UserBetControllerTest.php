<?php

namespace ZIMZIM\Bundles\WorldCupBundle\Tests\Controller;

use ZIMZIM\Test\ZimzimWebTestCase;

class UserBetControllerTest extends ZimzimWebTestCase
{
    public $client;
    public $router;

    public function setUp()
    {
        parent::setUp();

        $this->client = static::createClient(array(), $this->users['SuperAdmin']);
        $this->router = $this->client->getContainer()->get('router');
    }

    public function testIndex()
    {
        $route = $this->router->generate('zimzim_worldcup_userbet');
        $crawler = $this->client->request('GET', $route);
        $this->assertEquals(
            200,
            $this->client->getResponse()->getStatusCode(),
            "Unexpected HTTP status code for GET " . $route
        );
    }

    public function testBetWithGame()
    {
        $route = $this->router->generate('zimzim_worldcup_userbet_with_game', array('id' => 5));
        $crawler = $this->client->request('GET', $route);
        $this->assertEquals(
            200,
            $this->client->getResponse()->getStatusCode(),
            "Unexpected HTTP status code for GET " . $route
        );
    }

}
