<?php
// On appelle le Manager (qui appelle déjà contact.php et bdd.php)
require_once 'ContactManager.php';

// 1. On crée l'instance du Manager
$manager = new ContactManager();

// 2. On récupère la liste des objets
$liste = $manager->findall();

// 3. On vérifie d'abord avec un var_dump pour "voir" les objets
echo "<h3>Vérification technique (var_dump) :</h3>";
var_dump($liste);

echo "<hr>";

// 4. On affiche proprement pour l'utilisateur
echo "<h3>Affichage propre :</h3>";
foreach ($liste as $contact) {
    echo $contact->toString() . "<br>";
}