<?php

if ( $_SERVER["SCRIPT_FILENAME"] == str_replace(DIRECTORY_SEPARATOR, '/',  __FILE__) ) {
	// Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : '.basename(__FILE__));
}

?>
<h1>Inscription Réussie</h1>

<h2>Bienvenue parmi nous cher gastronome</h2>


<a href="./?action=accueil">Accueil</a>
<a href="./?action=profil">Profil</a>
<a href="./?action=recherche">Recherche</a>