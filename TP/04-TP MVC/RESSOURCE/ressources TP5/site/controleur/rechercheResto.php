<?php

/**
*	Controleur secondaire : rechercheResto 
*/

if ( $_SERVER["SCRIPT_FILENAME"] == str_replace(DIRECTORY_SEPARATOR, '/',  __FILE__) ) {
	// Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : '.basename(__FILE__));
}

require_once RACINE . "/modele/bd.resto.inc.php";
require_once RACINE . "/modele/bd.typecuisine.inc.php";
require_once RACINE . "/modele/bd.photo.inc.php";

// creation du menu burger
$menuBurger = array();
$menuBurger[] = ["url"=>"./?action=recherche&critere=nom","label"=>"Recherche par nom"];
$menuBurger[] = ["url"=>"./?action=recherche&critere=adresse","label"=>"Recherche par adresse"];

// critere de recherche par defaut
$critere = "nom";
if (isset($_GET["critere"])) {
    $critere = $_GET["critere"];
}

// recuperation des donnees GET, POST, et SESSION
if (isset($_GET["critere"])){
    $critere = $_GET["critere"];
}
$nomR=null;
if (isset($_POST["nomR"])){
    $nomR = $_POST["nomR"];
}
$voieAdrR=null;
if (isset($_POST["voieAdrR"])){
    $voieAdrR = $_POST["voieAdrR"];
}
$cpR=null;
if (isset($_POST["cpR"])){
    $cpR = $_POST["cpR"];
}
$villeR=null;
if (isset($_POST["villeR"])){
    $villeR = $_POST["villeR"];
}
$tabIdTC = array();
if(isset($_POST["tabIdTC"])){
    $tabIdTC = $_POST["tabIdTC"];
}


// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 


switch($critere){
    case 'nom':
        // recherche par nom
        $listeRestos = getRestosByNomR($nomR);
        break;
    case 'adresse':
        // recherche par adresse
        $listeRestos = getRestosByAdresse($voieAdrR, $cpR, $villeR);
        break;
    
}


// traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Recherche d'un restaurant";
include RACINE . "/vue/entete.html.php";
include RACINE . "/vue/vueRechercheResto.php";
if (!empty($_POST)) {
    // affichage des resultats de la recherche
    include RACINE . "/vue/vueResultRecherche.php";
}
include RACINE . "/vue/pied.html.php";


?>