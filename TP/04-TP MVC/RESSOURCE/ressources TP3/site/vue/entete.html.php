<!DOCTYPE html>
<html>
<?php include('head.html.php'); ?>

<body>
    <nav>

        <ul id="menuGeneral">
            <li><a href="./?action=accueil">Accueil</a></li>
            <li><a href="./?action=recherche"><img src="asset/images/rechercher.png" alt="loupe" />Recherche</a></li>
            <li></li>
            <li id="logo"><a href="./?action=accueil"><img src="asset/images/logoBarre.png" alt="logo" /></a></li>
            <li></li>
            <li><a href="./?action=cgu">CGU</a></li>
            <?php
            if (isLoggedOn()) {
            ?><li><a href="./?action=profil"><img src="asset/images/profil.png" alt="loupe" /> Mon Profil </a></li>
            <?php
            } else {
            ?><li><a href="./?action=connexion"><img src="asset/images/profil.png" alt="loupe" />Connexion</a></li>
            <?php
            }
            ?>




        </ul>
    </nav>
    <div id="bouton">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <ul id="menuContextuel">
        <li><img src="asset/images/logoBarre.png" alt="logo" /></li>
        <?php if (isset($menuBurger)) { ?>
            <?php for ($i = 0; $i < count($menuBurger); $i++) { ?>
                <li>
                    <a href="<?php echo $menuBurger[$i]['url']; ?>">
                        <?php echo $menuBurger[$i]['label']; ?>
                    </a>
                </li>
            <?php } ?>
        <?php } ?>
    </ul>

    <div id="corps">