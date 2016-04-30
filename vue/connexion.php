<?php


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="vue/img/favicon.ico"/>
    <link href="stylesheet.css" rel="stylesheet" type="text/css"/>
    <!-- Lien vers la CSS de Bootstrap -->
    <link href="vue/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim et Respond.js pour le support des éléments HTML5 et des media queries dans IE8 -->
    <!-- ATTENTION: Respond.js ne fonctionne pas si on lit la page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <title><?= $titre ?></title>
</head>
<body>
<div class="container">
    <?php require_once "vue/menu.php"; ?>
    <div class="row">
        <section class="col-md-8">
            <h1>Se connecter</h1>
            <form method="post" action="" name="form" class="well">
                <div class="form-group">
                    <label for="username">User</label>
                    <input id="username" type="text" placeholder="Votre login" name="lelogin" required size="10"
                           class="form-control input-xs"/>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type='password' placeholder="Votre mot de passe" name="lepass"
                           required size="10" class="form-control input-xs"/>
                </div>
                <button class="btn btn-primary">Connexion</button>
            </form>

            <?php
            if (isset($erreur)) echo "<h3>$erreur</h3>";
            ?>
        </section>
    </div>
    <?php
    include "vue/footer.php";
    ?>
</body>
</html>
