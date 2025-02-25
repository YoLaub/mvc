<?php

//---------/
/* SETUP */
//-------/

/*
*  Création de la BDD.
*  Connexion unique au SGBD afin de créer la base.
*/

class DbSetup {
	
	public static function createDB(string $dbName): void {
		
		try {
			$dbh = new PDO("mysql:host=".DB_HOST, DB_USERNAME, DB_PASSWORD);
			$dbh->exec("CREATE DATABASE `{$dbName}`") or die(print_r($dbh->errorInfo(), true));
		}
		catch (PDOException $e) {
			die("DB ERROR: " . $e->getMessage());
		}
		
	}
}

/*
*  Création de la table USER, et peuplement de la table.
*  Classe héritée de DbConnect()
*/

class UsrSetup extends DbConnect {
	
	const table = DB_USER_TABLE;
	
	public static function createTable() {
			
			$table = self::table;
			
			// Création d'une table 'client' :
			$sql = "CREATE TABLE `$table`(
				id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
				nom VARCHAR(30) NOT NULL,
				prenom VARCHAR(30) NOT NULL,
				email VARCHAR(70) NOT NULL UNIQUE,
				ne_le VARCHAR(30) NOT NULL,
				ville VARCHAR(30) NOT NULL,
				enfants VARCHAR(30) NOT NULL,
				tel VARCHAR(30) NOT NULL
			)";
			
			return self::executerRequete($sql);
	}
	
	public static function insertData($id,$nom,$prenom,$email,$nele,$ville,$enfants,$tel) {
		
		$table = self::table;
        $sql = "INSERT INTO `$table` (id, nom, prenom, email, ne_le, ville, enfants, tel) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

		$arrSelector = [$id,$nom,$prenom,$email,$nele,$ville,$enfants,$tel];
		return self::executerRequete($sql, $arrSelector);
	}
}
