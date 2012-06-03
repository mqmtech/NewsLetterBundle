<?php

namespace MQM\NewsLetterBundle\Model;

use MQM\NewsLetterBundle\Model\NewsLetterInterface;

interface NewsLetterFactoryInterface
{
    /**
     * @return NewsLetterInterface
     */
    public function createNewsLetter();
    
    /**
     *
     * @return string 
     */
    public function getNewsLetterClass();
}


