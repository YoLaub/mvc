<?php

if ($_SERVER["SCRIPT_FILENAME"] == str_replace(DIRECTORY_SEPARATOR, '/',  __FILE__)) {
    // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : ' . basename(__FILE__));
}

?>

<h1>Mon profil</h1>

Mon adresse électronique : <?= $util["mailU"] ?> <br />
Mon pseudo : <?= $util["pseudoU"] ?> <br />

<hr>


les restaurants que j'aime : <br>
<?php
    foreach ($mesRestosAimes as $item) {
        
        echo "<a href='./?action=detail&idR=".$item["idR"]."'>".$item ["nomR"]."</a><br>";
    }
    ?>

<hr>
les types de cuisine que j'aime :
<ul id="tagFood">
    <?php
    foreach ($mesTypeCuisineAimes as $item) {
        echo "<li class='tag' ><span class='tag'>#</span>" . htmlspecialchars($item['libelleTC']) . "</li>";
    }
    ?>
</ul>
<hr>

<a href="./?action=deconnexion">se deconnecter</a>