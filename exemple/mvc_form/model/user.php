<?php

/* 
*  METIER : USER
*/

class DBUser extends DbConnect {
	
	public function __construct() {
		//ajoute les requettes spécifiques sur la base de données :
		require( ROOT . 'model/dao/dbTable.php' ); //nom de la table à selectionner
		require( ROOT . 'model/dao/UserDAO.php' );
	}

	/* 
	*  Lecture des tuples dans une table
	*  En option on selectionne le premier tuple au choix : $from
	*  On retourne le nombre total de tuples choisi : $total
	*/
	public function getAll():string|array {
			
		$data = UserDAO::readAll(DB_USER_TABLE, 0, 3);

		//lance le trigger sur la base de données :
		//$user = read_users(DB_USER_TABLE, 0, 3); //lecture des 3 premieres lignes UNIQUEMENT

		if (count($data) === 0) {
			return (DB_USER_TABLE . " : cette table est vide !"); 
		} else {
			return $data;
		}

	}
	
	public function updateOne($name, $paramVal, $id) : bool {
		
		//Action (instance statique) sur la base de données :
		if ( UserDAO::updateOne(DB_USER_TABLE, $name, $paramVal, $id) ) return true;
		
	}

}