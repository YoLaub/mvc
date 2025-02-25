<?php

/**
*	Classe principale de l'objet de connexion PDO
*/

abstract class DbConnect {

	/** 
	*	Instance de PDO pour la connexion au SGBDR.
	*	Le point d'interrogation indique que $connect 
	*	est null s'il y a aucune connexion.
	*/
	private static ?PDO $connect = null;

	//Options PDO sur les requettes :
	private static array $options = [
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_EMULATE_PREPARES => false
	];	//Désactiver ATTR_EMULATE_PREPARES permet d'ajouter des variables dans un tableau sur les requettes execute()

	/**
	*  Objet PDO Connexion 
	*  https://www.php.net/manual/fr/pdo.construct.php
	*/

	private static function connexion() {
		
		try {
			
            $dsn = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT;
            if (!empty(DB_DATABASE)) {
                $dsn .= ';dbname=' . DB_DATABASE;
            }
			
			//Constructeur PDO :			
			self::$connect = new PDO($dsn, DB_USERNAME, DB_PASSWORD, self::$options);
			
		}
		 
		catch(Exception $e) {
			
			//Si la base est absente, on redirige vers la vue setup.php :
			if($e->getCode() === 1049) {
				include(ROOT . 'vue/setup.php');
				die;
			}
			
			$err = 'Erreur : '.$e->getMessage().'<br />';
			$err .= 'N° : '.$e->getCode();
			die('Une erreur est survenue !<br />'.$err);
		}
		
		return self::$connect;
		
	}
	
	// Exécute une requête SQL éventuellement paramétrée
	protected static function executerRequete(string $sql, array $params = null): ?PDOStatement {
		
		try {
			
			$connect = self::connexion();
			
			if($params==='single') {
				$connect->exec($sql);
			} else {
                $statement = $connect->prepare($sql); // requête préparée
                $statement->execute($params);
                return $statement;
			}
		}
		catch(Exception $e) {
			//Dbug
			die ( $e->getMessage()."<br><b>Impossible de récupérer les données sur la table.</b>" );
		}
		
		return null;
		
	}	
	
}
