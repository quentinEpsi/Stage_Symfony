<?php
/**
 * Created by PhpStorm.
 * User: Quentin
 * Date: 04/02/2019
 * Time: 13:54
 */

namespace App\Notification;


use App\Entity\Contact;
use Twig\Environment;

class ContactNotification
{
    private $mailer;
    private $renderer;

    public function __construct(\Swift_Mailer $mailer, Environment $renderer)
    {
        $this->mailer = $mailer;
        $this->renderer = $renderer;
    }

    public function notify(Contact $contact){
    $message = (new \Swift_Message('S2R'))
        ->setFrom($contact->getEmail())
        ->setTo('hyacinthe.yao@yahoo.fr')
        ->setCc($contact->getEmail())
        ->setReplyTo($contact->getEmail())
        ->setSubject($contact->getObjet())
        ->setBody($this->renderer->render('emails/contact.html.twig',[
            'contact' => $contact
        ]), 'text/html');
    $this->mailer->send($message);
}
}