<?php
require_once 'contact.php';
require_once 'contactmanager.php';
require_once 'commands.php';
//instanceiation de classes 
$command=new Command;
$manager=new ContactManager();
//message a chaque commande
    while (true) {
        $line = readline("Entrez votre commande : ");
        echo "Vous avez saisi : $line\n";
//commande liste    
    if (trim($line) == 'liste'||trim($line) == 'list') {
    $command->list();
}
//commande detail
    elseif (preg_match('/^detail (\d+)$/', $line , $match)) {
    
        $command->detail((int)($match[1]));
}
    elseif (preg_match('/^(ajouter||add) ([^,]+),\s*([^,]+),\s*([^,]+)$/', $line , $match)) {
        $newcontact = new contact();
        $newcontact->setName($match[2]);
        $newcontact->setEmail($match[3]);
        $newcontact->setPhone($match[4]);
        $manager->create($newcontact);
        echo "nouvel utilisateur créé \n";
}
//commande effacer
    elseif (preg_match('/^(effacer|delete) (\d+)$/', $line, $match)){
        $command->delete((int)($match[2]));

}
//commande aide
    elseif (trim($line) == 'aide'||trim($line) == 'help') {
        $command->help();  }



//commande modifier
    elseif (preg_match('/^(modifier|modify) (\d+)$/', $line, $match)){
        $command->modify((int)($match[2]));
}
//message d'erreur si la commande n'est pas parmi les cas prevus
    else {
    echo "Cette commande n'existe pas, tapez aide pour voir les commande valides\n
This command does not exist, type help to see valid commands\n\n";
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