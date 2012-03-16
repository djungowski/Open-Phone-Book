<?php

namespace OpenPhoneBook\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{

    /**
     * @Template()
     */
    public function indexAction()
    {
        return array();
//        return $this->render('OpenPhoneBookWebBundle:Default:index.html.twig', array('name' => $name));
    }
}
