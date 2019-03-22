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

    /**
     * Set caracteristique values according to game rule
     * pv is always 100
     * constition is a random from 0 to 20
     * force is a random from 10 to 35
     * vitesse is a random from 5 to 15
     * dexterite is a random from 5 to 15
     */
    public function generateRandomStats(){
        $this->pv = 100;
        $this->constitution = random_int(0, 20);
        $this->forceperso = random_int(10, 35);
        $this->vitesse = random_int(5, 15);
        $this->dexterite = random_int(5, 15);
    }
}
