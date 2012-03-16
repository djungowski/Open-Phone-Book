<?php
namespace OpenPhoneBook\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="person")
 * 
 *
 */
class Person
{
    /**
     * @var integer id
     * 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * 
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string")
     * 
     */
    protected $name;
    
    /**
     * @ORM\Column(type="string")
     * 
     */
    protected $firstname;
    
    /**
     * @ORM\Column(type="integer")
     * 
     */
    protected $room;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $directaccess;
    
    /**
     * Get id
     * 
	 * @return Integer
     */
    public function getId()
    {
        return $this->id;
    }
    
	/**
     * Get name
     * 
	 * @return String
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Sets name
     *
     * @param String $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
	/**
     * Get first name
     * 
	 * @return String
     */
    public function getFirstname()
    {
        return $this->firstname;
    }
    
    /**
     * Sets first name
     *
     * @param String $firstname
     */
    public function setFirstname($firstname)
    {
        $this->name = $firstname;
    }
    
	/**
     * Get direct access
     * 
	 * @return Integer
     */
    public function getDirectaccess()
    {
        return $this->directaccess;
    }
    
    /**
     * Sets direct access
     *
     * @param Integer $directaccess
     */
    public function setDirectaccess($directacccess)
    {
        $this->directaccess = $directacccess;
    }
    
	/**
     * Get room
     * 
	 * @return Integer
     */
    public function getRoom()
    {
        return $this->room;
    }
    
    /**
     * Sets room
     *
     * @param Integer $room
     */
    public function setRoom($room)
    {
        $this->room = $room;
    }
}