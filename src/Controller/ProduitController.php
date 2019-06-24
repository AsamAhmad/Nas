<?php


namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{

    use HelperTrait;

    /**
     * Page permettant d'afficher les produits d'une categorie
     * @Route("/categorie/{slug<[a-zA-Z0-9\-_\/]+>}",
     *      defaults={"slug"="default"},
     *      methods={"GET"},
     *      name="default_categorie")
     */
    public function categorie($slug)
    {
        /*
         * Recuperer la categorie correspondant au slug passer en parametre de la route
         * -----------------------------------------------------------------------------
         * On recupere le parametre slug de la route (url) dans notre variable $slug
         */
       $categorie = $this->getDoctrine()
            ->getRepository(Categorie::class)
            ->findOneBy(['slug' => $slug]);
        /*
         * Grace a la relation entre Produit et Categorie(OneToMany), je suis en mesure de
         * recuperer les produits d'une categorie
         */

        //dump($categorie);
        //die();

        $produits = $categorie-> getProduits();


        /*
         * J'envoi a ma vue les donnees a afficher.
         */
        return $this->render("index/categorie.html.twig", [
            'produits' => $produits,
            'categorie' => $categorie
        ]);
    }


    /**
     * @Route("/{categorie}/{slug}_{id<\d+>}.html", name="default_produit")
     */
    /*public function produit ($id)
    {
        $produit = $this->getDoctrine()
            ->getRepository(Produit::class)
            ->find($id);

        return $this->render("index/produit.html.twig", [
            'produit' => $produit
        ]);
    }*/


}