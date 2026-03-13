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
} 