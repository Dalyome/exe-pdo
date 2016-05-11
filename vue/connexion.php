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
