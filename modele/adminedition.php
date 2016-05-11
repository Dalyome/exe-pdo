<?php
// si le formulaire d'édition est vide
if(empty($_POST['edition'])) {
    // création d'une variable pour afficher le formulaire
    $affiche_modif = true;
    $affiche_success = false;
    $requete = $connexion->prepare("SELECT r.id AS idrecette, r.titre, r.ladesc, r.ladate, p.id AS idpays, p.lintitule AS lepays
                FROM recette r
                  INNER JOIN pays p
                  ON r.pays_id = p.id
                WHERE r.id = $idrecette;
                ");
// exécution de la requête
    $requete->execute();

    $recup_recette = $requete->fetch(PDO::FETCH_ASSOC);

    $requetepays = $connexion->prepare("SELECT p.id AS idchoicepays, p.lintitule
                    FROM pays p
                    ORDER BY p.continent_id ASC, p.lintitule ASC;");

    $requetepays->execute();
    

}else { // le formulaire est envoyé
    $affiche_modif = false; // on cache le formulaire de modif

    // et on fait les vérif'
    $letitre = htmlspecialchars(strip_tags(trim($_POST['letitre'])),ENT_QUOTES);
    $ladesc = htmlspecialchars(strip_tags(trim($_POST['ladesc'])),ENT_QUOTES);
    $ladate = $_POST['ladate'];

    if (ctype_digit($_POST['id_pays'])) {
        $idpays = $_POST['id_pays'];
    } else {
        $idpays = 1;
    }

    try{
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connexion->beginTransaction();
        $prepare = $connexion->prepare("UPDATE `recette` SET `titre`= :titre,`ladesc`= :ladesc,`ladate`= :ladate,`pays_id`=:idpays WHERE `id`=$idrecette");

        $prepare->bindValue(":titre",$letitre,PDO::PARAM_STR);
        $prepare->bindValue(":ladesc",$ladesc,PDO::PARAM_STR);
        $prepare->bindValue(":ladate",$ladate,PDO::PARAM_STR);
        $prepare->bindValue(":idpays",$idpays,PDO::PARAM_INT);
        $prepare->execute();
        $connexion->commit();
        $affiche_success = true;

    }catch (Exception $e){
        $connexion->rollBack();
        echo "Erreur : " . $e->getMessage();
    }

}
?>