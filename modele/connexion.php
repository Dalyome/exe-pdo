<?php

if(!empty($_POST)) {
    $lelogin = htmlspecialchars(strip_tags(trim($_POST['lelogin'])),ENT_QUOTES);
    $lepass = htmlspecialchars(strip_tags(trim($_POST['lepass'])),ENT_QUOTES);




// requête préparée
    $recup = $connexion->prepare("SELECT u.id,u.login,u.mdp,u.droit_id,u.ladesc,
                                        d.id as iddroit,d.lintitule,d.ecrit,d.modif,d.supp
                                    FROM  user u
                                    INNER JOIN droit d
                                    ON u.droit_id = d.id
                                     WHERE u.login <= :login AND u.mdp <= :pass");

// attribution de valeurs
    $recup->bindValue(':login',$lelogin, PDO::PARAM_INT);
    $recup->bindValue(':pass',$lepass, PDO::PARAM_STR);

// exécuter la requête
    $recup->execute();

    $nb = mysqli_num_rows($recup);
    // on a un résultat
    if($nb){
        $util = $recup->fetch(PDO::FETCH_OBJ);

        // création de session valide
        $_SESSION['clef'] = session_id();
        $_SESSION['idutil'] = $util->id;
        $_SESSION['login'] = $util->login;
        $_SESSION['ecrit'] = $util->ecrit;
        $_SESSION['modifie'] = $util->modifi;
        $_SESSION['supprime'] = $util->supp;

        // redirection
        header("Location: ./");
    }else{
        $erreur = "Login et/ou mot de passe incorrecte(s)";
    }

}
