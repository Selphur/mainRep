<?php

function connect() { //Please make sure that all the variables below are filled in.
	$host = ""; //The host of your server.
	$login = ""; //The login to access databases.
	$password = ""; //The password to access databases.
	$dbName = "db"; //The name of the database to interact with.
	
	return $dbConnection = new mysqli($host, $login, $password, $dbName);
}

function disconnect($dbConnection) {
	$dbConnection->close();
}

?>