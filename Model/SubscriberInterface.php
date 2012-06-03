<?php

namespace MQM\NewsLetterBundle\Model;

use MQM\AssetBundle\Model\FileAssetInterface;

interface SubscriberInterface
{
    public function getId();
    
    public function getName();
    
    public function setName($name);
    
    public function getEmail();
    
    public function setEmail($email);
    
}