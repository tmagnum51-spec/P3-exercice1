<?php
require_once 'bdd.php';
require_once 'contact.php';
//declaration de la classe manager
Class ContactManager
//gestion de la commande liste
{ 
public function findall()
{
$contacts = [];    
$db = DBConnect::getPDO();

$req = $db->query('SELECT * FROM `contact`');
$contactall = $req->fetchall();

foreach ($contactall as $ligne) {
$uncon = new contact();
$uncon->setID($ligne['user_id'] );
$uncon->setname($ligne['name']);
$uncon->setemail($ligne['email']);
$uncon->setphone($ligne['phone_number']);

$contacts[] = $uncon;

}

return $contacts;
}
//gestion de la commande detail
public function findbyid(int $id) {
$db = DBConnect::getPDO();

$req = $db->prepare('SELECT * FROM `contact` WHERE user_id = :id');
$req->execute(['id' =>$id]);
$contactdetail = $req->fetch();
$conta = new contact;
$conta->setID($contactdetail['user_id']);
$conta->setname($contactdetail['name']);
$conta->setemail($contactdetail['email']);
$conta->setphone($contactdetail['phone_number']);
return $conta;
}
//gestion de la commande ajouter
public function create($newcontact) {
$db = DBConnect::getPDO();
$req = $db->prepare ("INSERT INTO `contact`(`name`, `email`, `phone_number`) VALUES (:name, :email, :phone_number)");
$req->execute(['name'=>$newcontact->getname(), 'email'=>$newcontact->getemail(), 'phone_number'=>$newcontact->getphone()]); 
}
//gestion de la commande delete
public function delete($id)
{
$db = DBConnect::getPDO();
$req = $db->prepare ('DELETE FROM `contact` WHERE user_id = :id');
$req->execute(['id'=>$id]);
}
//gestion de la commande modify
public function modify($modcontact) {
$db = DBConnect::getPDO();
$req = $db->prepare("UPDATE `contact` SET `name`=:name, `email`=:email, `phone_number`=:phone_number WHERE user_id = :id");
$req->execute(['id'=>$modcontact->getid(), 'name'=>$modcontact->getname(), 'email'=>$modcontact->getemail(), 'phone_number'=>$modcontact->getphone()]);

}
}

?>