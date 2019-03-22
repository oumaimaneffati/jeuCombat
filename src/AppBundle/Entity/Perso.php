<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Fig\Link\Tests\GenericLinkProviderTest;

/**
 * Perso
 *
 * @ORM\Table(name="perso")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PersoRepository")
 */
class Perso
{
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Caracteristiques", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $caracteristiques;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;
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
     * @ORM\Column(name="name", type="string", length=75, unique=true)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Perso
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set status.
     *
     * @param bool $status
     *
     * @return Perso
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status.
     *
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set caracteristiques
     *
     * @param \AppBundle\Entity\Caracteristiques $caracteristiques
     *
     * @return Perso
     */
    public function setCaracteristiques(\AppBundle\Entity\Caracteristiques $caracteristiques)
    {
        $this->caracteristiques = $caracteristiques;

        return $this;
    }

    /**
     * Get caracteristiques
     *
     * @return \AppBundle\Entity\Caracteristiques
     */
    public function getCaracteristiques()
    {
        return $this->caracteristiques;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Perso
     */
    public function setUser(\AppBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Fight logic
     * @param Perso
     * @return FightLog[]
     */
    public function fight($opponent)
    {
        // Fight Logic here
        $fightlogs = array(new FightLog());

        // While everyone is alive, do round, add FightLog obj to $fightlogs

        return $fightlogs;
    }
}
