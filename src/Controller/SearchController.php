<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\SearchType;
use App\Entity\Membre;
use App\Form\ConnexionFormType;
use App\Form\MembreFormType;
use App\Form\ModificationFormType;
use Symfony\Component\Form\FormBuilder;

class SearchController extends AbstractController
{

    /**
     * @Route("searchproduits", name="search_produits")
     */

    public function searchProduits (Request $request)
    /**SearchRepository $SearchRepository */
    
    {
        $searchproduits = $this->createForm(SearchType::class);


        # vérification de la soumission du formulaire

        /*
        if ($searchproduits->handleRequest($request) ->isSubmitted() && $searchproduits->isValid()) {
            $criteria = $searchproduits->getData();
            $search = $SearchRepository->searchProduit($criteria);
        }
        */
        return $this->render("search/searchproduits.html.twig",[
            'search_form' => $searchproduits->createView(),
        ]);
        }

}