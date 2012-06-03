<?php

namespace MQM\NewsLetterBundle\Entity;

use MQM\AssetBundle\Entity\FileAsset;
use MQM\NewsLetterBundle\Model\SubscriberInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="shop_newsletter_subscriber")
 * @ORM\Entity
 */
class Subscriber implements SubscriberInterface
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;
    
    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}