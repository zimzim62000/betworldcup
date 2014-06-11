<?php

namespace ZIMZIM\Bundles\WorldCupBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 *
 * @ORM\Table(name="worldcup_team")
 * @ORM\Entity
 */
class Team
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="ZIMZIM\Bundles\WorldCupBundle\Entity\Game", mappedBy="teamA")
     */
    private $gamesD;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="ZIMZIM\Bundles\WorldCupBundle\Entity\Game", mappedBy="teamB")
     */
    private $gamesE;


    private $allGame;

    /**
     * @param mixed $allGame
     */
    public function setAllGame($allGame)
    {
        $this->allGame = $allGame;
    }

    /**
     * @return mixed
     */
    public function getAllGame()
    {
        $this->allGame = new ArrayCollection(
            array_merge($this->gamesD->toArray(), $this->gamesE->toArray())
        );
        return $this->allGame;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $gamesD
     */
    public function setGamesD($gamesD)
    {
        $this->gamesD = $gamesD;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getGamesD()
    {
        return $this->gamesD;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $gamesE
     */
    public function setGamesE($gamesE)
    {
        $this->gamesE = $gamesE;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getGamesE()
    {
        return $this->gamesE;
    }



    public function __construct(){
        $this->gamesD = new ArrayCollection();
        $this->gamesE =  new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Team
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    public function __toString(){
        return $this->name;
    }
}
