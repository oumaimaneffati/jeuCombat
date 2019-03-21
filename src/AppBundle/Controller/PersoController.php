<?php
/**
 * Created by PhpStorm.
 * User: letaaz
 * Date: 21/03/19
 * Time: 09:49
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Perso;
use AppBundle\Form\PersoType;
use AppBundle\Repository\PersoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PersoController extends Controller
{

    /**
     * @Route("/persos", name="personnages_age")
     */
    public function showPersonnages(Request $request)
    {
        $persoRepository = $this->getDoctrine()->getRepository(Perso::class);
        $persos = $persoRepository->findAll();

        return $this->render('@app/personnages.html.twig', ['personnages' => $persos]);
    }

    /**
     * @Route("/createPerso", name="personnage_creation")
     */
    public function createPersonnage(Request $request)
    {

        $perso = new Perso();
        $formBuilder = $this->createForm(PersoType::class, $perso);

        $formBuilder->handleRequest($request);

        if ($formBuilder->isSubmitted() && $formBuilder->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $perso->setStatus(1);

            $entityManager->persist($perso);
            $entityManager->flush();

            return $this->render('@app/create.html.twig', ['isValidate' => true]);
        }

        return $this->render('@app/create.html.twig', ['isValidate' => false, 'form' => $formBuilder->createView()]);
    }
}