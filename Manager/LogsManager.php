<?php

namespace Ydle\LogsBundle\Manager;

use Doctrine\ORM\EntityManager;
use Ydle\IhmBundle\Manager\BaseManager;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Ydle\LogsBundle\Entity\Logs;
use Ydle\LogsBundle\Repository\Logs as LogsRepository;

class LogsManager extends BaseManager
{

    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function findAllByName()
    {
        return $this->getRepository()->findAll();
    }

    public function getRepository()
    {
        return $this->em->getRepository('YdleLogsBundle:Logs');
    }
    
    /**
    * Save a log in database
    * 
    * @param string $type
    * @param string $text
    * @return Logs
    */
    public function log($type, $text, $source='')
    {
        $log = new Logs();
        $log->setType($type);
        $log->setSource($source);
        $log->setContent($text);
        
        $this->em->persist($log);
        $this->em->flush();
        
        return $log;
    }
    
    public function createViewLogQuery()
    {
        return $this->getRepository()->createViewLogQuery();
    }
    
    public function reset()
    {
        return $this->getRepository()->reset();
    }

}
