<?php   
require_once 'contactmanager.php';
require_once 'bdd.php';
require_once 'contact.php';
//creation de la classe
class command
{
  //fonction list pour recupérer les contacts
public function list():void {
     $monmanager = new contactmanager();
    $liste = $monmanager->findall();
  foreach ($liste as $con){
    echo $con->tostring() . "\n";
    }
}
//fonction pour recupérer les détails a partir d'une id
public function detail(int $id): void {
$mondetail = new contactmanager();
$contact = $mondetail->findbyid($id);
echo $contact->tostring() . "\n";

}
//fonction pour ajouter un utilisateur
public function create(int $id, string $name, string $email, string $phone):void 
{
$newcontact = new contactmanager();


}
//fonction pour effacer un utilisateur a partir de son ID
public function delete(int $id): void {
$delcontact=new contactmanager();
$delcontact->delete($id);
echo "Utilisateur '$id' supprimé \n";
}
//fonction pour afficher l'aide
public function help():void {
echo "Commandes disponible : \n 
'liste' : affiche tous les utilisateurs et leur ID.\n
'list': displays all users and their IDs.\n\n
'detail + ID' : affiche un l'utilisateur selectionné. \n
'detail + ID': displays selected user.\n\n 
'ajouter + nom, email, tel' : crée un nouvel utilisateur. \n
'add + name, email, tel': creates new user.\n\n
'aide' : affiche la liste des commandes. \n
'help': displays helpcommand list. \n\n
'effacer + ID' : supprime l'utilisateur selectionné. \n
'delete + ID': deletes selected user. \n\n
'modifier' + ID : modifie les données de l'utilisateur selectionné.\n
'modify + ID': modifies selected user details \n\n";
}
//fonction pour modifier un utilisateur
public function modify(int $id):void {
$modcontact=new contactmanager();
$oldcontact = $modcontact->findbyid($id);
//si l'ID ne correspond a rien on s'arrete
if ($oldcontact==false)
return; 
//on demande à l'utilisateur un nom puis un mail puis un tel quo'n stock dans un variable $new
$newname=readline("quel est le nouveau nom ?");
$newemail=readline("quel est le nouvel email ?");
$newphone=readline("quel est le nouvel numero ?");
//on modifie les nouveaux nom, mail et tel dans une variable
$oldcontact->setname($newname);
$oldcontact->setemail($newemail);
$oldcontact->setphone($newphone);
//on modifie le contact
$modcontact->modify($oldcontact);
}
} 