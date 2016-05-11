<?php
if (empty($_SESSION['supprime']) && empty($_SESSION['modifie'])){
    header("Location: ./");
}
// à vérifier si le truc de non-affichage fonctionne quand on aura les sessions comme il faut
if (empty($_SESSION['supprime'])){
    $displaysup = "display:none;";
}else {
    $displaysup = "";
}

$tri = $_GET['modifpays'];
switch($tri){
    case "artidpays":
        $trier = "ORDER BY p.id ASC";
        break;
    case "artpays":
        $trier = "ORDER BY pays ASC";
        break;
    case "artcontinent":
        $trier = "ORDER BY continent ASC";
        break;
    default :
        $trier = "ORDER BY p.lintitule ASC";
}

$requete = $connexion->prepare("SELECT p.id, p.lintitule AS pays, c.lintitule AS continent, p.img
FROM pays p
  INNER JOIN continent c
    ON p.continent_id = c.id
    $trier ;");

$requete->execute();
?>