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
        $query = $this->get('ydle.logger')->createViewLogQuery();

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1)/*page number*/,
            25/*limit per page*/
        );
        return $this->render('YdleLogsBundle:Default:index.html.twig', array(
            'pagination' => $pagination
        ));
    }
    
    public function resetAction(Request $request)
    {
        $this->get('session')->getFlashBag()->add('notice', 'You logs table is now empty');
        return $this->redirect($this->generateUrl('logs'));
    }
}
