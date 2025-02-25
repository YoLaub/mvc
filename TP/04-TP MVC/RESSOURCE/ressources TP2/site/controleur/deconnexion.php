<?php

/**
*	Controleur secondaire : deconnexion
*/

if ( $_SERVER["SCRIPT_FILENAME"] == str_replace(DIRECTORY_SEPARATOR, '/',  __FILE__) ) {
	// Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : '.basename(__FILE__));
}

require_once RACINE . "/modele/authentification.inc.php";

// recuperation des donnees GET, POST, et SESSION
// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
// traitement si necessaire des donnees recuperees         

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Deconnexion";

include RACINE . "/vue/entete.html.php";

include RACINE . "/vue/pied.html.php";

?>