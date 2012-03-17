<?php
namespace OpenPhoneBook\WebBundle\Ext;

use Symfony\Component\HttpFoundation\Response as HttpResponse;

/**
 * 
 * @author djungowski
 *
 */
class Response extends HttpResponse
{
    /**
     * The serializer that serializes the content for the json output
     * 
     * @var \JMS\SerializerBundle\Serializer\SerializerInterface
     */
    private $_serializer;
    
    /**
     * Response Implementation usable with Ext JS 
     *
     * @param \JMS\SerializerBundle\Serializer\SerializerInterface $serializer
     * @param Array $content
     * @param Integer $status
     */
    public function __construct(\JMS\SerializerBundle\Serializer\SerializerInterface $serializer, Array $content = array(), $status = 200)
    {
        $this->_serializer = $serializer;
        
        $headers = array(
        	'Content-type' => 'application/json; charset=utf-8'
        );
        parent::__construct('', $status, $headers);
        
        $this->setContent($content);
    }
    
    /**
     * Get the configured serializer
     * 
     * @return \JMS\SerializerBundle\Serializer\SerializerInterface
     */
    public function getSerializer()
    {
        return $this->_serializer;
    }
    
    /**
     * Set the Content for the htttp response. Must be an array!
     *
     * @see Symfony\Component\HttpFoundation.Response::setContent()
     * 
     * @param String $content
     * 
     */
    public function setContent($content)
    {
        $content = array(
            'record' => $content,
            'total' => count($content)
        );
        $content = $this->_serializer->serialize($content, 'json');
        parent::setContent($content);
    }
}