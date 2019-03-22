<?php
/**
 * Created by PhpStorm.
 * User: letaaz
 * Date: 21/03/19
 * Time: 15:50
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Perso;
use AppBundle\Repository\PersoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class FightController extends Controller
{
    /**
     * @Route(
     *     "/arena/{id}",
     *      name="arena",
     *      requirements={"id"="\d+"}
     *     )
     */
    public function index($id)
    {
        $currentUser = $this->getUser();

        if ($currentUser)
        {
            $persoRepository = $this->getDoctrine()->getRepository(Perso::class);
            $opponents = $persoRepository->findOpponent($currentUser);

            return $this->render('@app/arena.html.twig',
                ['opponents' => $opponents,'current_perso_id' => $id]);
        }

        return $this->render('@app/error.html.twig');
    }

    /**
     * @Route("fight/{perso1_id}/{perso2_id}"),
     * name="fight"
     * requirements={"perso1_id"="\d+", "perso2_id"="\d+"}
     */
    public function fight($perso1_id, $perso2_id)
    {
        $persoRepository = $this->getDoctrine()->getRepository(Perso::class);
        $att = $persoRepository->findOneBy(['id' => $perso1_id]);
        $def = $persoRepository->findOneBy(['id' => $perso2_id]);

        if ($att && $def)
        {
            $result = $att->fight($def);
            return $this->render('@app/fight_result.html.twig',
                ['result' => $result, 'att' => $att, 'def' => $def]);
        }

        return $this->render('@app/error.html.twig');
    }
}