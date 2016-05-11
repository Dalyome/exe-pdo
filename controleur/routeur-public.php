<?php


if (empty($_GET)) {
    $titre = "Recettes du monde";
    require_once "modele/accueil.php";
    require_once "vue/accueil.php";

} elseif (isset($_GET['credit'])) {
    $contact = $_GET['credit'];
    $titre = "Recettes du monde - Crédit";
    require_once "vue/credit.php";

} elseif (isset($_GET['contact'])) {
    $contact = $_GET['contact'];
    $titre = "Recettes du monde - Contact";
    require_once "modele/contact.php";
    require_once "vue/contact.php";

} elseif (isset($_GET['idcontinent']) && ctype_digit($_GET['idcontinent'])) {
    $continent = (int)$_GET['idcontinent'];
    require_once "modele/continent.php";
    require_once "vue/continent.php";

} elseif (isset($_GET['idrecette']) && ctype_digit($_GET['idrecette'])) {
    $recette = (int)$_GET['idrecette'];
    require_once "modele/recette.php";
    require_once "vue/recette.php";

} elseif (isset($_GET['idutil']) && ctype_digit($_GET['idutil'])) {
    $util = (int)$_GET['idutil'];
    require_once "modele/profil.php";
    require_once "vue/profil.php";

} elseif (isset($_GET['idpays']) && ctype_digit($_GET['idpays'])) {
    $pays = (int)$_GET['idpays'];
    require_once "modele/pays.php";
    require_once "vue/pays.php";

} elseif (isset($_GET['connect'])) {
    $titre = "Recettes du monde";
    require_once "modele/connexion.php";
    require_once "vue/connexion.php";
} else {
    $titre = "Recettes du monde";
    require_once "modele/accueil.php";
    require_once "vue/accueil.php";
}
