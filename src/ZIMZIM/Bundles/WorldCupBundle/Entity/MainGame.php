<?php

namespace ZIMZIM\Bundles\WorldCupBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use APY\DataGridBundle\Grid\Mapping as GRID;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * MainGame
 *
 * @ORM\Table(name="worldcup_maingame")
 * @ORM\Entity
 */
class MainGame
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @GRID\Column(visible=false, sortable=false, filterable=false, title="grid.columns.game.id")
     */
    private $id;

    /**
     * @var string
     *
     * @GRID\Column(field="name", title="grid.columns.maingame.name",operatorsVisible=false, source=true, filter="select")
     *
     * @ORM\Column(name="name", type="string", length=255)
    */
    private $name;

    /** @var string
    *
     * @GRID\Column(operatorsVisible=false, filterable=false, visible=false)
     * @ORM\Column(name="text", type="text")
    */
    private $text;

    /**
     * @var \DateTime
     *
     * @GRID\Column(operatorsVisible=false, filterable=false, visible=false)
     * @ORM\Column(name="dateStart", type="datetime")
     */
    private $dateStart;

    /**
     * @var \DateTime
     *
     *
     * @GRID\Column(operatorsVisible=false, filterable=false, visible=false)
     * @ORM\Column(name="dateEnd", type="datetime")
     */
    private $dateEnd;

    /**
     * @var \DateTime
     *
     * @GRID\Column(operatorsVisible=false, filterable=false, visible=false)
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     * @GRID\Column(operatorsVisible=false, filterable=false, visible=false)
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="ZIMZIM\Bundles\WorldCupBundle\Entity\Game", mappedBy="mainGame", cascade={"persist"})
     */
    private $games;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="ZIMZIM\Bundles\WorldCupBundle\Entity\ClientGame", mappedBy="MainGame")
     */
    private $clientGames;


    public function __construct(){
        $this->games = new ArrayCollection();
        $this->clientGames = new ArrayCollection();
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
     * @return MainGame
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

    /**
     * Set dateStart
     *
     * @param \DateTime $dateStart
     * @return MainGame
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    /**
     * Get dateStart
     *
     * @return \DateTime 
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * Set dateEnd
     *
     * @param \DateTime $dateEnd
     * @return MainGame
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    /**
     * Get dateEnd
     *
     * @return \DateTime 
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return MainGame
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return MainGame
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $games
     */
    public function setGames($games)
    {
        $this->games = $games;

        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getGames()
    {
        return $this->games;
    }

    public function addGame(Game $game)
    {
        if (!$this->games->contains($game)) {
            $game->addMainGame($this);
            $this->games[] = $game;
        }

        return $this;
    }

    public function removeGame(Game $game)
    {
        if (!$this->games->contains($game)) {

            $this->games->removeElement($game);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $clientGame
     */
    public function setClientGames($clientGames)
    {
        $this->clientGames = $clientGames;

        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getClientGames()
    {
        return $this->clientGames;
    }


}
