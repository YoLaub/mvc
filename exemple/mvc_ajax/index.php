<?php
	
	/* 
	*  Controlleur principal
	*/
	
	//Connexion à la BD :
	require('model/dao/connect.php' );
	
	//Paramètres statiques :
	require('model/dbParam.php');
	define("ROOT", __DIR__ . '/');
	
	//Aiguillage par GET (principe du routage) :
	foreach ($_GET as $param_name => $param_val) {
		
		switch($param_name) {
			case "user": //http://mvc/?user
				require( 'controler/user.php' );
				new User();
				break;
			case "setup": //http://mvc/?setup
				require( 'controler/setup.php' );
				new Setup();
				break;
			//
			// D'autres ?
			//
			default: //page 404
				include( 'vue/404.php' );
		}
		
	}
	
	// Page par défaut :
	if ( count($_GET) === 0 ) include( 'vue/intro.php' );
	
?>