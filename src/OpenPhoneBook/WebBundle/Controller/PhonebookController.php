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
        $start = (int)$request->get('start');
		if ($start == 0) $start = 0;
        $limit = (int)$request->get('limit');
		if ($limit == 0) $limit = 0;
        
        if (!empty($query)) {
            $queryLike = '%' . str_replace(' ', '%', $query) . '%';
                        
            $qb = $doctrine->createQueryBuilder();
            $query = $qb->select('p')
                        ->from('OpenPhoneBookWebBundle:Person', 'p')
                        ->where('p.name LIKE ?1 OR p.firstname LIKE ?1 OR p.room LIKE ?1 OR p.directaccess LIKE ?1')
                        ->setParameter(1, $queryLike)
//                        ->setParameter(2, $query)
//                        ->setFirstResult($start)
//                        ->setMaxResults($limit)
                        ->getQuery();
        } else {
            $qb = $doctrine->getRepository('OpenPhoneBookWebBundle:Person')->createQueryBuilder('p');
/*            $query = $qb->setFirstResult($start)
                        ->setMaxResults($limit)
                        ->getQuery();*/
            $query = $qb->getQuery();			 
        }
        $persons = $query->getResult();
        
        $response = new Response($this->container->get('serializer'), $persons);
        return $response;
    }
}
