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
    <section>
        <article>
            <h2>Hej! Moi c'est <?= $affiche_util['login'] ?> !</h2>
            <p><?= $affiche_util['ladesc'] ?></p>
        </article>
        <article>
            <h3>Les articles écrits par <?= $affiche_util['login'] ?></h3>
            <?php
            while ($res = $requete->fetch(PDO::FETCH_ASSOC)) {
                echo "<li><a href='?idrecette=" . $res['idrecette'] . "'>" . $res['recette'] . "</a></li>";
            }
            ?>
        </article>
    </section>
    <?php
    include "vue/footer.php";
    ?>
</body>
</html>