<?php

include_once "bd.inc.php";

function getAimerById($mailU, $idR){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from aimer where mailU=:mailU and  idR=:idR");
        $req->bindValue(':idR', $idR, PDO::PARAM_INT);
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        
        $req->execute();
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die( "Erreur !: " . $e->getMessage() );
    }
    return $resultat;
}

function addAimer($mailU, $idR) {
    $resultat = -1;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("insert into aimer (mailU, idR) values(:mailU,:idR)");
        $req->bindValue(':idR', $idR, PDO::PARAM_INT);
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        
        $resultat = $req->execute();
    } catch (PDOException $e) {
        die( "Erreur !: " . $e->getMessage() );
    }
    return $resultat;
}

function delAimer($mailU, $idR) {
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("delete from aimer where idR=:idR and mailU=:mailU");
        $req->bindValue(':idR', $idR, PDO::PARAM_INT);
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        
        $resultat = $req->execute();
    } catch (PDOException $e) {
        die( "Erreur !: " . $e->getMessage() );
    }
    return $resultat;
}


if ( $_SERVER["SCRIPT_FILENAME"] == str_replace(DIRECTORY_SEPARATOR, '/',  __FILE__) ) {
    // prog principal de test
    header('Content-Type:text/plain');

    echo "\n getAimerById(mailU, idR) : \n";
    print_r(getAimerById("mathieu@gmail.dom", 1));

    echo "\n addAimer(\"mathieu@gmail.dom\",1) : \n";
    print_r(addAimer("mathieu@gmail.dom", 1));

    
}
?>
