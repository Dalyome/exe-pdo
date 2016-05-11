<header class="page-header"><h1>Recettes du monde</h1></header>
<nav class="row navbar navbar-inverse">
    <div class="navbar-header">
        <a href="./" class="navbar-brand"><?= $titre ?></a>
    </div>
    <ul class="nav navbar-nav">
        <li><a class="btn btn-inverse" href="./">Accueil</a></li>
        <?php
        if ($_SESSION['modifie']) {
        ?>
        <li><a class="btn btn-inverse" href="?modifsup">Administrer les recettes</a></li>
        <li><a class="btn btn-inverse" href="?modifpays">Administrer les pays</a></li>
            <?php
        }
        ?>
        <li><a class="btn btn-inverse" href="?deconnect">Déconnexion</a></li>
    </ul>
</nav>


