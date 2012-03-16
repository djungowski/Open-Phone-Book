<?php

namespace OpenPhoneBook\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class PhonebookController extends Controller
{

    /**
     * @Template()
     */
    public function indexAction()
    {
        $data = array(
            'record' => array(),
            'total' => 0
        );
        
        $response = new Response(
            json_encode($data),
            200,
            array(
            	'Content-type', 
            	'application/json; charset=utf-8'
            )
        );
        return $response;
    }
}
