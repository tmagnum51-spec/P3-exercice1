<?php
//declaration de la classe contact
class Contact
{
//declaration des variables du contact
    private int $userID;
    private string $contactName;
    private string $contactEmail;
    private string $contactPhone;
//accesseur
    public function getID(): ?int
    {
        return $this->userID;
    }
    public function getName(): ?string
    {   
        return $this->contactName;
    }
    public function getEmail(): ?string
    {   
        return $this->contactEmail;
    }
    public function getPhone(): ?string
    {   
        return $this->contactPhone;
    }

//mutateurs
    Public function setID(?int $userID):void
    {
        $this->userID = $userID;
    }

    Public function setName(?string $contactName):void
    {
        $this->contactName = $contactName;
    }
    Public function setEmail(?string $contactEmail):void
    {
        $this->contactEmail = $contactEmail;
    }
    Public function setPhone(?string $contactPhone):void
    {
    $this->contactPhone = $contactPhone;
    }
//concatenation en string
    public function toString(): string
    {
        return 'Contact n°' .' ' . $this->userID . " : " . "Nom : " . $this->contactName . " " . "Email : " . $this->contactEmail . " " . "Tel : " . $this->contactPhone;
    }
}
