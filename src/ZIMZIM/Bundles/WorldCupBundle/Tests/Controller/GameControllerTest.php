<?php

namespace ZIMZIM\Bundles\WorldCupBundle\Tests\Controller;

use ZIMZIM\Test\ZimzimWebTestCase;

class GameControllerTest extends ZimzimWebTestCase
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
        $route = $this->router->generate('zimzim_worldcup_game');
        $crawler = $this->client->request('GET', $route);
        $this->assertEquals(
            200,
            $this->client->getResponse()->getStatusCode(),
            "Unexpected HTTP status code for GET " . $route
        );
    }

    public function testShow()
    {
        $route = $this->router->generate('zimzim_worldcup_game_show', array('id' => 1));
        $crawler = $this->client->request('GET', $route);
        $this->assertEquals(
            200,
            $this->client->getResponse()->getStatusCode(),
            "Unexpected HTTP status code for GET " . $route
        );
    }

    public function testNew()
    {
        $route = $this->router->generate('zimzim_worldcup_game_new');
        $crawler = $this->client->request('GET', $route);
        $this->assertEquals(
            200,
            $this->client->getResponse()->getStatusCode(),
            "Unexpected HTTP status code for GET " . $route
        );
    }

    public function testEdit()
    {
        $route = $this->router->generate('zimzim_worldcup_game_edit', array('id' => 1));
        $crawler = $this->client->request('GET', $route);
        $this->assertEquals(
            200,
            $this->client->getResponse()->getStatusCode(),
            "Unexpected HTTP status code for GET " . $route
        );
    }

}
