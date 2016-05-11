<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    include "vue/head.php";
    ?>
</head>
<body>
<div class="container">
    <?php
    require_once "vue/adminmenu.php";
    ?>
    <section>
        <article>
            <h1>Bonjour <?= $_SESSION['login'] ?> !</h1>
            <?php
            if ($_SESSION['ecrit']) {
                ?>
                <p>Vous avez l'autorisation de rédiger <a href="?insert">un nouvel article</a>.</p><?php
            }
            if ($_SESSION['modifie']) {
                ?>
                <p>Vous avez aussi l'autorisation d'<a href="?modifsup">administrer les articles existants</a> ainsi que les <a href="?modifpays">pays existants</a>.</p>
                <?php
            }
            ?>
        </article>
    </section>
</body>
</html>