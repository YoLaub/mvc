<?php

/**
 * Controleur secondaire : connexion
 */

if ($_SERVER["SCRIPT_FILENAME"] == str_replace(DIRECTORY_SEPARATOR, '/', __FILE__)) {
    // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : ' . basename(__FILE__));
}

require_once RACINE . "/modele/authentification.inc.php";

// Création du menu burger
$menuBurger = array();
$menuBurger[] = ["url" => "./?action=connexion", "label" => "Connexion"];
$menuBurger[] = ["url" => "./?action=inscription", "label" => "Inscription"];

// Récupération des données GET, POST, et SESSION
if (!isset($_POST["mailU"]) || !isset($_POST["mdpU"]) || empty($_POST["mailU"]) || empty($_POST["mdpU"])) {
    // On affiche le formulaire de connexion si les données ne sont pas présentes ou vides
    $titre = "Authentification";
    include RACINE . "/vue/entete.html.php";
    include RACINE . "/vue/vueAuthentification.php";
    include RACINE . "/vue/pied.html.php";
} else {
    // Déconnexion de l'utilisateur actuel si nécessaire
    if (!empty($_SESSION['mailU']) && !empty($_SESSION['mdpU'])) {
        unset($_SESSION['mailU']);
        unset($_SESSION['mdpU']);
    }

    // Tentative de connexion
    login($_POST['mailU'], $_POST['mdpU']);

    if (isLoggedOn()) {
        // Affichage des vues si l'utilisateur est connecté
        include RACINE . "/vue/entete.html.php";
        include RACINE . "/vue/vueConfirmationAuth.php";
        include RACINE . "/vue/pied.html.php";
    } else {
        // Affichage d'un message d'erreur si l'authentification échoue
        include RACINE . "/vue/entete.html.php";
        include RACINE . "/vue/vueAuthentification.php";
        include RACINE . "/vue/pied.html.php";
    }
}
?>
