<?php

class Setup {
	
	public function __construct() {
		
		require_once('model/dao/dbSetup.php' );
		require('model/dao/dbTable.php' );

		DbSetup::createDB(DB_DATABASE);
		UsrSetup::createTable(DB_USER_TABLE);
		UsrSetup::insertData(1,"Léponge","Bob","robert@sponge.fr","04/01/1999","NYC","0","0607080910");
		UsrSetup::insertData(2,"Curry","Marie","marie@spice.fr","15/12/1983","Calcutta","1","0203040506");
		UsrSetup::insertData(3,"Polo","Marco","polo@discover.it","15/09/1254","Venise","3","0708091011");

		include('vue/weldone.php');
	}

}
