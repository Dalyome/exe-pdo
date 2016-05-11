<?php
if (empty($_POST['inserer'])) {
    // création d'une variable pour afficher le formulaire
    $affiche_insertion = true;
    $affiche_success = false;

    $requetepays = $connexion->prepare("SELECT id, lintitule FROM pays ORDER BY lintitule ASC;");
    $requetepays->execute();


} else { // le formulaire est envoyé
    $affiche_insertion = false;

    $idutil = $_SESSION['id'];
    $letitre = htmlspecialchars(strip_tags(trim($_POST['letitre'])), ENT_QUOTES);
    $letexte = htmlspecialchars(strip_tags(trim($_POST['letexte'])), ENT_QUOTES);
    if (ctype_digit($_POST['id_pays'])) {
        $idpays = $_POST['id_pays'];
    } else {
        $idpays = 1;
    }
    try {
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connexion->beginTransaction();

        $prepare = $connexion->prepare("
        INSERT INTO `recette`(`titre`, `ladesc`, `pays_id`, `util_id`)
        VALUES (:titre,:ladesc,:idpays,:idutil);
        ");

        $prepare->bindValue(":titre", $letitre, PDO::PARAM_STR);
        $prepare->bindValue(":ladesc", $letexte, PDO::PARAM_STR);
        $prepare->bindValue(":idpays", $idpays, PDO::PARAM_INT);
        $prepare->bindValue(":idutil", $idutil, PDO::PARAM_INT);

        $prepare->execute();

        $connexion->commit();

        $affiche_success = true;
    } catch (Exception $e) {
        $connexion->rollBack();
        echo "Erreur : " . $e->getMessage();
    }
}

