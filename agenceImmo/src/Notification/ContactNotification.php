<?php
namespace App\Notification;

use Twig\Environment;
use App\Entity\Contact;

class ContactNotification 
{   
    private $mailer;
    private $renderer;
    
    public function __construct(\Swift_Mailer $mailer, Environment $render)
    {
        $this->mailer = $mailer;
        $this->renderer = $render;
    }
    
    public function notify(Contact $contact)
    {
        $message = (new \Swift_Message('Agence : ' . $contact->getProperty()->getTitle()))
            ->setFrom('noreply@agence.com')
            ->setTo('contact@agence.fr')
            ->setReplyTo($contact->getEmail())
            ->setBody($this->renderer->render('emails/contact.html.twig', [
                'contact' => $contact
            ]), 'text/html');
                $this->mailer->send($message);
    }
}