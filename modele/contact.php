<?php

$titre = "Earth's food - Contact";

$monmail = "webdevcf2m@gmail.com";

if(isset($_POST['lenom']))

{

    $lenom = $_POST['lenom'];

    $lemail = $_POST['lemail'];

    $letexte = $_POST['letexte'];


    $letitre = "Message envoyé depuis le site de recettes";

    $entete = "From: $lenom <$lemail> \r\n" .     "Reply-To: $lenom <$lemail> \r\n" .     "X-Mailer: PHP/" . phpversion();


    $verif_envoi = mail($monmail, $letitre, $letexte, $entete, "-fformulaire@moncf2m.be");

    if($verif_envoi)
    {
        $message = "<p>Votre message a été envoyé</p>";
    }else

    {

        $message = "<p>Erreur lors de l'envoi, veuillez <a href='#' onclick='history.go(-1);'>réessayer</a></p>";

    }

}
?>
