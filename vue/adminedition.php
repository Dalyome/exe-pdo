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
                    <div class="form-group"><label for="titre">Titre</label>
                    <input class="form-control" id="titre" name="letitre" type="text" value="<?= $recup_recette['titre'] ?>" required/></div>
                    <div class="form-group"><label for="contenu">Contenu de l'article</label>
                    <textarea class="form-control" id="contenu" name="ladesc" required><?= nl2br($recup_recette['ladesc']) ?></textarea></div>
                    <div class="form-group"><label for="ladate">Date de publication</label>
                    <input id="ladate" name="ladate" type="datetime" value="<?= $recup_recette['ladate'] ?>" required/></div>
                    <div class="form-group"><label for="pays">Pays</label>

                    <select class="form-control" id="pays" name="id_pays" required>

                        <?php
                        // variable vide qui n'affichera donc rien tant qu'elle le reste

                        while ($affiche = $requetepays->fetch(PDO::FETCH_ASSOC)) {
                            $choix_pays = "";
                            if ($affiche['idchoicepays'] == $recup_recette['idpays']) {
                                $choix_pays = "selected";
                            }
                            // affichage de la variable contenant selected ou du vide
                            echo "<option value='" . $affiche['idchoicepays'] . "' $choix_pays>" . $affiche['lintitule'] . "</option>";
                            // si la variable a été remplie, on la vide (1 choix possible)
                            $choix_pays = "";
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