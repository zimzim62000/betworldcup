<?php

namespace ZIMZIM\Test\Calculate;


use ZIMZIM\Bundles\WorldCupBundle\Calculate\Score;

class ScoreTest extends \PHPUnit_Framework_TestCase
{
    /*
    public function testCalculWithoutData()
    {

        $emMock = $this->getMockBuilder('Doctrine\ORM\EntityManager')
            ->disableOriginalConstructor()
            ->getMock();

        $repositoryUserMock = $this->getMockBuilder('Doctrine\ORM\EntityRepository')
            ->disableOriginalConstructor()
            ->getMock();

        $repositoryUserMock->expects($this->once())
            ->method('findBy')
            ->will($this->returnValue(array()));

        $emMock->expects($this->once())
            ->method('getRepository')
            ->will($this->returnValue($repositoryUserMock));

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


    public function testCalculWithOneGameWithoutUser()
    {

        $emMock = $this->getMockBuilder('Doctrine\ORM\EntityManager')
            ->disableOriginalConstructor()
            ->getMock();

        $repositoryUserMock = $this->getMockBuilder('Doctrine\ORM\EntityRepository')
            ->disableOriginalConstructor()
            ->getMock();

        $repositoryUserMock->expects($this->once())
            ->method('findBy')
            ->will($this->returnValue(array()));

        $emMock->expects($this->once())
            ->method('getRepository')
            ->will($this->returnValue($repositoryUserMock));

        $gamePointMock = $this->getMockBuilder('ZIMZIM\Bundles\WorldCupBundle\Calculate\GamePoint')
            ->disableOriginalConstructor()
            ->getMock();

        $gameMock = $this->getMockBuilder('ZIMZIM\Bundles\WorldCupBundle\Entity\Game')
            ->disableOriginalConstructor()
            ->getMock();
        $gameMock->expects($this->once())
            ->method('getId')
            ->will($this->returnValue(117));

        $games = array($gameMock);

        $Score = new Score($emMock, $gamePointMock);

        $expected = array('117' => array());
        $return = $Score->calcul($games);

        $this->assertEquals($expected, $return);
    }

    public function testCalculWithOneGameWithOneUserWithoutData()
    {

        $emMock = $this->getMockBuilder('Doctrine\ORM\EntityManager')
            ->disableOriginalConstructor()
            ->getMock();

        $userMock = $this->getMockBuilder('ZIMZIM\Bundles\UserBundle\Entity\User')
            ->disableOriginalConstructor()
            ->getMock();
        $userMock->expects($this->once())
            ->method('getUsername')
            ->will($this->returnValue('zimzim'));
        $usersMock = array($userMock);

        $repositoryUserMock = $this->getMockBuilder('Doctrine\ORM\EntityRepository')
            ->disableOriginalConstructor()
            ->getMock();
        $repositoryUserMock->expects($this->once())
            ->method('findBy')
            ->will($this->returnValue($usersMock));

        $repositoryUserBetMock = $this->getMockBuilder('Doctrine\ORM\EntityRepository')
            ->disableOriginalConstructor()
            ->getMock();
        $repositoryUserBetMock->expects($this->once())
            ->method('findOneBy')
            ->will($this->returnValue(false));

        $emMock->expects($this->at(0))
            ->method('getRepository')
            ->with($this->equalTo('ZIMZIMBundlesUserBundle:User'))
            ->will($this->returnValue($repositoryUserMock));

        $emMock->expects($this->at(1))
            ->method('getRepository')
            ->with($this->equalTo('ZIMZIMBundlesWorldCupBundle:UserBet'))
            ->will($this->returnValue($repositoryUserBetMock));

        $gamePointMock = $this->getMockBuilder('ZIMZIM\Bundles\WorldCupBundle\Calculate\GamePoint')
            ->disableOriginalConstructor()
            ->getMock();

        $gameMock = $this->getMockBuilder('ZIMZIM\Bundles\WorldCupBundle\Entity\Game')
            ->disableOriginalConstructor()
            ->getMock();
        $gameMock->expects($this->exactly(2))
            ->method('getId')
            ->will($this->returnValue(117));

        $games = array($gameMock);

        $Score = new Score($emMock, $gamePointMock);

        $expected = array(
            '117' => array(
                array(
                    'user' => 'zimzim',
                    'points' => 0,
                    'score' => 'NR - NR'
                )
            )
        );
        $return = $Score->calcul($games);

        $this->assertEquals($expected, $return);
    }
    */
}