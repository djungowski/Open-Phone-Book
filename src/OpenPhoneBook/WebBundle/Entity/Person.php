<?php
namespace OpenPhoneBook\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="person")
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
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set room
     *
     * @param integer $room
     */
    public function setRoom($room)
    {
        $this->room = $room;
    }

    /**
     * Get room
     *
     * @return integer 
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * Set directaccess
     *
     * @param integer $directaccess
     */
    public function setDirectaccess($directaccess)
    {
        $this->directaccess = $directaccess;
    }

    /**
     * Get directaccess
     *
     * @return integer 
     */
    public function getDirectaccess()
    {
        return $this->directaccess;
    }
}