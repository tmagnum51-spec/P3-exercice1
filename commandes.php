<?php   
require_once 'contactmanager.php';
require_once 'bdd.php';
require_once 'contact.php';
class command
{
public function list():void {
     $monmanager = new contactmanager();
    $liste = $monmanager->findall();
  foreach ($liste as $con){
    echo $con->tostring() . "\n";
    }
}
public function detail(int $id): void {
$mondetail = new contactmanager();
$contact = $mondetail->findbyid($id);
echo $contact->tostring() . "\n";

}
public function create(int $id, string $name, string $email, string $phone):void 
{
$newcontact = new contactmanager();


}
public function delete(int $id): void {
$delcontact=new contactmanager();
$delcontact->delete($id);
echo "Utilisateur '$id' supprimé \n";
}
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
public function modify(int $id):void {
$modcontact=new contactmanager();
$oldcontact = $modcontact->findbyid($id);
if ($oldcontact==false)
return; 
$newname=readline("quel est le nouveau nom ?");
$newemail=readline("quel est le nouvel email ?");
$newphone=readline("quel est le nouvel numero ?");

$oldcontact->setname($newname);
$oldcontact->setemail($newemail);
$oldcontact->setphone($newphone);

$modcontact->modify($oldcontact);
}
} 