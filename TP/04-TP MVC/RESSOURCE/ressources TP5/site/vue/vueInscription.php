<?php

if ( $_SERVER["SCRIPT_FILENAME"] == str_replace(DIRECTORY_SEPARATOR, '/',  __FILE__) ) {
	// Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : '.basename(__FILE__));
}

?>
<h1>Inscription</h1>
<span id="alerte"><?= $msg ?></span>
<form action="./?action=inscription" method="POST">

    <input type="text" name="mailU" placeholder="Email de connexion" /><br />
    <input type="password" name="mdpU" placeholder="Mot de passe"  /><br />
    <input type="text" name="pseudoU" placeholder="Pseudo" /><br />

    <input type="submit" value="S'inscrire" />

</form>
