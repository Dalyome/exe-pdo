<?php
// accueil de l'admin
if (empty($_GET)) {
    $titre = "Recettes du monde - Vous êtes connecté";
    require_once "vue/adminaccueil.php";


// déconnexion
}
elseif (isset($_GET['deconnect'])) {
    require_once "modele/deco.php";
}
// insertion d'un nouvel article
elseif (isset($_GET['insert'])) {
    $titre = "Recettes du monde - Insérer une nouvelle recette";
    require_once "modele/adminnouveau.php";
    require_once "vue/adminnouveau.php";
}
// insertion d'un nouveau pays
elseif (isset($_GET['insertpays'])) {
    $titre = "Insérer un nouveau pays";
    require_once "modele/adminnouveaupays.php";
    require_once "vue/adminnouveaupays.php";
}
// panneau d'administration des articles-recettes
elseif (isset($_GET['modifsup'])) {
    $titre = "Panneau d'administration (recette)";
    require_once "modele/admindashboard.php";
    require_once "vue/admindashboard.php";
}
// page de modification des articles-recettes
elseif (isset($_GET['modif']) && ctype_digit($_GET['modif'])) {
    $idrecette = (int)$_GET['modif'];
    $titre = "Modification d'un article";
    require_once "modele/adminedition.php";
    require_once "vue/adminedition.php";
}
// suppression de l'article-recette
elseif (isset($_GET['sup']) && ctype_digit($_GET['sup'])) {
    $sup = (int)$_GET['sup'];
    require_once "modele/sup.php";
}
// panneau d'administration des pays
elseif (isset($_GET['modifpays'])) {
    $titre = "Panneau d'administration (pays)";
    require_once "modele/admindashboardpays.php";
    require_once "vue/admindashboardpays.php";
}
// page de modification des articles-recettes
elseif (isset($_GET['editionpays']) && ctype_digit($_GET['editionpays'])) {
    $idpays = (int)$_GET['editionpays'];
    $titre = "Modification d'un pays";
    require_once "modele/admineditpays.php";
    require_once "vue/admineditpays.php";
}
else{
    $titre = "Recettes du monde - Vous êtes connecté";
    require_once "vue/adminaccueil.php";
}
