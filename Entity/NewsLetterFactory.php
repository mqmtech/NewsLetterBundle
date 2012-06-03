<?php

namespace MQM\NewsLetterBundle\Entity;

use MQM\NewsLetterBundle\Model\NewsLetterFactoryInterface;

class NewsLetterFactory implements NewsLetterFactoryInterface
{
    private $newsLetterClass;

    
    public function __construct($newsLetterClass) {
        $this->newsLetterClass = $newsLetterClass;
    }
    
    /**
     * {@inheritDoc}
     */
    public function createNewsLetter()
    {
        return new $this->newsLetterClass();
    }

    /**
     * {@inheritDoc}
     */
    public function getNewsLetterClass()
    {
        return $this->newsLetterClass;
    }
}