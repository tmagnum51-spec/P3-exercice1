<?php
//declaration de la classe contact
class contact
{
//declaration des variables du contact
    private int $userid;
    private string $contactname;
    private string $contactemail;
    private string $contactphone;
//accesseur
    public function getID(): ?int
        {
        return $this->userid;
        }
    public function getname(): ?string
        {   
        return $this->contactname;}
    public function getemail(): ?string
        {   
        return $this->contactemail;}
    public function getphone(): ?string
        {   
        return $this->contactphone;}

//mutateurs
    Public function setID(?int $userid):void
    {
        $this->userid = $userid;
    }

    Public function setname(?string $contactname):void
    {
        $this->contactname = $contactname;
    }
    Public function setemail(?string $contactemail):void
    {
        $this->contactemail = $contactemail;
    }
    Public function setphone(?string $contactphone):void
    {
    $this->contactphone = $contactphone;
    }
//concatenation en string
    public function toString(): string
    {
        return 'contact n°' .' ' . $this->userid . " : " . "Nom : " . $this->contactname . " " . "Email : " . $this->contactemail . " " . "Tel : " . $this->contactphone;

    }
}
