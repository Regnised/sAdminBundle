<?php

namespace Gbook\EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gbook\EventBundle\Entity\Event
 *
 * @ORM\Table(name="gbook_event")
 * @ORM\Entity(repositoryClass="Gbook\EventBundle\Entity\EventRepository")
 */
class Event
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime $time
     *
     * @ORM\Column(name="time", type="datetime")
     */
    private $time;

    /**
     * @var string $textbox
     *
     * @ORM\Column(name="textbox", type="string", length=255)
     */
    private $textbox;


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
     * @return Event
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
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
     * Set time
     *
     * @param \DateTime $time
     * @return Event
     */
    public function setTime($time)
    {
        $this->time = $time;
    
        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime 
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set textbox
     *
     * @param string $textbox
     * @return Event
     */
    public function setTextbox($textbox)
    {
        $this->textbox = $textbox;
    
        return $this;
    }

    /**
     * Get textbox
     *
     * @return string 
     */
    public function getTextbox()
    {
        return $this->textbox;
    }
}
