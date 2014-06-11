<?php

namespace ZIMZIM\Test\Calculate;


use ZIMZIM\Bundles\WorldCupBundle\Calculate\Score;

class ScoreTest extends \PHPUnit_Framework_TestCase
{
    public function testCalculWithoutData(){

        $emMock = $this->getMockBuilder('Doctrine\ORM\EntityManager')
            ->disableOriginalConstructor()
            ->getMock();

        $repositoryMock = $this->getMockBuilder('ZIMZIM\Bundles\WorldCupBundle\Entity\GameRepository')
            ->disableOriginalConstructor()
            ->getMock();

        $repositoryMock->expects($this->once())
            ->method('findAll')
            ->will($this->returnValue(array()));

        $emMock->expects($this->once())
            ->method('getRepository')
            ->will($this->returnValue($repositoryMock));

        $gamePointMock = $this->getMockBuilder('ZIMZIM\Bundles\WorldCupBundle\Calculate\GamePoint')
            ->disableOriginalConstructor()
            ->getMock();

        $gameMock = $this->getMockBuilder('ZIMZIM\Bundles\WorldCupBundle\Entity\Game')
            ->disableOriginalConstructor()
            ->getMock();

        $games = array();

        $Score = new Score($emMock, $gamePointMock);

        $expected = array();
        $return = $Score->calcul($games);

        $this->assertEquals($expected, $return);

    }

}