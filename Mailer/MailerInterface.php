<?php

namespace MQM\NewsLetterBundle\Mailer;

interface MailerInterface
{    
    public function sendEmail($from, $to, $subject, $body);
}