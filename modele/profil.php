<?php

$requete = $connexion->prepare("SELECT u.login, u.ladesc, r.id AS idrecette, r.titre AS recette
FROM util u
INNER JOIN recette r
ON u.id = r.util_id
WHERE u.id = $util;");

// exécution de la requête
$requete->execute();

if(is_null($requete)){
    $erreur = "Cet auteur n'existe pas !";
    // on arrête le script
    exit();
}
$affiche_util = $requete->fetch(PDO::FETCH_ASSOC);
$titre = "Profil de ".$affiche_util['login'];

?>