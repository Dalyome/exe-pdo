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
    <section>

        <!--Ajout d'un tableau pour permettre de prendre le premier objet -->
        <article>
            <h1><?= $recuptous[0]->clintitule ?></h1>
        </article>

        <div class="row">
            <div class="col-lg-12">


                <?php
                foreach ($recuptous as $rec) { ?>
                    <article class="col-xs-12 col-sm-6 col-md-4">
                        <h2><a href="?idpays=<?= $rec->pid ?>"><?= $rec->plintitule ?></a>
                            <span class="badge"><?= $rec->nb ?></span></h2>
                        <div class="col-xs-12">
                        <p class="col-xs-4"><img width="100px" class="img-responsive" src="<?= $rec->img ?>"/></p>
                        <ul class="col-xs-8">
                            <?php
                            $titre = explode('|||', $rec->titre);
                            $id = explode(',', $rec->idrecette);
                            foreach ($id as $clef => $val) { ?>
                                <li><a href='?idrecette=<?= $val ?>'><?= $titre[$clef] ?></a></li>
                                <?php
                            }
                            ?>
                        </ul>
                        </div>
                    </article>
                <?php }
                ?>


            </div>
        </div>
    </section>
    <?php
    include "vue/footer.php";
    ?>
</body>
</html>