<?php


if(empty($_GET)){
    require_once "modele/accueil.php";
    require_once "vue/accueil.php";
}
elseif(isset($_GET['connect'])){

    require_once "modele/continent.php";
    require_once "vue/continent.php";
}
elseif(isset($_GET['connect'])){

    require_once "modele/continent.php";
    require_once "vue/continent.php";
}
elseif(isset($_GET['connect'])){

    require_once "modele/recette.php";
    require_once "vue/recette.php";
}
elseif(isset($_GET['connect'])){

    require_once "modele/pays.php";
    require_once "vue/pays.php";
}
elseif(isset($_GET['connect'])){

    require_once "modele/connexion.php";
    require_once "vue/connexion.php";
}
