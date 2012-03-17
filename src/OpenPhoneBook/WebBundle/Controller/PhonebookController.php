<?php
namespace OpenPhoneBook\WebBundle\Controller;

use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;
use Doctrine\ORM\Query;
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
        $request = $this->get('request');
        $serializer = $this->container->get('serializer');
                
        $query = (string)$request->get('q');
        
        if (!empty($query)) {
            $persons = $this->getDoctrine()->getRepository('OpenPhoneBookWebBundle:Person')->findByName($query);
        } else {
            $persons = $this->getDoctrine()->getRepository('OpenPhoneBookWebBundle:Person')->findAll();
        }
        
        $data = array(
            'record' => $persons,
            'total' => count($persons)
        );
        
        $response = new Response(
            $serializer->serialize($data, 'json'),
            200,
            array(
            	'Content-type', 
            	'application/json; charset=utf-8'
            )
        );
        return $response;
    }
}
