<?php

namespace MQM\NewsLetterBundle\Test\NewsLetter;

use MQM\NewsLetterBundle\Model\NewsLetterManagerInterface;
use MQM\NewsLetterBundle\Model\SubscriberManagerInterface;
use MQM\NewsLetterBundle\NewsLetter\NewsLetterAdministrator;

class NewsLetterManagerTest extends \Symfony\Bundle\FrameworkBundle\Test\WebTestCase
{   
    protected $_container;
    
    /**
     * @var NewsLetterManagerInterface
     */
    private $newsLetterManager;
    
    /**
     * @var SubscriberManagerInterface 
     */
    private $subscriberManager;
    
    /**
     *
     * @var NewsLetterAdministrator 
     */
    private $newsLetterAdmin;

    public function __construct()
    {
        parent::__construct();
        
        $client = static::createClient();
        $container = $client->getContainer();
        $this->_container = $container;  
    }
    
    protected function setUp()
    {
        $this->newsLetterManager = $this->get('mqm_newsLetter.newsLetter_manager');
        $this->subscriberManager = $this->get('mqm_newsLetter.subscriber_manager');
        $this->newsLetterAdmin = $this->get('mqm_newsLetter.newsLetter_administrator');
    }

    protected function tearDown()
    {
        $this->resetNewsLetters();
        $this->resetSubscribers();
    }

    protected function get($service)
    {
        return $this->_container->get($service);
    }
    
    public function testGetAssertManager()
    {
        $this->assertNotNull($this->newsLetterManager);
    }
    
    public function testGeSubscriberManager()
    {
        $this->assertNotNull($this->subscriberManager);
    }
    
    public function testNewsLetterAdmin()
    {
        $this->assertNotNull($this->newsLetterAdmin);
    }
    
    public function testNewSubscriber()
    {
        $subscriber = $this->createNewSubscriber();

        $subscribers = $this->subscriberManager->findSubscribers();
        $this->assertEquals(1, count($subscribers));
    }

    private function createNewSubscriber()
    {
        $subscriber = $this->subscriberManager->createSubscriber();
        $subscriber->setEmail('ciberxtrem@gmail.com');
        $this->subscriberManager->saveSubscriber($subscriber, true);

        return $subscriber;
    }

    public function testSendMails()
    {
        $subscriber = $this->createNewSubscriber();
        $newsLetter = $this->createNewsLetter();

        $this->newsLetterAdmin->sendNewsLetter($newsLetter);
    }

    private function createNewsLetter()
    {
        $newsLetter = $this->newsLetterManager->createNewsLetter();
        $newsLetter->setBody('test newsletter body');
        $newsLetter->setTitle('test newsletter');
        $this->newsLetterManager->saveNewsLetter($newsLetter);

        return $newsLetter;
    }
    
    private function resetNewsLetters()
    {
        $categories = $this->newsLetterManager->findNewsLetters();
        foreach ($categories as $newsLetter) {
            $this->newsLetterManager->deleteNewsLetter($newsLetter, false);
        }
        $this->newsLetterManager->flush();
    }

    private function resetSubscribers()
    {
        $entities = $this->subscriberManager->findSubscribers();
        foreach ($entities as $entity) {
            $this->subscriberManager->deleteSubscriber($entity, false);
        }
        $this->subscriberManager->flush();
    }
}
