<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    include "vue/head.php";
    ?>
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

