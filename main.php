<?php
require_once 'contact.php';
require_once 'contactmanager.php';
require_once 'commandes.php';

$commande=new command;
$manager=new ContactManager();
while (true) {
    $line = readline("Entrez votre commande : ");
    echo "Vous avez saisi : $line\n";
    
if (trim($line) == 'liste'||trim($line) == 'list') {
    $commande->list();
}
elseif (preg_match('/^detail (\d+)$/', $line , $match)) {
    
$commande->detail((int)($match[1]));
}
elseif (preg_match('/^(ajouter||add) ([^,]+),\s*([^,]+),\s*([^,]+)$/', $line , $match)) {
$newcontact = new contact();
$newcontact->setname($match[2]);
$newcontact->setemail($match[3]);
$newcontact->setphone($match[4]);
$manager->create($newcontact);
echo "nouvel utilisateur créé \n";
}
elseif (preg_match('/^(effacer|delete) (\d+)$/', $line, $match)){
$commande->delete((int)($match[2]));

}
elseif (trim($line) == 'aide'||trim($line) == 'help') {
$commande->help();  }




elseif (preg_match('/^(modifier|modify) (\d+)$/', $line, $match)){
$commande->modify((int)($match[2]));
}
}
 //   $monmanager = new contactmanager();
 //   $liste = $monmanager->findall();

 //   echo "Affichage de la liste\n";  
 //   foreach ($liste as $con){
  //  echo $con->tostring() . "\n";
//}}

 
//}   

?>