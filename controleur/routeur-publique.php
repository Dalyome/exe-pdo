<?php


if(empty($_GET)) {
    require_once "modele/accueil.php";
    require_once "vue/accueil.php";

} if(empty($_GET)) {
    require_once "vue/credit.php";

}if(empty($_GET)){
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
    require_once "modele/util.php";
    require_once "vue/util.php";

} elseif (isset($_GET['idpays']) && ctype_digit($_GET['idpays'])) {
    $pays = (int)$_GET['idpays'];
    require_once "modele/pays.php";
    require_once "vue/pays.php";
}
elseif(isset($_GET['connect'])){

    require_once "modele/connexion.php";
    require_once "vue/connexion.php";
}
