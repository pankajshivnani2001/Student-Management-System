<?php 
	include("../dbConfig.php");//for database connection

	//if the studentId has been set from the AJAX call, then execute the delete query
	if(isset($_POST['studentId']))
	{
		
		$id = $_POST['studentId'];

		$deleteQuery = "DELETE FROM studentrecords WHERE id = '$id'";
		mysqli_query($con, $deleteQuery);
	}
?>