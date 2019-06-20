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

}