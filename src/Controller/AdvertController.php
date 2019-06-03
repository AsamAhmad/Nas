<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


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
     * @Route("/item", name="item")
     */

    public function produit ()
    {
        return $this->render('index/produit.html.twig');
      }

}