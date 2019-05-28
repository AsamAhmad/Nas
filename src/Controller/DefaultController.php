<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController
{

    /**
     * @Route("/", name="index")
     */
    public function index ()
    {

        return new Response(
            '<html><body><h1>Lucky number </h1></body></html>'
        );
    }

    /**
    * Page permettant d'afficher les articles d'une catégorie
    * @Route("/categorie/{libellecategorie}", name="index_categorie", methods={"GET"})
    * @param $libellecategorie
    * @return Response
    */

    public function categorie($libellecategorie = 'computing') {
    return new Response("<html><body><h1>PAGE CATEGORIE : $libellecategorie</h1></body></html>");
    }

}
