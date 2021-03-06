<?php

namespace UserBundle\Mailer;

use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Mailer\MailerInterface;

class Mailer implements MailerInterface
{
    /**
     * @var \Swift_Mailer
     */
    protected $mailer;

    /**
     * @var \Twig_Environment
     */
    protected $twig;

    /**
     * @var array
     */
    protected $parameters;


    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $twig, array $parameters)
    {
        $this->mailer = $mailer;
        $this->twig   = $twig;
        $this->parameters = $parameters;
    }

    public function sendConfirmationEmailMessage(UserInterface $user)
    {
        $template = "UserBundle:Registration:email.txt.twig";

        $context = [
            'user'  => $user,
            'confirmation_url' => $this->parameters['base_url_confirmation'] . $user->getConfirmationToken(),
        ];

        $this->sendMessage($template, $context, $user->getEmail());
    }

    public function sendResettingEmailMessage(UserInterface $user)
    {
        $template = "UserBundle:Resetting:email.txt.twig";

        $context = [
            'user'  => $user,
            'token' => $user->getConfirmationToken(),
            'reset_url' => $this->parameters['base_url_reset_password'] . $user->getConfirmationToken(),
        ];

        $this->sendMessage($template, $context, $user->getEmail());
    }

    /**
     * @param UserInterface $user
     * @param string $filename
     */
    public function sendExportUsers(UserInterface $user, string $filename)
    {
        $template = "UserBundle:Export:users.txt.twig";

        $context = ['user' => $user];

        $attachment = \Swift_Attachment::fromPath($filename)->setFilename('users.csv');

        $this->sendMessage($template, $context, $user->getEmail(), $attachment);
    }

    /**
     * @param string $templateName
     * @param array  $context
     * @param string $toEmail
     * @param \Swift_Attachment $attachment
     */
    protected function sendMessage($templateName, $context, $toEmail, \Swift_Attachment $attachment = null)
    {
        $template = $this->twig->loadTemplate($templateName);
        $subject  = $template->renderBlock('subject', $context);
        $textBody = $template->renderBlock('body_text', $context);
        $htmlBody = $template->renderBlock('body_html', $context);

        $message = \Swift_Message::newInstance()
            ->setFrom([$this->parameters['sender_email'] => $this->parameters['sender_name']])
            ->setSubject($subject)
            ->setTo($toEmail);

        if ($attachment) {
            $message->attach($attachment);
        }

        if (!empty($htmlBody)) {
            $message->setBody($htmlBody, 'text/html')
                ->addPart($textBody, 'text/plain');
        } else {
            $message->setBody($textBody);
        }

        $this->mailer->send($message);
    }
}
