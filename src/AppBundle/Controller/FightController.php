<?php
/**
 * Created by PhpStorm.
 * User: letaaz
 * Date: 21/03/19
 * Time: 15:50
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Perso;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FightController extends Controller
{
    /**
     * @Route("/arena/{id}"),
     * name="arena"
     * requirements={"id"="\d+"}
     */
    public function index($id)
    {
        // TODO : List all elligible Persos + choice selection to fight a Perso
    }

    /**
     * @Route("fight/{perso1_id}/{perso2_id}"),
     * name="fight"
     * requirements={"perso1_id"="\d+", "perso2_id"="\d+"}
     */
    public function fight($perso1_id, $perso2_id)
    {
        // TODO : Compute fight between both Perso + Display results (Log)
    }
}