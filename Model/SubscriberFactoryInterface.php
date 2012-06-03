<?php

namespace MQM\NewsLetterBundle\Model;

use MQM\NewsLetterBundle\Model\SubscriberInterface;

interface SubscriberFactoryInterface
{
    /**
     * @return SubscriberInterface
     */
    public function createSubscriber();
    
    /**
     *
     * @return string 
     */
    public function getSubscriberClass();
}


