<?php

namespace App\Services;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class Mailer
{
    private $mailer;
    
    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendEmail($user, $content)
    {

        $email = (new Email())
            ->from('mailingconsymfony@gmail.com')
            ->to($user)
            ->subject($content)
            ->text($content)
            ->html('<p>'.$content.'</p>');

        $this->mailer->send($email);
    }
}