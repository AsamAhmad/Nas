<?php


namespace App\Controller;


use App\Entity\Membre;
use App\Entity\Produit;
use App\Entity\Image;
use App\Entity\Categorie;
use App\Entity\Document;
use App\Form\ConnexionFormType;
use App\Form\MembreFormType;
use App\Form\ModificationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class ProduitController extends AbstractController
{
    /*

    use HelperTrait;

    /**
     * Page permettant d'afficher les produits d'une categorie
     * @Route("/categorie/{slug<[a-zA-Z0-9\-_\/]+>}",
     *      defaults={"slug"="default"},
     *      methods={"GET"},
     *      name="default_categorie")
     */

     /*

    public function categorie($slug)
    {
        /*
         * Recuperer la categorie correspondant au slug passer en parametre de la route
         * -----------------------------------------------------------------------------
         * On recupere le parametre slug de la route (url) dans notre variable $slug
         */

         /*
       $categorie = $this->getDoctrine()
            ->getRepository(Categorie::class)
            ->findOneBy(['slug' => $slug]);
        /*
         * Grace a la relation entre Produit et Categorie(OneToMany), je suis en mesure de
         * recuperer les produits d'une categorie
         */

        //dump($categorie);
        //die();

        /*

        $produits = $categorie-> getProduits();


        /*
         * J'envoi a ma vue les donnees a afficher.
         */

         /*
        return $this->render("index/categorie.html.twig", [
            'produits' => $produits,
            'categorie' => $categorie
        ]);
    }


    /**
     * @Route("/{categorie}/{slug}_{id<\d+>}.html", name="default_produit")
     */
    /*public function pr ($id)
    {
        $produit = $this->getDoctrine()
            ->getRepository(Produit::class)
            ->find($id);

        return $this->render("index/produit.html.twig", [
            'produit' => $produit
        ]);
    }*/


}