<?php

$cont = $connexion->prepare("SELECT * FROM continent");
$cont->execute();

?>
<header class="row page-header"><h1><?= $titre ?></h1></header>
<nav class="row">
    <ul class="col-md-12 list-inline">
        <li><a class="btn btn-default" href="./">Accueil</a></li>
        <?php
        while ($continent = $cont->fetch(PDO::FETCH_ASSOC)) {
            echo "<li><a class='btn btn-default' href='?idcontinent=" . $continent['id'] . "'>" . $continent['lintitule'] . "</a></li>";
        }
        ?>

        <li><a class="btn btn-default" href="?connect">connexion</a></li>
    </ul>
</nav>


