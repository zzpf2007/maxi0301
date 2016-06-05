<?php

namespace Acme\Bundle\OrderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AcmeOrderBundle:Default:index.html.twig');
    }
}
