<?php

/**
*	Module du routing (routage).
*	Chaque action est récupérée par la méthode : $_GET
*/

function redirigeVers($action="defaut") {
	
    $lesActions = array();
    $lesActions["defaut"] = "listeRestos.php";
    $lesActions["accueil"] = "listeRestos.php";
    $lesActions["liste"] = "listeRestos.php";
    $lesActions["detail"] = "detailResto.php";
    $lesActions["recherche"] = "rechercheResto.php";
    $lesActions["cgu"] = "cgu.php";
    $lesActions["aimer"] = "aimer.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["profil"] = "monProfil.php";
    $lesActions["inscription"] = "inscription.php";

	$controler_id = $lesActions[$action];

	//si le fichier n'existe pas :
	if(! file_exists(__DIR__ . '/'. $controler_id) ) die("Le fichier : " . $controler_id . " n'existe pas !");

	//si la clé "action" existe dans notre tableau "lesActions" :
    if (array_key_exists($action, $lesActions)) {
		// le fichier à inclure sera retourné :
        return $controler_id;
    } else {
        return $lesActions["defaut"];
    }
}

?>