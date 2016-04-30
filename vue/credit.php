<?php
$titre = "Earth's food - Crédit";
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
</head>
<body>
<div class="container">
    <?php require_once "vue/menu.php"; ?>
    <section>
        <article>
            <h1>Credits</h1>
            <p>Hey coucou ! Ce site a été réalisé par Mike (chef de projet), Hayat et Emily. Nous trois suivons une
                formation au CF2m pour devenir webdeveloper.</p>
            <p>Nous avons commencé ce site en tant qu'exercice le jeudi 21 avril 2016. A la base, c'était pour s'exercer
                en PDO et sur l'usage de git (d'où un site à faire en équipe).</p>
            <h2>Journal de bord</h2>
            <h3>Jeudi 21 avril</h3>
            <p>On nous a donné cet exercice à faire. Mike a été désigné comme étant notre chef de projet. Son premier
                réflexe a été de distribuer le travail à faire, les pages, la confection de la base de données et le
                reste en fonction des faiblesses des membres de son équipe et de lui-même. Ce afin qu'on soit tous forcé
                de travailler sur nos lacunes et de nous améliorer, de dépasser nos acquis.</p>
            <h3>Vendredi 22 avril</h3>
            <p>Première vraie journée de travail. Hayat s'est lancé dans la confection de la base de données. Mike a
                commencé à élaborer le menu et le routeur du public. De mon côté (oui, c'est Emily qui écrit), j'ai crée
                les premières pages publiques.</p>
            <h3>Lundi 25 avril</h3>
            <p>Première expérience de temps perdu. Comment afficher du contenu d'une base de données... sans avoir
                insérer des données dans la DB ? Et bah on peut pas ! C'est au terme d'une heure et demie de recherche
                qu'on s'est rendu compte qu'il n'y avait pas de bug dans le code mais qu'il manquait juste les données
                pour pouvoir les afficher.</p>
            <h3>Mardi 26 avril</h3>
            <p>On poursuit. Ayant appris de la veille, lorsqu'on rencontre des difficultés, on pense d'abord aux choses
                les plus bêtes, les plus évidentes. Que de temps gagné !</p>
            <h3>Jeudi 28 avril</h3>
            <p>On termine tout doucement. On finalise, on rajoute des petits trucs histoire de compléter le site autant
                qu'on puisse le faire. On réfléchit au design, on pense aux couleurs, on pense Bootstrap (dont nous
                avons eu nos premiers cours seulement lundi...).</p>
            <p>On vous embrasse !</p>
        </article>
    </section>
    <?php
    include "vue/footer.php";
    ?>
</body>
</html>