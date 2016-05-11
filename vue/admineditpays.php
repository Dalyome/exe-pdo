<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    include "vue/head.php";
    ?>
</head>
<body>
<div class="container">
    <?php require_once "vue/adminmenu.php"; ?>
    <section>
        <?php if ($affiche_modif) {
            ?>
            <article>
                <h2>Modifier un article</h2>

                <div class="row">
                <form name="edition" method="POST" action="" class="well">
                    <div class="form-group"><label for="titre">Nom du pays</label>
                    <input class="form-control" id="titre" name="letitre" type="text" value="<?= $recup_pays['pays'] ?>" required/></div>
                    <div class="form-group"><label for="contenu">Description de la cuisine pratiquée dans le pays</label>
                    <textarea class="form-control" id="contenu" name="ladesc" required><?= nl2br($recup_pays['ladesc']) ?></textarea></div>
                    <div class="form-group"><label for="limg">Image du pays</label>
                        <input class="form-control" id="limg" name="limg" type="text" value="<?= $recup_pays['img'] ?>" required/></div>
                    <div class="form-group"><label for="continent">Continent affilié au pays</label>

                    <select class="form-control" id="continent" name="id_continent" required>

                        <?php
                        // variable vide qui n'affichera donc rien tant qu'elle le reste

                        while ($affiche = $requetecontinent->fetch(PDO::FETCH_ASSOC)) {
                            $choix_continent = "";
                            if ($affiche['idchoicepays'] == $recup_pays['idcontinent']) {
                                $choix_continent = "selected";
                            }
                            // affichage de la variable contenant selected ou du vide
                            echo "<option value='" . $affiche['idchoicecontinent'] . "' $choix_continent>" . $affiche['lintitule'] . "</option>";
                            // si la variable a été remplie, on la vide (1 choix possible)
                            $choix_continent = "";
                        } ?>
                    </select></div>

                    <input type="submit" name="edition" value='Modifier la recette'/>
                </form>
</div>

            </article>
            <?php
        }

        if ($affiche_success) {
            ?>
            <h2>Félicitations ! L'article a bien été modifié !</h2>
            <p>Good job <?= $_SESSION['login'] ?>!</p>
            <p><a href="javascript:history.go(-2)">Retour</a></p>
            <?php
        } ?>

    </section>
</body>
</html>