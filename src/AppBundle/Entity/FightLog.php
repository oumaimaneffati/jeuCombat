<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FightLog
 *
 * @ORM\Table(name="fight_log")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FightLogRepository")
 */
class FightLog
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    // date : date
    // att_id: int
    // def_id : int
    // result : arrayof(ongoing, lost, won) like an enum
    // log : string e.g {persoX strikes persoY, persoY losts N pv, persoX missed persoY, ...}

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
