<?php

namespace MQM\NewsLetterBundle\Model;

use MQM\NewsLetterBundle\Model\NewsLetterInterface;

interface NewsLetterManagerInterface
{
    /**
     * @return NewsLetterInterface
     */
    public function createNewsLetter();
    
    /**
     *
     * @param NewsLetterInterface $newsLetter
     * @param boolean $andFlush 
     */
    public function saveNewsLetter(NewsLetterInterface $newsLetter, $andFlush = true);
    
    /**
     *
     * @param NewsLetterInterface $newsLetter
     * @param boolean $andFlush 
     */
    public function deleteNewsLetter(NewsLetterInterface $newsLetter, $andFlush = true);
    
    /**
     * @return NewsLetterManagerInterface
     */
    public function flush();
    
    /**
     * @param array 
     * @return NewsLetterInterface
     */
    public function findNewsLetterBy(array $criteria);
    
    /**
     * @return array 
     */
    public function findNewsLetters();
}