<?php

if(!empty($_POST)) {
    $lelogin = htmlspecialchars(strip_tags(trim($_POST['lelogin'])),ENT_QUOTES);
    $lepass = htmlspecialchars(strip_tags(trim($_POST['lepass'])),ENT_QUOTES);




// requête préparée
    $recup = $connexion->prepare("SELECT u.id,u.login,u.mdp,u.droit_id,u.ladesc,
                                        d.id as iddroit,d.lintitule,d.ecrit,d.modif,d.sup
                                    FROM util u
                                    INNER JOIN droit d
                                    ON u.droit_id = d.id
                                    WHERE u.login = :login AND u.mdp = :pass");

// attribution de valeurs
    $recup->bindValue(':login',$lelogin, PDO::PARAM_STR);
    $recup->bindValue(':pass',$lepass, PDO::PARAM_STR);

// exécuter la requête
    $recup->execute();

    $util = $recup->fetch(PDO::FETCH_ASSOC);


    // on a un résultat
    if($recup->rowCount()==1){

        // création de session valide
        $_SESSION['idutil'] = session_id();
        $_SESSION['id'] = $util['id'];
        $_SESSION['login'] = $util['login'];
        $_SESSION['ecrit'] = $util['ecrit'];
        $_SESSION['modifie'] = $util['modif'];
        $_SESSION['supprime'] = $util['sup'];

        // redirection
        header("Location: ./");
    }else{
        $erreur = "Login et/ou mot de passe incorrecte(s)";
    }

}
