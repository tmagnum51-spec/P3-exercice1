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
        $contactAll = $req->fetchall();

        foreach ($contactAll as $line) {
            $oneCon = new Contact();
            $oneCon->setID($line['user_id'] );
            $oneCon->setName($line['name']);
            $oneCon->setEmail($line['email']);
            $oneCon->setPhone($line['phone_number']);

            $contacts[] = $oneCon;

        }

        return $contacts;
    }
//gestion de la commande detail
    public function findbyid(int $id) {
        $db = DBConnect::getPDO();

        $req = $db->prepare('SELECT * FROM `contact` WHERE user_id = :id');
        $req->execute(['id' =>$id]);
        $contactDetail = $req->fetch();
        $conta = new contact;
        $conta->setID($contactDetail['user_id']);
        $conta->setName($contactDetail['name']);
        $conta->setEmail($contactDetail['email']);
        $conta->setPhone($contactDetail['phone_number']);
        return $conta;
    }
    //gestion de la commande ajouter
    public function create($newContact) {
        $db = DBConnect::getPDO();
        $req = $db->prepare ("INSERT INTO `contact`(`name`, `email`, `phone_number`) VALUES (:name, :email, :phone_number)");
        $req->execute(['name'=>$newContact->getName(), 'email'=>$newContact->getEmail(), 'phone_number'=>$newContact->getPhone()]); 
    }
    //gestion de la commande delete
    public function delete($id)
    {
        $db = DBConnect::getPDO();
        $req = $db->prepare ('DELETE FROM `contact` WHERE user_id = :id');
        $req->execute(['id'=>$id]);
    }
    //gestion de la commande modify
    public function modify($modContact) {
        $db = DBConnect::getPDO();
        $req = $db->prepare("UPDATE `contact` SET `name`=:name, `email`=:email, `phone_number`=:phone_number WHERE user_id = :id");
        $req->execute(['id'=>$modContact->getID(), 'name'=>$modContact->getName(), 'email'=>$modContact->getEmail(), 'phone_number'=>$modContact->getPhone()]);

    }
}

?>