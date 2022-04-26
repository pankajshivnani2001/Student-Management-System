<?php 
	
	//change the values according to your system
	$host = "localhost";
	$username = "root";
	$password = "";
	$database = "students";

	$con = mysqli_connect($host, $username, $password, $database);//connect to the database

	//display errors, if any
	if(mysqli_connect_errno()){
		echo "Failed to Connect" . mysqli_connect_errno();
	}

?>