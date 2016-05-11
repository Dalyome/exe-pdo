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
                <h2>Ajouter un nouveau pays en tant que rubrique</h2>
                <p><span class="glyphicon glyphicon-exclamation-sign"></span> Pour les images, merci d'utiliser les drapeaux via la page <a href="https://fr.wikipedia.org/wiki/Galerie_des_drapeaux_des_pays_du_monde">Galerie des drapeaux des pays du monde</a> pour que la taille soit déjà optimale pour l'affichage dans les pages du blog.</p>
                <div class="row">
                        <form class="well" action="" name="miam" method="POST">
                            <div class="form-group"><label>Titre</label>
                                <input class="form-control" type="text" name="letitre" placeholder="Votre titre"
                                       required/>
                            </div>
                            <div class="form-group"><label>Titre</label>
                                <input class="form-control" type="text" name="limg" placeholder="URL de l'image (wikipedia)"
                                       required/>
                            </div>
                            <textarea class="form-control" name="letexte" required placeholder="Votre texte"></textarea><br/>
                            <div class="form-group"><label for="pays">Continent</label>

                                <select class="form-control" id="continent" name="id_continent" required>

                                    <?php
                                    // variable vide qui n'affichera donc rien tant qu'elle le reste

                                    while ($affiche = $requetecontinent->fetch(PDO::FETCH_ASSOC)) {?>
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