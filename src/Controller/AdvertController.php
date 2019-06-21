<?php

namespace App\Controller;

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
//--//-->   CATEGORIE
======================================*/



    /**
     * @Route("/categorie", name="categorie")
     */

    public function categorie ()
    {

      $produit = $this->getDoctrine()
            ->getRepository(Produit::class)
            ->findAll();

        $categorie = $this->getDoctrine()
            ->getRepository(Categorie::class)
            ->find(1);

        return $this->render("index/categorie.html.twig", [
          "produits" => $produit,
          "categorie" => $categorie,
      ]);
      }





/*======================================
//--//-->   PRODUIT
======================================*/



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

    
    /**
     * @Route("/mentions", name="mentions")
     */

    public function mentions ()
    {
        return $this->render('components/mentionslegales.html.twig');
    }

}