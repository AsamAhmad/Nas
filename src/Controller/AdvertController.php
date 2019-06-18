<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Produit;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Produit;
use App\Entity\Image;


class AdvertController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */

    public function index ()
    {
        return $this->render('index/index.html.twig');
      }


    /**
     * @Route("/categorie", name="categorie")
     */

    public function categorie ()
    {

      $produit = $this->getDoctrine()
            ->getRepository(Produit::class)
            ->find(1);

        return $this->render("index/categorie.html.twig", [
          "produit" => $produit
      ]);
      }


    /**
     * @Route("/produit", name="produit")
     */

    public function produit ()
    {
      
      $produit = $this->getDoctrine()
            ->getRepository(Produit::class)
            ->find(1);

      // $repository= $this->getDoctrine()
       //->getRepository(Image::class)();

       // $images = $repository -> getImages();
        
        return $this->render("index/produit.html.twig",[
          "produit" => $produit
      ]);
      }

    /**
     * @Route("/contact", name="formcontact")
     */

    public function contact ()
    {
        return $this->render('index/contact.html.twig');
      }

    /**
     * @Route("/hidden", name="cache")
     */

    public function hidden ()
    {
        return $this->render('hidden.html.twig');
    }

    /**
     * @Route("/cg", name="cg")
     */

    public function cg ()
    {
        return $this->render('components/cg.html.twig');
    }


    /*
   * Génération de la sidebar
   * */
    public function sidebar()
    {
        $repository = $this->getDoctrine()
            ->getRepository(Produit::class);

        # Récuperation des 5 derniers produits
        $produits = $repository-> findByLatest();

        # Récuperation des produits en position speciale
        $special = $repository->findBySpecial();

        # Récuperation des produits en promotion
        $promotion = $repository->findByPromotion();

        #Transmission des informations à la vue
        return $this->render('components/_sidebar.html.twig', [
            'produits' => $produits,
            'special' => $special,
            'promotion' => $promotion
        ]);
    }

}