<?php
require_once 'contact.php';
require_once 'contactmanager.php';
require_once 'commandes.php';

$commande=new command;
$manager=new ContactManager();
while (true) {
    $line = readline("Entrez votre commande : ");
    echo "Vous avez saisi : $line\n";
    
if (trim($line) == 'list') {
    $commande->list();
}
elseif (preg_match('/^detail (\d+)$/', $line , $match)) {
    
$commande->detail((int)($match[1]));
}
elseif (preg_match('/^create ([^,]+),\s*([^,]+),\s*([^,]+)$/', $line , $match)) {
$newcontact = new contact();
$newcontact->setname($match[1]);
$newcontact->setemail($match[2]);
$newcontact->setphone($match[3]);
$manager->create($newcontact);
echo "nouvel utilisateur créé \n";
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