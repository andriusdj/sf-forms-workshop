<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Email
 *
 * @ORM\Table(name="email")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EmailRepository")
 */
class Email
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
     * @ORM\Column(name="username", type="string", length=255)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="domain", type="string", length=255)
     */
    private $domain;

    /**
     * @var Person
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="emails", cascade={"persist", "remove"})
     */
    private $owner;

    /**
     * Get id
     *
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return Email
     */
    public function setUsername($username): Email
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * Set domain
     *
     * @param string $domain
     *
     * @return Email
     */
    public function setDomain($domain): Email
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * Get domain
     *
     * @return string
     */
    public function getDomain(): ?string
    {
        return $this->domain;
    }

    /**
     * @param Person $owner
     *
     * @return Email
     */
    public function setOwner($owner): Email
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @return Person
     */
    public function getOwner(): ?Person
    {
        return $this->owner;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getUsername() . '@' . $this->getDomain();
    }
}

