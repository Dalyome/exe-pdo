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
            <?php
            if (isset($message)) {
                echo $message;
            } else {
                ?>
                <form name="contact" method="post" action="" class="well">
                    <div class="form-group">
                        <legend>Nous contacter</legend>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="nom">Nom : </label><input id="nom" class="form-control" name="lenom" required
                                                              type="text"/>
                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="mail">Email : </label>
                        <input id="mail" type="email" class="form-control" name="lemail" required/>
                        <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="msg">Message : </label>
                        <textarea id="msg" class="form-control" name="letexte" required></textarea>
                        <span class="glyphicon glyphicon-ok-sign form-control-feedback"></span>
                        <p class="help-block">Maximum 1500 caractères</p>
                    </div>
                    <button class="btn btn-primary" class="form-control"/>
                    <span class="glyphicon glyphicon glyphicon-send"></span>&nbsp;&nbsp;&nbsp;Envoyer votre message
                    </button>
                </form>
                <?php
            }
            ?>
        </section>
    </div>

    <?php
    include "vue/footer.php";
    ?>
</body>
</html>

