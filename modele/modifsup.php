<?php
$titre = "Earth's food - Administration";

/*if (($_SESSION['ecrit']) || ($_SESSION['modifie'])){
} else {
    header("Location: ./");
}*/
// à vérifier si le truc de non-affichage fonctionne quand on aura les sessions comme il faut
if (!$_SESSION['supprime']){
    $displaysup = "display:none;";
}
try {
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connexion->beginTransaction();

    $requete = $connexion->prepare("SELECT r.id, r.titre,
      DAY(r.ladate) AS jour, MONTH(r.ladate) AS mois, YEAR(r.ladate) AS annee, HOUR(r.ladate) AS heure, MINUTE(r.ladate) AS minute, p.lintitule AS pays, c.lintitule AS continent, u.login
    FROM recette r
    INNER JOIN pays p
    ON r.pays_id = p.id
    INNER JOIN util u
    ON r.util_id = u.id
    INNER JOIN continent c
      ON p.continent_id = c.id
    ORDER BY r.id DESC;");
    // exécution de la requête
    $connexion->commit();
}catch(Exception $e){
    $connexion->rollBack();
    echo "Erreur: " . $e->getMessage();
}
?>