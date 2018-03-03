<?php

namespace AppBundle\EventListener;


use AppBundle\Entity\Book;
use AppBundle\Service\MailerService;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

class UserAlertSubscriber implements EventSubscriber
{
    /*
     * Définition des events que la classe va "écouter".
     */
    public function getSubscribedEvents()
    {
        return [
            'postPersist',
            'postUpdate',
        ];
    }

    public function postUpdate(LifecycleEventArgs $args)
    {
        $this->alert($args);
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $this->alert($args);
    }

    public function alert(LifecycleEventArgs $args, MailerService $mailer)
    {
        $object = $args->getObject();

        if ($object instanceof Book){
            $em = $args->getObjectManager();

            // Récupération du livre concerné par l'ajout / mise à jour
            $book = $em->find($object->getId());

            // A partir de là, il faudrait une entité qui gère les favoris des utilisateurs.
            // Dans le cas d'un livre, cette entité aurait une relation avec Author.
            // On l'utiliserais pour récupérer une liste de User qui ont pour favori
            // l'auteur du livre qui vient d'être ajouté / modifié.
            // A partir de cette liste on pourrait alors faire une boucle en utilisant le service
            // MailerService pour envoyer un mail d'alerte à chaque utilisateur.

        }
    }

}