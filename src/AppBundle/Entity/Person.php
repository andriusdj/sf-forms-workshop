<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Person
 *
 * @ORM\Table(name="person")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PersonRepository")
 */
class Person
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
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var int
     *
     * @ORM\Column(name="dateOfBirth", type="integer")
     */
    private $dateOfBirth;

    /**
     * @var Company
     *
     * @ORM\ManyToOne(targetEntity="Company", inversedBy="people", cascade={"persist", "remove"})
     */
    private $company;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Email", cascade={"persist", "remove"}, mappedBy="owner")
     */
    private $emails;

    /**
     * Person constructor.
     */
    public function __construct()
    {
        $this->emails = new ArrayCollection();
    }

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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Person
     */
    public function setFirstName($firstName): Person
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Person
     */
    public function setLastName($lastName): Person
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * Set dateOfBirth
     *
     * @param int $dateOfBirth
     *
     * @return Person
     */
    public function setDateOfBirth(int $dateOfBirth): Person
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get dateOfBirth
     *
     * @return int
     */
    public function getDateOfBirth(): ?int
    {
        return $this->dateOfBirth;
    }

    /**
     * @return Email[]
     */
    public function getEmails(): array
    {
        return $this->emails->toArray();
    }

    /**
     * @param array $emails
     *
     * @return Person
     */
    public function setEmails(array $emails): Person
    {
        $this->emails = new ArrayCollection($emails);

        return $this;
    }

    /**
     * @param Email $email
     *
     * @return Person
     */
    public function addEmail(Email $email): Person
    {
        $this->emails->add($email);

        return $this;
    }

    /**
     * @return Company
     */
    public function getCompany(): ?Company
    {
        return $this->company;
    }

    /**
     * @param Company $company
     *
     * @return Person
     */
    public function setCompany(Company $company): Person
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function formatDateOfBirth(): \DateTime
    {
        return (new \DateTime())->setTimestamp($this->getDateOfBirth());
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}

