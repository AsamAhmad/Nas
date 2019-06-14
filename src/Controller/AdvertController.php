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
     * @Route("/produit", name="produit")
     */

    public function produit ()
    {
        return $this->render('index/produit.html.twig');
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

    

}