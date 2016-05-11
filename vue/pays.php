<?php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    include "vue/head.php";
    ?>
    <!-- Ajout du .js pour le toggle -->
    <script type="text/javascript" src='https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js'></script>

</head>
<body>
<div class="container">
    <?php require_once "vue/menu.php"; ?>
    <section class="col-sm-12">
        <article>
            <img class="col-sm-2 hidden-xs" src="<?= $recuppays->img ?>"/>
            <div class="col-sm-10">
                <h1><?= $recuppays->lintitule ?></h1>
                <div class='toggle'>
                    <div class='more'><p><?= nl2br($recuppays->ladesc) ?></p></div>
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