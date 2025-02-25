<?php

/* 
*  DAO : USER
*  Ici seulement avec "READ" et "UPDATE"
*  Aide sur le CRUD : 
*  https://www.cloudways.com/blog/introduction-php-data-objects/
*/

class UserDAO extends DbConnect {

	/* 
	*  Lecture des tuples dans une table
	*  En option on selectionne le premier tuple au choix : $from
	*  On retourne le nombre total de tuples choisi : $total
	*/
	public static function readAll($inTable, $from=null, $total=null): array {
			
		$sql = "SELECT * FROM $inTable";
		
		$arrSelector = null;
		
		if( $from>=0 and $total>=1 ) {
			$sql .= " ORDER BY id LIMIT ?, ?";
			$arrSelector = [ $from, $total ];
		}
			
		$query = self::executerRequete($sql, $arrSelector);
		
		return $query->fetchAll(); //lecture de tous les tuples

	}
	
	/* 
	*  Mise à jour d'une donnée dans un tuple
	*/
	public static function updateOne($inTable, $name, $value, $id): bool {
			
		try {
			
			$sql = "UPDATE " . $inTable . " SET " . $name . "='" . $value . "' WHERE id=:id";
			
			$arrSelector = [ ':id' => $id ]; //requête préparée et sécurisée
			
			$query = self::executerRequete($sql, $arrSelector);
			
			return true;
		}
			
		catch(Exception $e) {
			//Dbug
			//echo $e->getMessage();
			return false;
		}

	}

}