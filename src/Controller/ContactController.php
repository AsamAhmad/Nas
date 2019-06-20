<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ContactFormType;
use App\Entity\Membre;
use App\Entity\Contact;
use App\Entity\Produit;
use Symfony\Component\HttpFoundation\Session\Session;


class ContactController extends AbstractController
{
    /** 
     * Page de contact
     */

    public function contactform(Request $request)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactFormType::class, $contact)
        ->handleRequest($request);

        $form->handleRequest($request);

        # Vérification de la soumission du formulaire
        if($form->isSubmitted() && $form->isValid()) {

            # Sauvegarde en BDD.
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            /*
            # Notification
            $this->addFlash('notice',
                'Félicitation, votre message est envoyé !');

            # Redirection
            return $this->redirectToRoute('categorie');
            */
        }

        /* 
        # Affichage du Formulaire dans la vue
        return $this->render('membre/contact.html.twig', [
           'form' => $form->createView()
        ]); 
        */
        # Affichage du Formulaire dans la vue
        return $this->render('membre/contact.html.twig');

    }



/*

    public function contactform(Request $request)
    {
        # Création d'un Membre dans la bdd pour la table Contact
        $membre = new Membre();
        $membre->setDateInscription(new \DateTime());
        $membre->setRoles(['ROLE_MEMBRE']);

        # Création du Formulaire "MembreFormType"
        $form = $this->createForm(MembreFormType::class, $membre)
            ->handleRequest($request);

        # Vérification de la soumission du formulaire
        if($form->isSubmitted() && $form->isValid()) {

            # Encoder le mot de passe
            $membre->setPassword(
                $encoder->encodePassword($membre, $membre->getPassword())
            );

            # Sauvegarde en BDD.
            $em = $this->getDoctrine()->getManager();
            $em->persist($membre);
            $em->flush();

            # Notification
            $this->addFlash('notice',
                'Félicitation, vous pouvez vous connecter !');

            # Redirection
            return $this->redirectToRoute('membre_connexion');
        }

        # Affichage du Formulaire dans la vue
        return $this->render('index/index.html.twig', [
           'form' => $form->createView()
        ]);
    }
     */
}