<?php
// accueil de l'admin
if (empty($_GET)) {
    require_once "vue/accadmin.php";

// déconnexion
}
elseif (isset($_GET['deconnect'])) {
    require_once "modele/deco.php";
}
// panneau d'administration des articles-recettes
elseif (isset($_GET['modifsup'])) {
    require_once "modele/modifsup.php";
    require_once "vue/modifsup.php";
}
// page de modification des articles-recettes
elseif (isset($_GET['modif']) && ctype_digit($_GET['modif'])) {
    $idrecette = (int)$_GET['modif'];
    require_once "modele/edition.php";
    require_once "vue/edition.php";
}
// suppression de l'article-recette
elseif (isset($_GET['sup']) && ctype_digit($_GET['sup'])) {
    $sup = (int)$_GET['sup'];
    require_once "modele/sup.php";
}
// panneau d'administration modifsup mais avec un filtre par pays
elseif (isset($_GET['idpays']) && ctype_digit($_GET['idpays'])) {
    $pays = (int)$_GET['idpays'];
    require_once "modele/recetteadmin.php";
    require_once "vue/recetteadmin.php";
}
// panneau d'administration des pays
elseif (isset($_GET['modifpays'])) {
    require_once "modele/modifpays.php";
    require_once "vue/modifpays.php";
}
// page de modification des articles-recettes
elseif (isset($_GET['editionpays']) && ctype_digit($_GET['editionpays'])) {
    $idpays = (int)$_GET['editionpays'];
    require_once "modele/editionpays.php";
    require_once "vue/editionpays.php";
}
// insertion d'un nouvel article
elseif (isset($_GET['insert'])) {
    require_once "modele/insert.php";
    require_once "vue/insert.php";

}
