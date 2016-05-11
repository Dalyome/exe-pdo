<?php

$cont = $connexion->prepare("SELECT * FROM continent");
$cont->execute();

?>
<header class="page-header"><h1>Recettes du monde</h1></header>
<nav class="row navbar navbar-inverse">
    <div class="navbar-header hidden-xs hidden-sm">
        <a href="./" class="navbar-brand"><?= $titre ?></a>
    </div>
    <ul class="nav navbar-nav">
        <li><a class="btn btn-inverse" href="./">Accueil</a></li>
        <?php
        while ($continent = $cont->fetch(PDO::FETCH_ASSOC)) {
            echo "<li><a class='btn btn-inverse' href='?idcontinent=" . $continent['id'] . "'>" . $continent['lintitule'] . "</a></li>";
        }
        ?>

        <li><a class="btn btn-inverse" href="?connect">connexion</a></li>
    </ul>
</nav>


