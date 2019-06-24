<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Produit;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Membre;
use App\Entity\Produit;
use App\Entity\Image;
use App\Entity\Categorie;
use App\Entity\Document;
use App\Entity\Contact;


class AdvertController extends AbstractController
{



/*======================================
//--//-->   INDEX
======================================*/




    /**
     * @Route("/", name="index")
     */

    public function index ()
    {
      $produit = $this->getDoctrine()
            ->getRepository(Produit::class)
            ->findAll();

        $categorie = $this->getDoctrine()
            ->getRepository(Categorie::class)
            ->findAll();

        return $this->render("index/index.html.twig", [
          "produits" => $produit,
          "categorie" => $categorie,
          ]);
        }



/*======================================
//--//-->   ALL PRODUCT
======================================*/



    /**
     * @Route("/allproduct", name="allproduct")
     */

    public function allproduct ()
    {

      $produit = $this->getDoctrine()
            ->getRepository(Produit::class)
            ->findAll();

        $categorie = $this->getDoctrine()
            ->getRepository(Categorie::class)
            ->find(1);

        return $this->render("index/allproduct.html.twig", [
          "produits" => $produit,
          "categorie" => $categorie,
      ]);
      }





/*======================================
//--//-->   PRODUIT
======================================*/



    /**
     * @Route("/produit", name="ficheproduit")
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




/*======================================
//--//-->   AUTRES, mentions, conditions...
======================================*/


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