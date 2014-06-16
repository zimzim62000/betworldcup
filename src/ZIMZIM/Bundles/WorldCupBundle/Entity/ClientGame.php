<?php

namespace ZIMZIM\Bundles\WorldCupBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use APY\DataGridBundle\Grid\Mapping as GRID;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * UserMainGame
 *
 * @ORM\Table(name="worldcup_clientgame")
 * @ORM\Entity
 */
class ClientGame
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
     * @GRID\Column(field="name", title="grid.columns.maingame.name",operatorsVisible=false, source=true, filter="select")
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     *
     * @GRID\Column(field="user.username", title="User",operatorsVisible=false, source=true, filter="select")
     *
     * @ORM\ManyToOne(targetEntity="ZIMZIM\Bundles\UserBundle\Entity\User", inversedBy="usersMainGame")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id", nullable=false)
     */
    private $user;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="ZIMZIM\Bundles\WorldCupBundle\Entity\UserClientGame", mappedBy="clientGame")
     */
    private $usersClientGame;

    /**
     * @var \ZIMZIM\Bundles\WorldCupBundle\Entity\MailGame
     *
     * @GRID\Column(field="mainGame.name", title="mainGame",operatorsVisible=false, source=true, filter="select")
     *
     * @ORM\ManyToOne(targetEntity="ZIMZIM\Bundles\WorldCupBundle\Entity\MainGame", inversedBy="clientGames")
     * @ORM\JoinColumn(name="id_maingame", referencedColumnName="id", nullable=false)
     */
    private $mainGame;

    /**
     * @var integer
     *
     * @ORM\Column(name="enabled", type="integer")
     */
    private $enabled = 1;

    /**
     * @var integer
     *
     * @ORM\Column(name="private", type="integer")
     */
    private $private;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

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
     * Set user
     *
     * @param integer $user
     * @return UserMainGame
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return integer 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set enabled
     *
     * @param integer $enabled
     * @return UserMainGame
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return integer 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return
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
     * @return
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
     * @param \Doctrine\Common\Collections\ArrayCollection $usersClientGame
     */
    public function setUsersClientGame($usersClientGame)
    {
        $this->usersClientGame = $usersClientGame;

        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getUsersClientGame()
    {
        return $this->usersClientGame;
    }

    /**
     * @param \ZIMZIM\Bundles\WorldCupBundle\Entity\MailGame $mainGame
     */
    public function setMainGame($mainGame)
    {
        $this->mainGame = $mainGame;

        return $this;
    }

    /**
     * @return \ZIMZIM\Bundles\WorldCupBundle\Entity\MailGame
     */
    public function getMainGame()
    {
        return $this->mainGame;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param int $private
     */
    public function setPrivate($private)
    {
        $this->private = $private;

        return $this;
    }

    /**
     * @return int
     */
    public function getPrivate()
    {
        return $this->private;
    }



}
