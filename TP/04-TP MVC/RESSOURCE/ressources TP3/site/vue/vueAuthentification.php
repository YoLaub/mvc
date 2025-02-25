<?php

if ( $_SERVER["SCRIPT_FILENAME"] == str_replace(DIRECTORY_SEPARATOR, '/',  __FILE__) ) {
	// Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : '.basename(__FILE__));
}

?>
<h1>Connexion</h1>
<form action="./?action=connexion" method="POST">

    <input type="text" name="mailU" placeholder="Email de connexion" /><br />
    <input type="password" name="mdpU" placeholder="Mot de passe"  /><br />
    <input type="submit" />

</form>
<br />
<a href="./?action=inscription">Inscription</a>

<hr>
Utilisateur de test : <br />
login : <b>test@kercode.dev</b><br />
mot de passe : <b>kercode</b><br />
<mark><small>Attention : évitez le <b>copier/coller</b> car vous allez copier un espace blanc !&nbsp;&nbsp;</small></mark>
