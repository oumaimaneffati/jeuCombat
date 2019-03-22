<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Caracteristiques
 *
 * @ORM\Table(name="caracteristiques")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CaracteristiquesRepository")
 */
class Caracteristiques
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
     * @var int
     *
     * @ORM\Column(name="pv", type="integer")
     */
    private $pv;

    /**
     * @var int
     *
     * @ORM\Column(name="dexterite", type="integer")
     */
    private $dexterite;

    /**
     * @var int
     *
     * @ORM\Column(name="forceperso", type="integer")
     */
    private $forceperso;

    /**
     * @var int
     *
     * @ORM\Column(name="constitution", type="integer")
     */
    private $constitution;

    /**
     * @var int
     *
     * @ORM\Column(name="vitesse", type="integer")
     */
    private $vitesse;


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
     * Set pv
     *
     * @param integer $pv
     *
     * @return Caracteristiques
     */
    public function setPv($pv)
    {
        $this->pv = $pv;

        return $this;
    }

    /**
     * Get pv
     *
     * @return int
     */
    public function getPv()
    {
        return $this->pv;
    }

    /**
     * Set dexterite
     *
     * @param integer $dexterite
     *
     * @return Caracteristiques
     */
    public function setDexterite($dexterite)
    {
        $this->dexterite = $dexterite;

        return $this;
    }

    /**
     * Get dexterite
     *
     * @return int
     */
    public function getDexterite()
    {
        return $this->dexterite;
    }

    /**
     * Set forceperso
     *
     * @param integer $forceperso
     *
     * @return Caracteristiques
     */
    public function setForceperso($forceperso)
    {
        $this->forceperso = $forceperso;

        return $this;
    }

    /**
     * Get forceperso
     *
     * @return int
     */
    public function getForceperso()
    {
        return $this->forceperso;
    }

    /**
     * Set constitution
     *
     * @param integer $constitution
     *
     * @return Caracteristiques
     */
    public function setConstitution($constitution)
    {
        $this->constitution = $constitution;

        return $this;
    }

    /**
     * Get constitution
     *
     * @return int
     */
    public function getConstitution()
    {
        return $this->constitution;
    }

    /**
     * Set vitesse
     *
     * @param integer $vitesse
     *
     * @return Caracteristiques
     */
    public function setVitesse($vitesse)
    {
        $this->vitesse = $vitesse;

        return $this;
    }

    /**
     * Get vitesse
     *
     * @return int
     */
    public function getVitesse()
    {
        return $this->vitesse;
    }
}
