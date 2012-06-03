<?php

namespace MQM\NewsLetterBundle\Entity;

use MQM\NewsLetterBundle\Model\NewsLetterManagerInterface;
use MQM\NewsLetterBundle\Model\NewsLetterFactoryInterface;
use MQM\NewsLetterBundle\Model\NewsLetterInterface;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class NewsLetterManager implements NewsLetterManagerInterface
{
    private $factory;
    private $entityManager;
    private $repository;
   
    public function __construct(EntityManager $entityManager, NewsLetterFactoryInterface $newsLetterFactory)
    {
        $this->entityManager = $entityManager;
        $this->factory = $newsLetterFactory;
        $newsLetterClass = $newsLetterFactory->getNewsLetterClass();
        $this->repository = $entityManager->getRepository($newsLetterClass);
    }
    
    /**
     * {@inheritDoc} 
     */
    public function createNewsLetter()
    {
        return $this->getFactory()->createNewsLetter();
    }
    
    /**
     * {@inheritDoc} 
     */
    public function saveNewsLetter(NewsLetterInterface $newsLetter, $andFlush = true)
    {
        $this->getEntityManager()->persist($newsLetter);
        if ($andFlush) {
            $this->getEntityManager()->flush();
        }
    }
    
    /**
     * {@inheritDoc} 
     */
    public function deleteNewsLetter(NewsLetterInterface $newsLetter, $andFlush = true)
    {
        $this->getEntityManager()->remove($newsLetter);
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
    
    public function findNewsLetterBy(array $criteria)
    {
        return $this->getRepository()->findOneBy($criteria);
    }
    
    public function findNewsLetters()
    {
        return $this->getRepository()->findAll();
    }
    
    /**
     *
     * @return NewsLetterFactory
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