<?php
/**
 * Created by PhpStorm.
 * User: letaaz
 * Date: 21/03/19
 * Time: 09:49
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Caracteristiques;
use AppBundle\Entity\Perso;
use AppBundle\Form\PersoType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PersoController extends Controller
{

    /**
     * @Route("/persos", name="personnages_age")
     */
    public function showPersos(Request $request)
    {
        $currentUser = $this->getUser();

        if ($currentUser)
        {
            $persoRepository = $this->getDoctrine()->getRepository(Perso::class);
            $persos = $persoRepository->findBy(['user' => $currentUser]);

            return $this->render('@app/personnages.html.twig', ['personnages' => $persos, 'deleted' => false]);
        }

        return $this->render('@app/error.html.twig');

    }

    /**
     * @Route("/createPerso", name="personnage_creation")
     */
    public function createPerso(Request $request)
    {

        $perso = new Perso();
        $formBuilder = $this->createForm(PersoType::class, $perso);

        $formBuilder->handleRequest($request);

        if ($formBuilder->isSubmitted() && $formBuilder->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $perso->setStatus(1);

            // Associate to user
            $currentUser = $this->getUser();
            $perso->setUser($currentUser);

            // Define caracteristique
            $carac = new Caracteristiques();
            $carac->generateRandomStats();
            $perso->setCaracteristiques($carac);

            $entityManager->persist($perso);
            $entityManager->flush();

            return $this->render('@app/create.html.twig', ['isValidate' => true]);
        }

        return $this->render('@app/create.html.twig', ['isValidate' => false, 'form' => $formBuilder->createView()]);
    }

    /**
     * @Route(
     *     "/perso/{id}",
     *      name="personnage_detail",
     *      requirements={"id"="\d+"}
     *     )
     */
    public function showPerso($id){

        $currentUser = $this->getUser();

        if ($currentUser)
        {
            $persoRepository = $this->getDoctrine()->getRepository(Perso::class);
            $perso = $persoRepository->findOneBy(['user' => $currentUser, 'id' => $id]);

            if ($perso) {
                return $this->render('@app/perso.html.twig', ['perso' => $perso]);
            }
        }

        return $this->render('@app/error.html.twig');
    }

    /**
     * @Route(
     *     "/deletePerso/{id}",
     *     name="personnage_suppression",
     *     methods={"DELETE"},
     *     requirements={"id"="\d+"}
     * )
     */
    public function deletePerso($id)
    {
        $persoRepository = $this->getDoctrine()->getRepository(Perso::class);
        $perso = $persoRepository->findOneBy(['id' => $id]);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($perso);
        $entityManager->flush();

        $persos = $persoRepository->findAll();

//        return new JsonResponse(
//            $this->container->get('router')->getContext()->getBaseUrl(), JsonResponse::HTTP_NO_CONTENT);
        return $this->render('@app/personnages.html.twig', ['personnages' => $persos, 'deleted' => true]);
    }
}