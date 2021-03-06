<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="vue/img/favicon.ico"/>
    <link href="stylesheet.css" rel="stylesheet" type="text/css"/>
    <!-- Lien vers la CSS de Bootstrap -->
    <link href="vue/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim et Respond.js pour le support des éléments HTML5 et des media queries dans IE8 -->
    <!-- ATTENTION: Respond.js ne fonctionne pas si on lit la page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <title><?= $titre ?></title>
    <!-- Ajout du .js pour le toggle -->
    <script type="text/javascript" src='https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js'></script>
    <!-- Script pour la suppression d'un article -->
    <script src="vue/js/monjs.js"></script>
</head>
<body>
<div class="container">
    <?php
    require_once "vue/menu_admin.php";
    ?>
    <section>

        <h2>Panneau d'administration de votre site</h2>
        <p>Les images pour les pays sont disponibles via Wikipedia. On les choisira via la page <a href="https://fr.wikipedia.org/wiki/Galerie_des_drapeaux_des_pays_du_monde">Galerie des drapeaux des pays du monde</a> pour que la taille soit déjà optimale pour l'affichage dans les pages du blog.</p>
        <table class="table">
            <tr>
                <th><a href="?modifpays=artidpays">ID</a></th>
                <th><a href="?modifpays=artpays">Pays</a></th>
                <th><a href="?modifpays=artcontinent">Continent</a></th>
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
    <script>/* <![CDATA[ */
        /*
         |-----------------------------------------------------------------------
         |  jQuery Multiple Toggle Script by Matt - www.skyminds.net
         |-----------------------------------------------------------------------
         |
         | Affiche et cache le contenu de blocs multiples. Bloc après le texte.
         |
         */
        jQuery(document).ready(function () {
            $(".more").hide();
            jQuery('.button-read-more').click(function () {
                $(this).closest('.less').addClass('active');
                $(this).closest(".less").next().stop(true).slideDown("1000");
            });
            jQuery('.button-read-less').click(function () {
                $(this).closest('.less').removeClass('active');
                $(this).closest(".less").next().stop(true).slideUp("1000");
            });
        });
        /* ]]> */ </script>
</body>
</html>