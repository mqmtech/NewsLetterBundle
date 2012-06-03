<?php

namespace MQM\NewsLetterBundle\Model;

use MQM\NewsLetterBundle\Model\SubscriberInterface;

interface SubscriberManagerInterface
{
    /**
     * @return SubscriberInterface
     */
    public function createSubscriber();
    
    /**
     *
     * @param SubscriberInterface $subscriber
     * @param boolean $andFlush 
     */
    public function saveSubscriber(SubscriberInterface $subscriber, $andFlush = true);
    
    /**
     *
     * @param SubscriberInterface $subscriber
     * @param boolean $andFlush 
     */
    public function deleteSubscriber(SubscriberInterface $subscriber, $andFlush = true);
    
    /**
     * @return SubscriberManagerInterface
     */
    public function flush();
    
    /**
     * @param array 
     * @return SubscriberInterface
     */
    public function findSubscriberBy(array $criteria);
    
    /**
     * @return array 
     */
    public function findSubscribers();
}