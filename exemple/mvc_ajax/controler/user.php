<?php

/* 
*  Controlleur READ USERS
*/

class User {

	public function __construct() {
		
		$title = __CLASS__; //Nom de la classe pour la vue
		
		/** 
		*	Instance du modèle :
		*/
		require( ROOT . 'model/user.php' );
		$db = new DBUser;
		
		/** 
		*	Si le controlleur reçoit (via AJAX) update :
		*/
		if( isset($_GET['update']) ) {
			
			//Boolean pour Ajax :
			$valide = false;

			// Traitement des POST reçus depuis le trigger UPDATE (le bouton HTML) : 
			foreach ($_POST as $paramName => $paramVal) {
				
				/* 
				*  Découpage du nom reçu $param_name avec l'underscore, ex: 1_u_nom
				*  $id étant l'id de la ligne (tuple), ex : 1
				*  $type étant ici la lettre : u (u pour user)
				*  $name étant le nom du paramètre, ex : nom
				*/
				
				list($id, $type, $name) = explode('_', $paramName);
				
				//formatage correct pour la string "born", sinon elle ne sera pas trouvée sur la base :
				if($name === "born") $name = "ne_le";
				
				//Retour pour le debug :
				$dbug .= $id . " => " . $name . " => " . $paramVal . "\n";
				
				if(!$db->updateOne($name, $paramVal, $id))die("err");
				

			}

			//Dbug :
			die($dbug);

			//Retours pour AJAX :

			if (!$valide) die("err"); //renvoi l'erreur si le traitement sur la base a echoué

			/* 
			*  On relance le trigger : lecture des utilisateurs
			*/

			$user = $db->getAll();
			
			//On inclus seulement la liste des utilisateurs afin qu'elle soit mise à jour sur la div id="content"
			include( ROOT . 'vue/userTable.php');
			
			$JS_data = null; //on vide la variable du POST pour JQuery
			
			die; //on arrette le script pour Ajax
			
		}
		
		/** 
		*	La classe User affiche pas défaut tous les utilisateurs
		*	On charge le modèle correspondant
		*	On charge également de la métode readAll
		*/

		$user = $db->getAll();
		
		/**
		*  On traite les données de $user sur la vue
		*  ==> précisement dans le fichier : /vue/user/usr_data.php
		*  qui est inclus dans : vue/user/users.php
		*/
		
		include('vue/commun/header.php');
		include('vue/user.php');
		include('vue/commun/footer.php');

	}
	
}

