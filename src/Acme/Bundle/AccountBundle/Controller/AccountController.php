<?php

namespace Acme\Bundle\AccountBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AccountController extends Controller
{
    public function indexAction()
    {
        return $this->render('AcmeAccountBundle:Account:index.html.twig');
    }

    public function orderAction()
    {
        return $this->render('AcmeAccountBundle:Account:order.html.twig');
    }

    public function cartAction()
    {
        return $this->render('AcmeAccountBundle:Account:cart.html.twig');
    }
}
