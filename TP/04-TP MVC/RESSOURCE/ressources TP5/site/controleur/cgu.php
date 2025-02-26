<?php

/**
*	Controleur secondaire : cgu
*/

if ( $_SERVER["SCRIPT_FILENAME"] == str_replace(DIRECTORY_SEPARATOR, '/',  __FILE__) ) {
	// Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : '.basename(__FILE__));
}


// recuperation des donnees GET, POST, et SESSION

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 

// traitement si necessaire des donnees recuperees
// creation du menu burger
$menuBurger = array();
$menuBurger[] = ["url"=>"#top","label"=>"Conditions générales"];
$menuBurger[] = ["url"=>"#accpt","label"=>"Acceptation"];
$menuBurger[] = ["url"=>"#desc","label"=>"Description"];
$menuBurger[] = ["url"=>"#fonc","label"=>"Fonctionnalités"];
$menuBurger[] = ["url"=>"#mode","label"=>"Modération"];
$menuBurger[] = ["url"=>"#sanc","label"=>"Sanctions"];
$menuBurger[] = ["url"=>"#moti","label"=>"Motifs"];
$menuBurger[] = ["url"=>"#foncr","label"=>"Restaurateurs"];
$menuBurger[] = ["url"=>"#gene","label"=>"Généralités"];
$menuBurger[] = ["url"=>"#prot","label"=>"Données personnelles"];
$menuBurger[] = ["url"=>"#droi","label"=>"Droits d'accès"];
$menuBurger[] = ["url"=>"#util","label"=>"Données personnelles"];
$menuBurger[] = ["url"=>"#bila","label"=>"Bilan des fonctionnalités"];



// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "r3st0.fr - Conditions générales d'utilisations";
include RACINE . "/vue/entete.html.php";
include RACINE . "/vue/vueCgu.php";
include RACINE . "/vue/pied.html.php";


?>