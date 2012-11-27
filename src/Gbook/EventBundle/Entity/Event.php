<?php

namespace Gbook\EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Event
 *
 * @ORM\Table(name="gbook_event")
 * @ORM\Entity(repositoryClass="Gbook\EventBundle\Entity\EventRepository")
 */
class Event
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Assert\Length(min = 3, max = 25)
     * @Assert\NotBlank
     * @Assert\Regex(
     *     pattern="[a-zA-Zа-яА-Я]",
     *     message="Your name must contain Latin characters only"
     * )
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     * @Assert\Email
     * @Assert\NotBlank
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     * @Assert\Length(min = 100, max = 1000)
     * @Assert\NotBlank
     * @ORM\Column(name="textbox", type="string", length=1000)
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
     * Set email
     *
     * @param string $email
     * @return Event
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
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
