<?php

$cont=$connexion->prepare("SELECT *FROM continent");
$cont->execute();

?>
<ul>
    <li><a href="./">Accueil</a></li>
    <?php
    while ($continent = $cont->fetch(PDO::FETCH_ASSOC)){
        echo "<li><a href='?idcontinent=".$continent['id']."'>".$continent['lintitule']."</a></li>";
    }
    ?>

    <li><a href="deco.php">connexion</a></li>
</ul>

