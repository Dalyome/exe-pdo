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
        <?php if ($affiche_insertion) {
            ?>
            <article>
                <h2>Ajouter un article</h2>

                <div class="row">
                        <form class="well" action="" name="miam" method="POST">
                            <div class="form-group"><label>Titre</label>
                                <input class="form-control" type="text" name="letitre" placeholder="Votre titre"
                                       required/>
                            </div>
                            <textarea class="form-control" name="letexte" required placeholder="Votre texte"></textarea><br/>
                            <div class="form-group"><label for="pays">Pays</label>

                                <select class="form-control" id="pays" name="id_pays" required>

                                    <?php
                                    // variable vide qui n'affichera donc rien tant qu'elle le reste

                                    while ($affiche = $requetepays->fetch(PDO::FETCH_ASSOC)) {?>
                                        <option value='<?=$affiche['id']?>'><?=$affiche['lintitule']?></option>
                                   <?php
                                    } ?>
                                </select></div>
                            <input name="inserer" type="submit" value="Insérer"/><br/>

                        </form>

                </div>

            </article>
            <?php
        }

        if ($affiche_success) {
            ?>
            <h2>Félicitations ! L'article a bien été ajouté !</h2>
            <p>Good job <?= $_SESSION['login'] ?>!</p>
            <p><a href="javascript:history.go(-2)">Retour</a></p>
            <?php
        } ?>

    </section>
</body>
</html>