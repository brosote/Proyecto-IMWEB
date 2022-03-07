<?php
	$user= "root";
	$pass = "";
	$host= "localhost";
	
	$db_nombre = "web";

	$connection = @mysqli_connect($host, $user, $pass, $db_nombre);

	if (!$connection) {
		echo "Connection failed!";
	}
?>