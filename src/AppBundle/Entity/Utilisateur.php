<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
use Serializable;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UtilisateurRepository")
 */
class Utilisateur implements UserInterface,  Serializable ,  JsonSerializable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, unique=true)
     */
    private $password;

    /**
     * @var bool
     *
     * @ORM\Column(name="connected", type="boolean")
     */
    private $connected;

    /**
     * @var bool
     *
     * @ORM\Column(name="typing", type="boolean")
     */
    private $typing;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Utilisateur
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Utilisateur
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set connected
     *
     * @param boolean $connected
     *
     * @return Utilisateur
     */
    public function setConnected($connected)
    {
        $this->connected = $connected;

        return $this;
    }

    /**
     * Get connected
     *
     * @return bool
     */
    public function getConnected()
    {
        return $this->connected;
    }

    /**
     * Set typing
     *
     * @param boolean $typing
     *
     * @return Utilisateur
     */
    public function setTyping($typing)
    {
        $this->typing = $typing;

        return $this;
    }

    /**
     * Get typing
     *
     * @return bool
     */
    public function getTyping()
    {
        return $this->typing;
    }

    public function eraseCredentials() {
        
    }

    public function getRoles() {
        return array('ROLE_USER');
    }

    public function getSalt() {
        
    }

    public function getUsername() {
        return $this->email;
    }

    public function serialize() {
        return serialize(array(
            $this->id,
            $this->email,
            $this->password
        ));
    }

    public function unserialize($serialized) {
        list(
                $this->id,
                $this->email,
                $this->password
                ) = unserialize($serialized);
    }

    public function jsonSerialize() {
        return array(
            'email'=>  $this->email,
            'typing'=> $this->typing
        );
    }

}

