<?php

/**
*	Controleur secondaire : aimer
*/

if ( $_SERVER["SCRIPT_FILENAME"] == str_replace(DIRECTORY_SEPARATOR, '/',  __FILE__) ) {
	// Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : '.basename(__FILE__));
}

include_once RACINE . "/modele/bd.aimer.inc.php";


// recuperation des donnees GET, POST, et SESSION
$idR = $_GET["idR"];

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 

$mailU = getMailULoggedOn();
if ($mailU != "") {
    $aimer = getAimerById($mailU, $idR);

// traitement si necessaire des donnees recuperees
    ;
    if ($aimer == false) {
        addAimer($mailU, $idR);
    } else {
        delAimer($mailU, $idR);
    }
}

// redirection vers le referer
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>