<?php

namespace ZIMZIM\Bundles\WorldCupBundle\Tests\Controller;

use ZIMZIM\Test\ZimzimWebTestCase;

class ScoreControllerTest extends ZimzimWebTestCase
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
        $route = $this->router->generate('zimzim_worldcup_score');
        $crawler = $this->client->request('GET', $route);
        $this->assertEquals(
            200,
            $this->client->getResponse()->getStatusCode(),
            "Unexpected HTTP status code for GET " . $route
        );
    }
}
