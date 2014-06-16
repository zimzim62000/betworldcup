<?php

namespace ZIMZIM\Bundles\WorldCupBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use APY\DataGridBundle\Grid\Mapping as GRID;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * UserMainGame
 *
 * @ORM\Table(name="worldcup_userclientgame")
 * @ORM\Entity
 */
class UserClientGame
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
     * @GRID\Column(field="email", title="grid.columns.maingame.email",operatorsVisible=false, source=true, filter="select")
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;


    /**
     * @var integer
     *
     * @GRID\Column(field="user.username", title="User",operatorsVisible=false, source=true, filter="select")
     *
     * @ORM\ManyToOne(targetEntity="ZIMZIM\Bundles\UserBundle\Entity\User", inversedBy="usersClientGame")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id", nullable=true)
     */
    private $user;

    /**
     * @var \ZIMZIM\Bundles\WorldCupBundle\Entity\ClientGame
     *
     * @GRID\Column(field="clientGame.name", title="clientGame",operatorsVisible=false, source=true, filter="select")
     *
     * @ORM\ManyToOne(targetEntity="ZIMZIM\Bundles\WorldCupBundle\Entity\ClientGame", inversedBy="usersClientGame")
     * @ORM\JoinColumn(name="id_clientgame", referencedColumnName="id", nullable=false)
     */
    private $clientGame;

    /**
     * @var integer
     *
     * @ORM\Column(name="enabled", type="boolean")
     */
    private $enabled;


    /**
     * @var integer
     *
     * @ORM\Column(name="request", type="boolean")
     */
    private $request;


    /**
     * @var integer
     *
     * @ORM\Column(name="admin", type="boolean")
     */
    private $admin;

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
     * Set admin
     *
     * @param integer $admin
     * @return UserMainGame
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;

        return $this;
    }

    /**
     * Get admin
     *
     * @return integer 
     */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return UserMainGame
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
     * @return UserMainGame
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
     * @param \ZIMZIM\Bundles\WorldCupBundle\Entity\ClientGame $clientGame
     */
    public function setClientGame($clientGame)
    {
        $this->clientGame = $clientGame;

        return $this;
    }

    /**
     * @return \ZIMZIM\Bundles\WorldCupBundle\Entity\ClientGame
     */
    public function getClientGame()
    {
        return $this->clientGame;
    }

    /**
     * @param int $request
     */
    public function setRequest($request)
    {
        $this->request = $request;

        return $this;
    }

    /**
     * @return int
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }


}
