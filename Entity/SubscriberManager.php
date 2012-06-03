<?php

namespace MQM\NewsLetterBundle\Entity;

use MQM\NewsLetterBundle\Model\SubscriberManagerInterface;
use MQM\NewsLetterBundle\Model\SubscriberFactoryInterface;
use MQM\NewsLetterBundle\Model\SubscriberInterface;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class SubscriberManager implements SubscriberManagerInterface
{
    private $factory;
    private $entityManager;
    private $repository;
   
    public function __construct(EntityManager $entityManager, SubscriberFactoryInterface $subscriberFactory)
    {
        $this->entityManager = $entityManager;
        $this->factory = $subscriberFactory;
        $subscriberClass = $subscriberFactory->getSubscriberClass();
        $this->repository = $entityManager->getRepository($subscriberClass);
    }
    
    /**
     * {@inheritDoc} 
     */
    public function createSubscriber()
    {
        return $this->getFactory()->createSubscriber();
    }
    
    /**
     * {@inheritDoc} 
     */
    public function saveSubscriber(SubscriberInterface $subscriber, $andFlush = true)
    {
        $this->getEntityManager()->persist($subscriber);
        if ($andFlush) {
            $this->getEntityManager()->flush();
        }
    }
    
    /**
     * {@inheritDoc} 
     */
    public function deleteSubscriber(SubscriberInterface $subscriber, $andFlush = true)
    {
        $this->getEntityManager()->remove($subscriber);
        if ($andFlush) {
            $this->getEntityManager()->flush();
        }
    }
    
    /**
     * {@inheritDoc}
     */
    public function flush()
    {
        $this->getEntityManager()->flush();
    }
    
    public function findSubscriberBy(array $criteria)
    {
        return $this->getRepository()->findOneBy($criteria);
    }
    
    public function findSubscribers()
    {
        return $this->getRepository()->findAll();
    }
    
    /**
     *
     * @return SubscriberFactory
     */
    protected function getFactory()
    {
        return $this->factory;
    }

    /**
     *
     * @return EntityManager
     */
    protected function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     *
     * @return EntityRepository
     */
    protected function getRepository()
    {
        return $this->repository;
    }
}