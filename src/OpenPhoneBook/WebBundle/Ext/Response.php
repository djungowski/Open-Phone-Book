<?php
namespace OpenPhoneBook\WebBundle\Ext;

use Symfony\Component\HttpFoundation\Response as HttpResponse;

class Response extends HttpResponse
{
    /**
     * The serializer that serializes the content for the json output
     * 
     * @var \JMS\SerializerBundle\Serializer\SerializerInterface
     */
    private $_serializer;
    
    public function __construct(\JMS\SerializerBundle\Serializer\SerializerInterface $serializer, $status = 200)
    {
        $this->_serializer = $serializer;
        
        $headers = array(
        	'Content-type' => 'application/json; charset=utf-8'
        );
        parent::__construct('', $status, $headers);
    }
    
    public function getSerializer()
    {
        return $this->_serializer;
    }
    
    public function setContent($content)
    {
        $content = $this->_serializer->serialize($content, 'json');
        parent::setContent($content);
    }
}