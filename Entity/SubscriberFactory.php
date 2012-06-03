<?php

namespace MQM\NewsLetterBundle\Entity;

use MQM\NewsLetterBundle\Model\SubscriberFactoryInterface;

class SubscriberFactory implements SubscriberFactoryInterface
{
    private $subscriberClass;

    
    public function __construct($subscriberClass) {
        $this->subscriberClass = $subscriberClass;
    }
    
    /**
     * {@inheritDoc}
     */
    public function createSubscriber()
    {
        return new $this->subscriberClass();
    }

    /**
     * {@inheritDoc}
     */
    public function getSubscriberClass()
    {
        return $this->subscriberClass;
    }
}