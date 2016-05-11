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
    require_once "vue/menu.php";
    ?>
    <div class="row">
        <section class="col-md-9">
            <?php
            while ($res = $recette->fetch(PDO::FETCH_ASSOC)) { ?>
                <article class="col-xs-12 col-sm-6 col-md-4">
                    <h2><a href='?idrecette=<?=$res['id']?>'><?=$res['titre']?></a></h2>
                        <p><?=$res['ladesc']?></p>
                </article>
                <?php
            }
            ?>
        </section>
        <aside class="col-md-3 hidden-xs hidden-sm">
            <article>
                <h3>Nos auteurs</h3>
                <ul>
                    <?php
                    while ($res = $utilisateur->fetch(PDO::FETCH_ASSOC)) {
                        echo "<li><a href='?idutil=" . $res['id'] . "'>" . $res['login'] . "</a></li>";
                    }
                    ?>
                </ul>
            </article>
            <article>
                <h3>5 pays au hasard</h3>
                <ul>
                    <?php
                    while ($res = $pays->fetch(PDO::FETCH_ASSOC)) {
                        echo "<li><a href='?idpays=" . $res['id'] . "'>" . $res['lintitule'] . "</a></li>";
                    }
                    ?>
                </ul>
            </article>
        </aside>
    </div>
    <?php
    include "vue/footer.php";
    ?>
</body>
</html>