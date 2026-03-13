<?php

class contact
{

private int $userid;
private string $contactname;
private string $contactemail;
private string $contactphone;

public function getID(): ?int
{
return $this->userid;
}
public function getname(): ?string
{return $this->contactname;}
public function getemail(): ?string
{return $this->contactemail;}
public function getphone(): ?string
{return $this->contactphone;}


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

public function toString(): string
{
    return 'contact n°' .' ' . $this->userid . " : " . "Nom : " . $this->contactname . " " . "Email : " . $this->contactemail . " " . "Tel : " . $this->contactphone;

}
}
