<?php
$recette = $connexion->prepare("SELECT r.id, r.titre, SUBSTRING(r.ladesc,1,150)AS ladesc FROM recette r ORDER BY id DESC");
// exécution de la requête
$recette->execute();

$pays = $connexion->prepare("SELECT p.id, p.lintitule FROM pays p ORDER BY RAND() LIMIT 5");
$pays->execute();

$utilisateur = $connexion->prepare("SELECT u.id, u.login FROM util u ORDER BY u.id");
$utilisateur->execute();
?>