<?php

namespace ZIMZIM\Bundles\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;


/**
 * User
 *
 * @ORM\Table(name="worldcup_user")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="google_id", type="string", length=255, nullable=true)
     */
    private $google_id;

    /**
     * @var string
     *
     * @ORM\Column(name="google_access_token", type="string", length=255, nullable=true)
     */
    private $googleAccessToken;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook_id", type="string", length=255, nullable=true)
     */
    private $facebook_id;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook_access_token", type="string", length=255, nullable=true)
     */
    private $facebookAccessToken;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter_id", type="string", length=255, nullable=true)
     */
    private $twitter_id;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter_access_token", type="string", length=255, nullable=true)
     */
    private $twitterAccessToken;


    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="ZIMZIM\Bundles\WorldCupBundle\Entity\UserBet", mappedBy="user")
     */
    private $userBets;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="ZIMZIM\Bundles\WorldCupBundle\Entity\UserClientGame", mappedBy="user")
     */
    private $usersClientGame;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="ZIMZIM\Bundles\WorldCupBundle\Entity\ClientGame", mappedBy="user")
     */
    private $clientGame;


    public function __construct(){
        parent::__construct();

        $this->userBets = new ArrayCollection();
        $this->clientGame  = new ArrayCollection();
        $this->usersClientGame = new ArrayCollection();
    }

    /**
     * @param string $googleAccessToken
     */
    public function setGoogleAccessToken($googleAccessToken)
    {
        $this->googleAccessToken = $googleAccessToken;
        return $this;
    }

    /**
     * @return string
     */
    public function getGoogleAccessToken()
    {
        return $this->googleAccessToken;
    }
    /**
     *
     * @param mixed $google_id
     */
    public function setGoogleId($google_id)
    {
        $this->google_id = $google_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGoogleId()
    {
        return $this->google_id;
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
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @ORM\PrePersist
     */
    public function createUser()
    {
        $this->addRole('ROLE_USER');
    }

    public function setEmail($email){
        parent::setEmail($email);

        if($this->getUsername() === null){
            $this->setUsername($email);
        }
    }

    /**
     * @param string $facebookAccessToken
     */
    public function setFacebookAccessToken($facebookAccessToken)
    {
        $this->facebookAccessToken = $facebookAccessToken;
    }

    /**
     * @return string
     */
    public function getFacebookAccessToken()
    {
        return $this->facebookAccessToken;
    }

    /**
     * @param string $facebook_id
     */
    public function setFacebookId($facebook_id)
    {
        $this->facebook_id = $facebook_id;
    }

    /**
     * @return string
     */
    public function getFacebookId()
    {
        return $this->facebook_id;
    }

    /**
     * @param string $twitterAccessToken
     */
    public function setTwitterAccessToken($twitterAccessToken)
    {
        $this->twitterAccessToken = $twitterAccessToken;
    }

    /**
     * @return string
     */
    public function getTwitterAccessToken()
    {
        return $this->twitterAccessToken;
    }

    /**
     * @param string $twitter_id
     */
    public function setTwitterId($twitter_id)
    {
        $this->twitter_id = $twitter_id;
    }

    /**
     * @param string $twitter_id
     */
    public function setTwitter_id($twitter_id)
    {
        $this->twitter_id = $twitter_id;
    }

    /**
     * @return string
     */
    public function getTwitterId()
    {
        return $this->twitter_id;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $userBets
     */
    public function setUserBets($userBets)
    {
        $this->userBets = $userBets;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getUserBets()
    {
        return $this->userBets;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $clientGame
     */
    public function setClientGame($clientGame)
    {
        $this->clientGame = $clientGame;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getClientGame()
    {
        return $this->clientGame;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $usersMainGame
     */
    public function setUsersMainGame($usersMainGame)
    {
        $this->usersMainGame = $usersMainGame;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getUsersMainGame()
    {
        return $this->usersMainGame;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $usersClientGame
     */
    public function setUsersClientGame($usersClientGame)
    {
        $this->usersClientGame = $usersClientGame;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getUsersClientGame()
    {
        return $this->usersClientGame;
    }


}
