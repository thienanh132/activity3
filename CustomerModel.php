<?php
namespace App\Models;
class CustomerModel
{
    private $firstName;
    private $lastName;
    
    // Class Constructor
    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
    /**
     * Getter method -> firstName
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
    /**
     * Getter method -> lastName
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }
}
