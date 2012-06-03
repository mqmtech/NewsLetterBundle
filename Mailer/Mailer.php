<?php

namespace MQM\NewsLetterBundle\Mailer;

use MQM\NewsLetterBundle\Mailer\MailerInterface;

class Mailer implements MailerInterface
{    
    private $mailer;
    private $kernel;
    
    public function __construct($mailer, $kernel)
    {
        $this->mailer = $mailer;
        $this->kernel = $kernel;
    }
    
    public function sendEmail($from, $to, $subject, $body, $options = array())
    {
            $options = $options + $this->getDefaultOptions();

            $currentEnvironment = $this->kernel->getEnvironment();        
            if (in_array($currentEnvironment, array('dev', 'test'))) {
                $this->sendEmailtBySwift($from, 'gdeveloperaccount@gmail.com', $subject, $body, $options['Content-Type']);
            }
            else {
                $this->sendEmailtBySwift($from, $to, $subject, $body, $options['Content-Type']);
            }
    }
    
    private function sendEmailtBySwift($from, $to, $subject, $body, $contentType)
    {        
            $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom($from)
            ->addTo($to)
            ->setBody($body);

            $type = $message->getHeaders()->get('Content-Type');
            $type->setValue($contentType);
            $type->setParameter('charset', 'utf-8');

            $this->mailer->send($message);
    }
    
    private function sendEmailByPHPMail($from, $to, $subject, $body, $contentType)
    {
        $messageHeaders = 'From: '. $from . "\r\n" .
            'Content-Type: ' . $contentType . "\r\n" .
            'Reply-To: '. $from . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $body, $messageHeaders);
    }

    public function getDefaultOptions()
    {
        return array(
            'Content-Type' => 'text/html',
        );
    }
}