<?php

// requête préparée
/*$recup = $connexion->prepare(" SELECT p.lintitule as plintitule ,p.ladesc,p.img, GROUP_CONCAT(r.id) as idrecette , r.titre,SUBSTR( r.ladesc,1,100)  as ladescrecette, r.pays_id, c.lintitule as clintitule
FROM continent c
  INNER JOIN pays p
    ON c.id = p.continent_id
  INNER JOIN recette r
    ON p.id = r.pays_id
WHERE c.id = :lid
GROUP BY p.id
ORDER BY r.titre DESC

   ");*/

$recup = $connexion->prepare(" SELECT c.lintitule as clintitule,
 p.id as pid, p.lintitule as plintitule, p.ladesc, p.img,
 COUNT(r.id) as nb, GROUP_CONCAT(r.id) as idrecette , GROUP_CONCAT(r.titre SEPARATOR '|||') as titre
FROM continent c
  INNER JOIN pays p
    ON c.id = p.continent_id
  INNER JOIN recette r
    ON p.id = r.pays_id
WHERE c.id = :lid
GROUP BY p.id
ORDER BY p.lintitule DESC
   ;");

// attribution de valeurs
$recup->bindValue(':lid',$continent, PDO::PARAM_INT);


// exécuter la requête
$recup->execute();

$recuptous= $recup->fetchAll(PDO::FETCH_OBJ);

$nb = $recup->rowCount();

$titre = $recuptous[0]->clintitule;



