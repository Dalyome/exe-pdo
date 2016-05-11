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
        <p>Pour ajouter un nouvelle recette, <a class="btn btn-info btn-xs" href="?insert">cliquez ici</a>.</p>
        <?php
        if ($requete->rowCount()){ ?>
        <table class="table table-striped">
            <tr>
                <th><a href="?modifsup=arttitre">Titre <span class="glyphicon glyphicon-sort-by-alphabet"></span></a></th>
                <th><a href="?modifsup=artdate">Date <span class="glyphicon glyphicon-sort-by-attributes-alt"></span> </a></th>
                <th><a href="?modifsup=artpays">Pays <span class="glyphicon glyphicon-sort-by-alphabet"></span></a></th>
                <th><a href="?modifsup=artcontinent">Continent <span class="glyphicon glyphicon-sort-by-alphabet"></span></a></th>
                <th><a href="?modifsup=artauteur">Auteur <span class="glyphicon glyphicon-sort-by-alphabet"></span></a></th>
                <th></th>
                <th></th>
            </tr>
            <?php
            while ($res = $requete->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <td><a href='?modif=<?= $res['id'] ?>'><?= $res['titre'] ?></a></td>
                    <td><?= $res['jour'] ?>/<?= $res['mois'] ?>/<?= $res['annee'] ?> - <?= $res['heure'] ?>:<?= $res['minute'] ?></td>
                    <td><?= $res['pays'] ?></td>
                    <td><?= $res['continent'] ?></td>
                    <td><?= $res['login'] ?></td>
                    <td><a href='?modif=<?= $res['id'] ?>'><img src='vue/img/editer.gif' alt='edition'/></a></td>
                    <td><img alt='supprimer'
                             onclick='confirmDelete("<?= $res['titre'] ?>",<?= $res['id'] ?>)'
                             style='<?= $displaysup ?>'
                             src='vue/img/delete.gif'/></td>
                </tr>
                <?php
            }
            ?>
        </table>
            <?php
        } else {
            ?>
            <h3>Il n'y a aucun article à administrer pour cette catégorie.</h3>
            <?php
        }
        ?>
    </section>
</body>
</html>