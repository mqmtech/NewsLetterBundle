<?php

namespace MQM\NewsLetterBundle\Subscriber;

use MQM\NewsLetterBundle\Model\SubscriberManagerInterface;
use MQM\NewsLetterBundle\Model\SubscriberInterface;

class SubscriberAdministrator
{
    private $subscriberManager;
   
    public function __construct(SubscriberManagerInterface $subscriberManager)
    {
        $this->subscriberManager = $subscriberManager;
    }
    
    public function registerSubscriber(SubscriberInterface $subscriber)
    {
        $this->subscriberManager->saveSubscriber($subscriber, true);
    }

    public function unregisterSubscriber(SubscriberInterface $subsciber)
    {
        $this->subscriberManager->deleteSubscriber($subsciber);
    }
}