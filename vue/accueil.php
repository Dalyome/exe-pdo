<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=$titre?></title>
</head>
<body>
<!--<?php require_once "view/menu.php" ?>-->
<section>

<h2>5 recettes au hasard</h2>
    <ul>
<?php
        while ($res = $requete->fetch(PDO::FETCH_ASSOC)){
        echo "<li><a href='?idrecette=".$res['id']."'>".$res['titre']."</a></li>";
        }
?>
        </ul>
</section>

</body>
</html>