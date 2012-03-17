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
            $queryLike = '%' . str_replace(' ', '%', $query) . '%';
                        
            $qb = $doctrine->createQueryBuilder();
            $query = $qb->select('p')
                        ->from('OpenPhoneBookWebBundle:Person', 'p')
                        ->where('p.name LIKE ?1 OR p.firstname LIKE ?1 OR p.room = ?2 OR p.directaccess = ?2')
                        ->setParameter(1, $queryLike)
                        ->setParameter(2, $query)
                        ->getQuery();
            $persons = $query->getResult();
        } else {            
            $persons = $this->getDoctrine()->getRepository('OpenPhoneBookWebBundle:Person')->findAll();
        }
        
        $response = new Response($this->container->get('serializer'), $persons);
        return $response;
    }
}
