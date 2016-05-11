<?php
if (empty($_POST['inserer'])) {
    // création d'une variable pour afficher le formulaire
    $affiche_insertion = true;
    $affiche_success = false;

    $requetecontinent = $connexion->prepare("SELECT id, lintitule FROM continent ORDER BY lintitule ASC;");
    $requetecontinent->execute();


} else { // le formulaire est envoyé
    $affiche_insertion = false;

    $idutil = $_SESSION['id'];
    $letitre = htmlspecialchars(strip_tags(trim($_POST['letitre'])), ENT_QUOTES);
    $letexte = htmlspecialchars(strip_tags(trim($_POST['letexte'])), ENT_QUOTES);
    $limg = $_POST['limg'];
    if (ctype_digit($_POST['id_continent'])) {
        $idcontinent = $_POST['id_continent'];
    } else {
        $idcontinent = 1;
    }
    try {
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connexion->beginTransaction();

        $prepare = $connexion->prepare("
        INSERT INTO `pays`(`lintitule`, `ladesc`, `continent_id`, `img`)
        VALUES (:titre,:ladesc,:idcontinent,:limg);
        ");

        $prepare->bindValue(":titre", $letitre, PDO::PARAM_STR);
        $prepare->bindValue(":ladesc", $letexte, PDO::PARAM_STR);
        $prepare->bindValue(":idcontinent", $idcontinent, PDO::PARAM_INT);
        $prepare->bindValue(":limg", $limg, PDO::PARAM_STR);

        $prepare->execute();

        $connexion->commit();

        $affiche_success = true;
    } catch (Exception $e) {
        $connexion->rollBack();
        echo "Erreur : " . $e->getMessage();
    }
}

