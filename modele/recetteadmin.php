<?php

$titre = "Earth's food - Administration";
if (empty($_SESSION['supprime']) && empty($_SESSION['modifie'])){
    header("Location: ./");
}
// à vérifier si le truc de non-affichage fonctionne quand on aura les sessions comme il faut
if (empty($_SESSION['supprime'])){
    $displaysup = "display:none;";
}else {
    $displaysup = "";
}


$tri = $_GET['idpays'];
switch($tri){
    case "arttitre":
        $trier = "ORDER BY r.titre ASC";
        break;
    case "artdate":
        $trier = "ORDER BY r.ladate DESC";
        break;
    case "artpays":
        $trier = "ORDER BY pays ASC";
        break;
    case "artcontinent":
        $trier = "ORDER BY continent ASC";
        break;
    case "artauteur":
        $trier = "ORDER BY u.login ASC";
        break;
    default :
        $trier = "ORDER BY r.id DESC";
}

$requete = $connexion->prepare("SELECT r.id, r.titre,
      DAY(r.ladate) AS jour, MONTH(r.ladate) AS mois, YEAR(r.ladate) AS annee, HOUR(r.ladate) AS heure, MINUTE(r.ladate) AS minute, p.lintitule AS pays, c.lintitule AS continent, u.login
    FROM recette r
    INNER JOIN pays p
    ON r.pays_id = p.id
    INNER JOIN util u
    ON r.util_id = u.id
    INNER JOIN continent c
      ON p.continent_id = c.id
      WHERE p.id = $pays
    ORDER BY r.id DESC;");

$requete->execute();
?>