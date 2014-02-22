<?php
/*
  This file is part of Ydle.

    Ydle is free software: you can redistribute it and/or modify
    it under the terms of the GNU  Lesser General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Ydle is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU  Lesser General Public License for more details.

    You should have received a copy of the GNU Lesser General Public License
    along with Ydle.  If not, see <http://www.gnu.org/licenses/>.
 */
namespace Ydle\LogsBundle\Manager;

use Doctrine\ORM\EntityManager;
use Ydle\HubBundle\Manager\BaseManager;
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
