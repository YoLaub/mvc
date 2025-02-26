<?php

include_once "bd.inc.php";


function getAimerById($mailU, $idR)
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from aimer where idR=:idR and mailU=:mailU");
        $req->bindValue(':idR', $idR, PDO::PARAM_INT);
        $req->bindValue(':mailU', $mailU, PDO::PARAM_INT);
        $req->execute();
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
        if ($resultat) {
            $resultat = true;
        } else {
            $resultat = false;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addAimer($mailU, $idR)
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("insert into aimer (mailU, idR) values(:mailU,:idR)");
        $req->bindValue(':idR', $idR, PDO::PARAM_INT);
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function delAimer($mailU, $idR)
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("delete from aimer where aimer.idr=:idr and aimer.mailU=:mailU");
        $req->bindValue(':idR', $idR, PDO::PARAM_INT);
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
