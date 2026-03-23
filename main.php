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
    } elseif (preg_match('/^detail (\d+)$/', $line , $match)) {
        //commande detail
    
        $command->detail((int)($match[1]));
    } elseif (preg_match('/^(ajouter||add) ([^,]+),\s*([^,]+),\s*([^,]+)$/', $line , $match)) {
        $newcontact = new contact();
        $newcontact->setName($match[2]);
        $newcontact->setEmail($match[3]);
        $newcontact->setPhone($match[4]);
        $manager->create($newcontact);
        echo "nouvel utilisateur créé \n";
    } elseif (preg_match('/^(effacer|delete) (\d+)$/', $line, $match)){
        //commande effacer
        $command->delete((int)($match[2]));

    } elseif (trim($line) == 'aide'||trim($line) == 'help') {
        //commande aide
        $command->help();  
    } elseif (preg_match('/^(modifier|modify) (\d+)$/', $line, $match)){
        //commande modifier
        $command->modify((int)($match[2]));
    } else {
        //message d'erreur si la commande n'est pas parmi les cas prevus
        echo "Cette commande n'existe pas, tapez aide pour voir les commande valides\n
        This command does not exist, type help to see valid commands\n\n";
    }
}


?>