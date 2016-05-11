<?php



// si le formulaire d'édition est vide
if(empty($_POST['edition'])) {
    // création d'une variable pour afficher le formulaire
    $affiche_modif = true;
    $affiche_success = false;
    $requete = $connexion->prepare("SELECT p.id AS idpays, p.lintitule AS pays, p.ladesc, p.img, c.id, c.lintitule AS continent
FROM pays p
  INNER JOIN continent c
    ON p.continent_id = c.id
WHERE p.id = $idpays;
                ");
// exécution de la requête
    $requete->execute();

    $recup_pays = $requete->fetch(PDO::FETCH_ASSOC);

    $requetecontinent = $connexion->prepare("SELECT c.id AS idchoicecontinent, c.lintitule
                    FROM continent c
                    ORDER BY c.lintitule ASC");

    $requetecontinent->execute();
    

}else { // le formulaire est envoyé
    $affiche_modif = false; // on cache le formulaire de modif

    // et on fait les vérif'
    $letitre = htmlspecialchars(strip_tags(trim($_POST['letitre'])),ENT_QUOTES);
    $ladesc = htmlspecialchars(strip_tags(trim($_POST['ladesc'])),ENT_QUOTES);
    $limg = htmlspecialchars(strip_tags(trim($_POST['limg'])),ENT_QUOTES);

    if (ctype_digit($_POST['id_continent'])) {
        $idcontinent = $_POST['id_continent'];
    } else {
        $idcontinent = 1;
    }

    try{
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connexion->beginTransaction();
        $prepare = $connexion->prepare("UPDATE `pays` SET `lintitule`= :titre,`ladesc`= :ladesc,`continent_id`= :idcontinent,`img`= :limg WHERE `id`=$idpays");


        $prepare->bindValue(":titre",$letitre,PDO::PARAM_STR);
        $prepare->bindValue(":ladesc",$ladesc,PDO::PARAM_STR);
        $prepare->bindValue(":limg",$limg,PDO::PARAM_STR);
        $prepare->bindValue(":idcontinent",$idcontinent,PDO::PARAM_INT);
        $prepare->execute();
        $connexion->commit();
        $affiche_success = true;

    }catch (Exception $e){
        $connexion->rollBack();
        echo "Erreur : " . $e->getMessage();
    }

}
?>