<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Produit;
use AppBundle\Form\ProduitType;
use DateTime;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{

    /**
     * @Route("/insert", name = "insert")
     * @param Request $request
     * @param ObjectManager $em
     */
    public function insertAction(Request $request, ObjectManager $em)
    {
        $loProduit = new Produit();
        $form = $this->createForm(ProduitType::class, $loProduit);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
           $loProduit->setDateAtCreate(new \DateTime());

            $em->persist($loProduit);
            $em->flush();
        }
        return $this->render('default/Admin/insert.html.twig', array(
            'myForm' => $form->createView()
        ));
    }

    /**
     * @Route("/delete", name="delete")
     */
    public function deleteAction()
    {
        return $this->render('default/Admin/delete.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/update", name="update")
     */
    public function updateAction()
    {
        return $this->render('default/Admin/update.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/list", name="list")
     * @return Response
     */
    public function listAction()
    {
        $loProduit = $this->getDoctrine()
                          ->getRepository(Produit::class)
                          ->findAll();
        return $this->render('default/Admin/list.html.twig', array(
            'produit' => $loProduit
        ));
    }

}
