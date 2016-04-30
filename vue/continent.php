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
    <section >

        <!--Ajout d'un tableau pour permettre de prendre le premier objet -->
        <article>
            <h1><?= $recuptous[0]->clintitule ?></h1>
        </article>

        <div class="row">
<div class="col-lg-12">


                <?php
                foreach ($recuptous as $rec) { ?>
    <article class="col-xs-12 col-sm-6 col-md-4">
                    <h2><a href="?idpays=<?= $rec->pid ?>"><?= $rec->plintitule ?></a> | <?= $rec->nb ?></h2>
                    <img class="img-responsive" src="<?= $rec->img ?>"/>
                    <?php
                    $titre = explode('|||', $rec->titre);
                    $desc = explode('|||', $rec->ladescrecette);
                    $id = explode(',', $rec->idrecette);
                    foreach ($id as $clef => $val) {
                        echo "<h3>" . $titre[$clef] . "</h3>";
                        echo "<p>" . $desc[$clef] . " ... </p>";
                        echo "<a href='?idrecette=$val'>Lire la suite</a>";
                    }
                    ?>
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