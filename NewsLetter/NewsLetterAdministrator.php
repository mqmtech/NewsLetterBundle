<?php

namespace MQM\NewsLetterBundle\NewsLetter;

use MQM\NewsLetterBundle\Model\SubscriberManagerInterface;
use MQM\NewsLetterBundle\Model\SubscriberInterface;
use MQM\NewsLetterBundle\Model\NewsLetterInterface;
use MQM\NewsLetterBundle\Mailer\MailerInterface;

class NewsLetterAdministrator
{
    private $subscriberManager;
    private $mailer;

    public function __construct(SubscriberManagerInterface $subscriberManager, MailerInterface $mailer)
    {
        $this->subscriberManager = $subscriberManager;
        $this->mailer = $mailer;
    }
    
    public function sendNewsLetter(NewsLetterInterface $newsLetter, $options = array())
    {
        $subscribers = $this->subscriberManager->findSubscribers();
        foreach ($subscribers as $subscriber) {
            $this->mailer->sendEmail('amaestramientos@tecno-key.com', $subscriber->getEmail(), $newsLetter->getTitle(), $newsLetter->getBody(), $options);
        }
    }
}