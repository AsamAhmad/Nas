<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Produit;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Membre;
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
        $repository = $this->getDoctrine()
        ->getRepository(Produit::class);

        $produit = $repository->findAll();
        $spotlight = $repository->findByLatest();

        return $this->render("index/index.html.twig", [
          "produits" => $produit,
          'spotlight' => $spotlight,
          /*
               'categorie' => $article->getCategorie()->getSlug(),
               'slug' => $article->getSlug(),
               'id' => $article->getId()
            */
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

        $repository = $this->getDoctrine()
        ->getRepository(Produit::class);

        $produit = $repository->findAll();
        $spotlight = $repository->findByLatest();

        return $this->render("index/allproduct.html.twig", [
          "produits" => $produit,
          'spotlight' => $spotlight,
    ]);

      }

/*======================================
//--//-->   FICHE PRODUIT
======================================*/

    /**
     * @Route("/produit", name="ficheproduit") 
     */

    public function produit ()
    {
      
      $produit = $this->getDoctrine()
            ->getRepository(Produit::class)
            ->find(1);

        return $this->render("index/produit.html.twig",[
          "produit" => $produit,
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