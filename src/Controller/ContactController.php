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
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;



class ContactController extends AbstractController
{
    /** 
     * 
     * @Route("/contact", name="formcontact")
     */


    public function addcontact(Request $request, ObjectManager $em, \Swift_Mailer $mailer) 
    {
        $contact = new Contact();

        $form = $this->createForm(ContactFormType::class, $contact);
        $form->handleRequest($request);

        // $contactFormData = $form->getData();

        if($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            # notification
            $this->addFlash('notice', 'Félicitation, le mail nous est bien parvenu!');

            # Envoie de l'email
            /*$message = (new \Swift_Message('Hello Email'))
            ->setFrom($contactFormData['email'])
            ->setTo('sunanmahjura2@gmail.com')
            ->setBody(
            $contactFormData['message'],
            'text/plain'
            //$this->renderView(
                // templates/emails/registration.html.twig
                //'emails/registration.html.twig',
                //['name' => $name]
            );

        $mailer->send($message);*/

            # Redirection vers la page d'accueil
            return $this->redirectToRoute('index');
        }
        
        return $this->render('membre/contact.html.twig', [
            'form' => $form->createView()
            ]);
    }
}