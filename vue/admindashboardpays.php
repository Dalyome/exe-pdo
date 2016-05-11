<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    include "vue/head.php";
    ?>
    <!-- Script pour la suppression d'un article -->
    <script src="vue/js/monjs.js"></script>
</head>
<body>
<div class="container">
    <?php
    require_once "vue/adminmenu.php";
    ?>
    <section>

        <h2>Panneau d'administration de votre site</h2>
        <p>Les images pour les pays sont disponibles via Wikipedia. On les choisira via la page <a href="https://fr.wikipedia.org/wiki/Galerie_des_drapeaux_des_pays_du_monde">Galerie des drapeaux des pays du monde</a> pour que la taille soit déjà optimale pour l'affichage dans les pages du blog.</p>
        <p>Pour ajouter un nouveau pays, <a class="btn btn-info btn-xs" href="?insertpays">cliquez ici</a>.</p>
        <table class="table table-striped">
            <tr>
                <th><a href="?modifpays=artidpays">ID <span class="glyphicon glyphicon-sort-by-order"></span> </a></th>
                <th><a href="?modifpays=artpays">Pays <span class="glyphicon glyphicon-sort-by-alphabet"></span></a></th>
                <th><a href="?modifpays=artcontinent">Continent <span class="glyphicon glyphicon-sort-by-alphabet"></span></a></th>
                <th>Image</th>
                <th></th>
            </tr>
            <?php
            while ($res = $requete->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <td><?= $res['id'] ?></td>
                    <td><a href='?editionpays=<?= $res['id'] ?>'><?= $res['pays'] ?></a></td>
                    <td><?= $res['continent'] ?></td>
                    <td><img src="<?= $res['img'] ?>" height="30px" /></td>
                    <td><a href='?editionpays=<?= $res['id'] ?>'><img src='vue/img/editer.gif' alt='edition'/></a></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </section>
</body>
</html>