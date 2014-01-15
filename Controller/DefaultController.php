<?php

namespace Ydle\LogsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{

    /**
     * Homepage for logs
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type
     */
    public function indexAction(Request $request)
    {
        return $this->render('YdleLogsBundle:Default:index.html.twig', array(
        ));
    }
}
