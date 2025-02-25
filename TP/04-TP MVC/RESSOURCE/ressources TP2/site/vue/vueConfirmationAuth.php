<?php

if ( $_SERVER["SCRIPT_FILENAME"] == str_replace(DIRECTORY_SEPARATOR, '/',  __FILE__) ) {
	// Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : '.basename(__FILE__));
}

?>
<h1>Connexion</h1>

Mon adresse électronique : <?= getMailULoggedOn() ?> <br />

<hr>

<a href="./?action=deconnexion">se deconnecter</a>
