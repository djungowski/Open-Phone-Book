<?php 
namespace OpenPhoneBook\WebBundle\Ext;

use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class ResponseTest extends \PHPUnit_Framework_TestCase
{
    private function getSerializerMock()
    {
        $serializer = $this->getMock('\JMS\SerializerBundle\Serializer\SerializerInterface');
        $serializer->expects($this->any())
             ->method('serialize')
             ->will($this->returnCallback(function($in) {
                 return json_encode($in);
             }));
        return $serializer;
    }
    
    public function testHeritage()
    {
        $response = new Response($this->getSerializerMock());
        self::assertInstanceOf('Symfony\Component\HttpFoundation\Response', $response);
    }
    
    public function testCodeIsPassedThrough()
    {
        $response = new Response($this->getSerializerMock(), array(), 400);
        self::assertEquals(400, $response->getStatusCode());
    }
    
    public function testHeaders()
    {
        $response = new Response($this->getSerializerMock());
        
        $date = new \DateTime(null, new \DateTimeZone('UTC'));
        $header = new ResponseHeaderBag(
            array(
            	'Content-Type' =>'application/json; charset=utf-8',
                'Date' => $date->format('D, d M Y H:i:s').' GMT'
            )
        );
        self::assertEquals($response->headers, $header);
    }
    
    public function testGetSerializer()
    {
        $mock = $this->getSerializerMock();
        $response = new Response($mock);
        self::assertSame($mock, $response->getSerializer());
    }
    
    public function testDefaultContent()
    {
        $serializer = $this->getSerializerMock();
        $response = new Response($serializer);
        self::assertSame('{"record":[],"total":0}', $response->getContent());
    }
    
    public function testCreationWithContent()
    {
        $content = array(
            'value1',
            'value2',
            'value3'
        );
        
        $serializer = $this->getSerializerMock();
        $response = new Response($serializer, $content);
        self::assertSame('{"record":["value1","value2","value3"],"total":3}', $response->getContent());
    }
    
    public function testSetContent()
    {
        $content = array(
            'value1',
            'value2',
            'value3'
        );
        
        $serializer = $this->getSerializerMock();        
        $response = new Response($serializer);
        
        $response->setContent($content);
        self::assertSame('{"record":["value1","value2","value3"],"total":3}', $response->getContent());
    }
}