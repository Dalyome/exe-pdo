<?php
?>
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

</head>
<body>
<div class="container">
    <?php require_once "vue/menu.php"; ?>
    <section class="col-sm-12">
        <article class="col-sm-12">
            <img class="col-sm-2 hidden-xs" src="<?= $continant->img ?>"/>
            <div class="col-sm-10">
                <h1><?= $continant->lintitule ?></h1>
                <div class='toggle'>
                    <div class='more'><p><?= nl2br($continant->ladesc) ?></p></div>
                    <div class="less">
                        <a class="button-read-more button-read" href="#read">Cliquez pour en savoir plus !</a>
                        <a class="button-read-less button-read" href="#read">Replier</a>
                    </div>
                </div>
            </div>
        </article>
        <?php
        foreach ($recuptous as $rec) { ?>
            <article class="col-xs-12 col-sm-6 col-md-4">
                <h2><?= $rec->titre ?></h2>
                <p><?= $rec->ladate ?></p>
                <p><?= nl2br($rec->ladescrec) ?>... <a href='?idrecette=<?= $rec->idrec ?>'>Lire la suite</a></p>
                <hr/>
            </article>
        <?php }
        ?>
    </section>
    <?php
    include "vue/footer.php";
    ?>
    <script>/* <![CDATA[ */
        /*
         |-----------------------------------------------------------------------
         |  jQuery Multiple Toggle Script by Matt - www.skyminds.net
         |-----------------------------------------------------------------------
         |
         | Affiche et cache le contenu de blocs multiples.
         |
         */
        jQuery(document).ready(function () {
            $(".more").hide();
            jQuery('.button-read-more').click(function () {
                $(this).closest('.less').addClass('active');
                $(this).closest(".less").prev().stop(true).slideDown("1000");
            });
            jQuery('.button-read-less').click(function () {
                $(this).closest('.less').removeClass('active');
                $(this).closest(".less").prev().stop(true).slideUp("1000");
            });
        });
        /* ]]> */ </script>
</body>
</html>