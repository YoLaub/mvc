<?php

/**
*	Controleur secondaire : connexion 
*/

if ( $_SERVER["SCRIPT_FILENAME"] == str_replace(DIRECTORY_SEPARATOR, '/',  __FILE__) ) {
	// Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : '.basename(__FILE__));
}

require_once RACINE . "/modele/authentification.inc.php";

// creation du menu burger
$menuBurger = array();
$menuBurger[] = ["url"=>"./?action=connexion","label"=>"Connexion"];
$menuBurger[] = ["url"=>"./?action=inscription","label"=>"Inscription"];

// recuperation des donnees GET, POST, et SESSION
if (!isset($_POST["mailU"]) || !isset($_POST["mdpU"])){
    // on affiche le formulaire de connexion
    $titre = "authentification";
    include RACINE . "/vue/entete.html.php";
    include RACINE . "/vue/vueAuthentification.php";
    include RACINE . "/vue/pied.html.php";
} else {
    
	// à completer
    
}

?>