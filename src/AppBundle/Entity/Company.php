<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Company
 *
 * @ORM\Table(name="company")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CompanyRepository")
 */
class Company
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Person", mappedBy="company", cascade={"persist", "remove"})
     */
    private $people;

    /**
     * Company constructor.
     */
    public function __construct()
    {
        $this->people = new ArrayCollection();
    }

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
     * Set name
     *
     * @param string $name
     *
     * @return Company
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
     * Set address
     *
     * @param string $address
     *
     * @return Company
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return Person[]
     */
    public function getPeople()
    {
        return $this->people->toArray();
    }

    /**
     * @param Person[] $people
     *
     * @return Company
     */
    public function setPeople(array $people)
    {
        $this->people = new ArrayCollection($people);

        return $this;
    }

    /**
     * @param Person $person
     *
     * @return Company
     */
    public function addPerson(Person $person)
    {
        $this->people->add($person);

        return $this;
    }
}

