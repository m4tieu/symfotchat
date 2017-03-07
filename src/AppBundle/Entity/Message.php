<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;
use JsonSerializable;
use stdClass;

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MessageRepository")
 */
class Message implements JsonSerializable {

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
     * @ORM\Column(name="message", type="string", length=512)
     */
    private $message;

    /**
     * @var stdClass
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur",cascade={"all"}, fetch="EAGER")
     * @ORM\JoinColumn(name="fk_utilisateur", referencedColumnName="id")
     */
    private $utilisateur;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="heure", type="datetime")
     */
    private $heure;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return Message
     */
    public function setMessage($message) {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage() {
        return $this->message;
    }

    /**
     * Set utilisateur
     *
     * @param stdClass $utilisateur
     *
     * @return Message
     */
    public function setUtilisateur($utilisateur) {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return stdClass
     */
    public function getUtilisateur() {
        return $this->utilisateur;
    }

    /**
     * Set heure
     *
     * @param DateTime $heure
     *
     * @return Message
     */
    public function setHeure($heure) {
        $this->heure = $heure;

        return $this;
    }

    /**
     * Get heure
     *
     * @return DateTime
     */
    public function getHeure() {
        return $this->heure;
    }

    public function jsonSerialize() {
        return array(
            'id' => $this->id,
            'utilisateur' => $this->getUtilisateur(),
            'message' => $this->message,
            'heure' => $this->heure,
        );
    }

}
