<?php

if ( $_SERVER["SCRIPT_FILENAME"] == str_replace(DIRECTORY_SEPARATOR, '/',  __FILE__) ) {
	// Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : '.basename(__FILE__));
}

?>

<h1>Recherche d'un restaurant</h1>
<form action="./?action=recherche&critere=<?= $critere ?>" method="POST">


    <?php
    switch ($critere) {
        case "nom":
            ?>
            Recherche par nom : <br />
            <input type="text" name="nomR" placeholder="nom" value="<?= $nomR ?>" /><br />
            <?php
            break;
        case "adresse":
            ?>
            Recherche par adresse : <br />
            <input type="text" name="villeR" placeholder="ville" value="<?= $villeR ?>"/><br />
            <input type="text" name="cpR" placeholder="code postal" value="<?= $cpR ?>"/><br />
            <input type="text" name="voieAdrR" placeholder="rue" value="<?= $voieAdrR ?>"/><br />
            <?php
            break;
        
    }
    ?>
    <br /><br />
    <input type="submit" value="Rechercher" />

    <?php
echo print_r($_POST);

    ?>

</form>
