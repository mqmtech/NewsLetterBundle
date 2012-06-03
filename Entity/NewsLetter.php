<?php

namespace MQM\NewsLetterBundle\Entity;

use MQM\AssetBundle\Entity\FileAsset;
use MQM\NewsLetterBundle\Model\NewsLetterInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="shop_newsletter")
 * @ORM\Entity
 */
class NewsLetter implements NewsLetterInterface
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $title;
    
    /**
     * @ORM\Column(name="type", type="text", nullable=true)
     */
    private $body;
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }
}