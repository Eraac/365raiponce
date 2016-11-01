<?php

namespace LKE\UserBundle\Service;

use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Mailer\MailerInterface;;

class Mailer implements MailerInterface
{
    protected $mailer;
    protected $twig;
    protected $parameters;

    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $twig, array $parameters)
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
        $this->parameters = $parameters;
    }

    public function sendConfirmationEmailMessage(UserInterface $user)
    {
        $template = $this->parameters['template']['confirmation'];

        $context = array(
            'user' => $user,
            'token' => $user->getConfirmationToken()
        );

        //$this->sendMessage($template, $context, $this->parameters['from_email']['confirmation'], $user->getEmail());
    }

    public function sendResettingEmailMessage(UserInterface $user)
    {
        $context = array(
            'user' => $user,
            'token' => $user->getConfirmationToken()
        );

        $this->sendMessage($context, $this->parameters['from_email']['resetting'], $user->getEmail());
    }

    /**
     * @param string $templateName
     * @param array  $context
     * @param string $fromEmail
     * @param string $toEmail
     */
    protected function sendMessage($context, $fromEmail, $toEmail)
    {
        $subject = "Demande de réinitialisation de mot de passe";
        $textBody = <<<EOT
Bonjour,

Voici votre token pour réinitialiser votre mot de passe : 
EOT;

        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom($fromEmail)
            ->setTo($toEmail)
            ->setBody($textBody . $context['token'])
        ;

        $this->mailer->send($message);
    }
}
