<?php
namespace OpenPhoneBook\WebBundle\Controller;

use Doctrine\ORM\Query;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use OpenPhoneBook\WebBundle\Ext\Response;

class PhonebookController extends Controller
{

    /**
     * @Template()
     */
    public function indexAction()
    {
        $request = $this->get('request');
        $doctrine = $this->getDoctrine()->getEntityManager();
        $query = (string)$request->get('q');
        
        if (!empty($query)) {            
//            $qb = $doctrine->createQueryBuilder();
//            $query = $qb->select('p')
//                        ->from('OpenPhoneBookWebBundle:Person', 'p')
//                        ->innerJoin('p.company', 'c')
//                        ->where('c.id = p.id')
//                        ->getQuery();
            
            $persons = $this->getDoctrine()->getRepository('OpenPhoneBookWebBundle:Person')->findByName($query);
        } else {            
            $persons = $this->getDoctrine()->getRepository('OpenPhoneBookWebBundle:Person')->findAll();
        }
        
        $response = new Response($this->container->get('serializer'), $persons);
        return $response;
    }
}
