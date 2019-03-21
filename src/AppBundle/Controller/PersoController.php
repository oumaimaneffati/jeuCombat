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
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
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

        return $this->render('@app/personnages.html.twig', ['personnages' => $persos, 'deleted' => false]);
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
            // ADD CHARACTERISTIC

            $entityManager->persist($perso);
            $entityManager->flush();

            return $this->render('@app/create.html.twig', ['isValidate' => true]);
        }

        return $this->render('@app/create.html.twig', ['isValidate' => false, 'form' => $formBuilder->createView()]);
    }

    /**
     * @Route("/perso/{id}"),
     * name="personnage_detail",
     * requirements={"id"="\d+"}
     */
    public function showPerso($id){
        $persoRepository = $this->getDoctrine()->getRepository(Perso::class);
        $perso = $persoRepository->findOneBy(['id' => $id]);

        if ($perso) {
            return $this->render('@app/perso.html.twig', ['perso' => $perso]);
        }

        return new JsonResponse(null, 404);
    }

    /**
     * @Route("deletePerso/{id}"),
     * name="personnage_suppression",
     * methods={DELETE},
     * requirements={"id"="\d+"}
     */
    public function deletePersonnage($id)
    {
        $persoRepository = $this->getDoctrine()->getRepository(Perso::class);
        $perso = $persoRepository->findBy(['id' => $id]);

        if (!$perso)
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($perso);
            $entityManager->flush();

            //$persos = $persoRepository->findAll();

            return new JsonResponse(
                $this->container->get('router')->getContext()->getBaseUrl(), JsonResponse::HTTP_NO_CONTENT);
            //return $this->render('@app/personnages.html.twig', ['personnages' => $persos, 'deleted' => true]);
        }

        return new JsonResponse(null, 404);
    }
}