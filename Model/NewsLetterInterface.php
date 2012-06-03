<?php

namespace MQM\NewsLetterBundle\Model;

use MQM\AssetBundle\Model\FileAssetInterface;

interface NewsLetterInterface
{
    public function getId();
    
    public function getTitle();
    
    public function setTitle($title);
    
    public function getBody();
    
    public function setBody($body);
}