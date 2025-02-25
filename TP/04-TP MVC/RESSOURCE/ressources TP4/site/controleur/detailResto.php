<?php

/**
*	Controleur secondaire : detailResto 
*/

if ( $_SERVER["SCRIPT_FILENAME"] == str_replace(DIRECTORY_SEPARATOR, '/',  __FILE__) ) {
	// Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : '.basename(__FILE__));
}

require_once RACINE . "/modele/bd.resto.inc.php";
require_once RACINE . "/modele/bd.typecuisine.inc.php";
require_once RACINE . "/modele/bd.photo.inc.php";
require_once RACINE . "/modele/bd.critiquer.inc.php";
require_once RACINE . "/modele/bd.aimer.inc.php";
require_once RACINE . "/modele/authentification.inc.php";

// creation du menu burger
$menuBurger = array();
$menuBurger[] = ["url"=>"#top","label"=>"Le restaurant"];
$menuBurger[] = ["url"=>"#adresse","label"=>"Adresse"];
$menuBurger[] = ["url"=>"#photos","label"=>"Photos"];
$menuBurger[] = ["url"=>"#horaires","label"=>"Horaires"];
$menuBurger[] = ["url"=>"#crit","label"=>"Critiques"];

// recuperation des donnees GET, POST, et SESSION
$idR = $_GET["idR"];

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$unResto = getRestoByIdR($idR);

$lesTypesCuisine = getTypesCuisineByIdR($idR);
$lesPhotos = getPhotosByIdR($idR);
$noteMoy = round(getNoteMoyenneByIdR($idR), 0);
$mailU = getMailULoggedOn();
$aimer = getAimerById($mailU, $idR);
$critiques = getCritiquerByIdR($idR);

// traitement si necessaire des donnees recuperees
;


// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "detail d'un restaurant";
include RACINE . "/vue/entete.html.php";
include RACINE . "/vue/vueDetailResto.php";
include RACINE . "/vue/pied.html.php";

?>