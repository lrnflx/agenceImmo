<?php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact{
    
    /**
     * @var string|null
     * @Assert\NotBlank
     * @Assert\Length(min=2, max=100)
     */
    private $firstname;

    /**
     * @var string|null
     * @Assert\NotBlank
     * @Assert\Length(min=2, max=100)
     */
    private $lastname;

    /**
     * @var string|null
     * @Assert\NotBlank
     * @Assert\Regex(
     * pattern="/[0-9]{10}/"
     * )
     */
    private $phone;
    
    /**
     * @var string|null
     * @Assert\NotBlank
     * @Assert\Email()
     */
    private $email;
    
    /**
    * @var string|null
    * @Assert\NotBlank
    * @Assert\Length(min=10)
    */
    private $message;

    /**
     * @var Property|null
     */
    private $property;

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setfirstname($firstname)
    {
        $this->firstname = $firstname;
    }


    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getProperty()
    {
        return $this->property;
    }

    public function setProperty($property)
    {
        $this->property = $property;
    }
}