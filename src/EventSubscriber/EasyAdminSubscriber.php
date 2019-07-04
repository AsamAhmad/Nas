<?php


namespace App\EventSubscriber;

use App\Controller\HelperTrait;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use App\Entity\Produit;


class EasyAdminSubscriber //implements EventSubscriberInterface
{
    /*use HelperTrait;

    private $slugger;

    public function __construct($slugger)
    {
        $this->slugger = $slugger;
    }

    public static function getSubscribedEvents()
    {
        return array(
            'easy_admin.pre_persist' => array('setProductSlug'),
        );
    }

    public function setProductSlug(GenericEvent $event)
    {
        $entity = $event->getSubject();

        if (!($entity instanceof Produit)) {
            return;
        }

        $slug = $this->slugger->slugify($entity->getName());
        $entity->setSlug($slug);

        $event['entity'] = $entity;
    }*/
}