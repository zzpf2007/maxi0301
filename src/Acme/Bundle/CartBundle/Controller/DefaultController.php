<?php

namespace Acme\Bundle\CartBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AcmeCartBundle:Default:index.html.twig');
    }
}
