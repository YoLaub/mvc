<?php

/**
*	Controleur secondaire : monProfil
*/

if ( $_SERVER["SCRIPT_FILENAME"] == str_replace(DIRECTORY_SEPARATOR, '/',  __FILE__) ) {
	// Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : '.basename(__FILE__));
}

require_once RACINE . "/modele/authentification.inc.php";
require_once RACINE . "/modele/bd.utilisateur.inc.php";
require_once RACINE . "/modele/bd.typecuisine.inc.php";
require_once RACINE . "/modele/bd.resto.inc.php";

// creation du menu burger
$menuBurger = array();
$menuBurger[] = ["url"=>"./?action=profil","label"=>"Consulter mon profil"];
$menuBurger[] = ["url"=>"./?action=updProfil","label"=>"Modifier mon profil"];


// recuperation des donnees GET, POST, et SESSION

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
if (isLoggedOn()){
    $mailU = getMailULoggedOn();
    $util = getUtilisateurByMailU($mailU);
    
    $mesRestosAimes = getRestosAimesByMailU($mailU);
    
    $mesTypeCuisineAimes = getTypesCuisinePreferesByMailU($mailU);
    
    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Mon profil";
    include RACINE . "/vue/entete.html.php";
    include RACINE . "/vue/vueMonProfil.php";
    include RACINE . "/vue/pied.html.php";
} else {
    $titre = "Mon profil";
    include RACINE . "/vue/entete.html.php";
    include RACINE . "/vue/pied.html.php";
}

?>