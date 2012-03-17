<?php 
namespace OpenPhoneBook\WebBundle\Ext;

use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class ResponseTest extends \PHPUnit_Framework_TestCase
{
    private function getSerializerMock()
    {
        return $this->getMock('\JMS\SerializerBundle\Serializer\SerializerInterface');
    }
    
    public function testHeritage()
    {
        $response = new Response($this->getSerializerMock());
        self::assertInstanceOf('Symfony\Component\HttpFoundation\Response', $response);
    }
    
    public function testCodeIsPassedThrough()
    {
        $response = new Response($this->getSerializerMock(), 400);
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
    
    public function testSetContentArrayWithSerializer()
    {
        $content = array(
            'value1',
            'value2',
            'value3'
        );
        
        $serializer = $this->getSerializerMock();
        $serializer->expects($this->any())
             ->method('serialize')
             ->will($this->returnCallback(function($in) {
                 return json_encode($in);
             }));
        
        $response = new Response($serializer);
        
        $response->setContent($content);
        self::assertSame('{"record":["value1","value2","value3"],"total":3}', $response->getContent());
    }
}