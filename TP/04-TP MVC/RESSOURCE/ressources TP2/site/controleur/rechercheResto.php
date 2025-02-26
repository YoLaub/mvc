<?php

/**
 *	Controleur secondaire : rechercheResto 
 */

if ($_SERVER["SCRIPT_FILENAME"] == str_replace(DIRECTORY_SEPARATOR, '/',  __FILE__)) {
    // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : ' . basename(__FILE__));
}

require_once RACINE . "/modele/bd.resto.inc.php";

// creation du menu burger
$menuBurger = array();
$menuBurger[] = ["url" => "./?action=recherche&critere=nom", "label" => "Recherche par nom"];
$menuBurger[] = ["url" => "./?action=recherche&critere=adresse", "label" => "Recherche par adresse"];

// critere de recherche par defaut
$critere = "nom";
if (isset($_GET["critere"])) {
    $critere = $_GET["critere"];
}
// recuperation des donnees GET, POST, et SESSION
// recherche par nom
if (isset($_POST["nomR"])) {
    $nomR = $_POST["nomR"];
} else {
    $nomR = null;
}

if (isset($_POST["voieAdrR"]) || isset($_POST["cpR"]) || isset($_POST["villeR"])) {
    $voieAdrR = $_POST["voieAdrR"];
    $cpR = $_POST["cpR"];
    $villeR = $_POST["villeR"];
} else {
    // recherche par adresse
    $voieAdrR = null;
    $cpR = null;
    $villeR = null;
}



// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
// Si on provient du formulaire de recherche : $critere indique le type de recherche à effectuer
if (!empty($_POST)) {
    switch ($critere) {
        case 'nom':
            // recherche par nom
            $listeRestos = getRestosByNomR($nomR);
            break;
        case 'adresse':
            // recherche par adresse
            $listeRestos = getRestosByAdresse($voieAdrR, $cpR, $villeR);
            break;
    }
}


// traitement si necessaire des donnees recuperees

// appel du script de vue qui permet de gerer l'affichage des donnees

if (empty($_POST)) {
    $titre = "Recherche d'un restaurant";
    include RACINE . "/vue/entete.html.php";
    include RACINE . "/vue/vueRechercheResto.php";
    include RACINE . "/vue/pied.html.php";
} else {
    include RACINE . "/vue/entete.html.php";
    include RACINE . "/vue/vueResultRecherche.php";
    include RACINE . "/vue/pied.html.php";
}
