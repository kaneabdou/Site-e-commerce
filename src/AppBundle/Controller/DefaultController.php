<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Produit;
use AppBundle\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $laProduit = $this->getDoctrine()
                          ->getRepository(Produit::class)
                          ->getLastProduits();
        return $this->render('default/index.html.twig', array(
            'list' => $laProduit
        ));
    }
}
