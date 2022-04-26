<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student System | Delete</title>
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	
</head>
<body>
	<!-- Navigation Bar -->
	<nav>
		<span>Student Management System</span>
		<div class="links">
			<a href="createProfile.php">Create</a>
			<a href="read.php">Read</a>
			<a href="update.php">Update</a>
			<a href="delete.php">Delete</a>
		</div>
	</nav>

	
		<h1 style="text-align: center;">Delete</h1>
		

		<?php 

			include("assets/dbConfig.php");//For Database connection configuration
			
			$readQuery = "SELECT * FROM studentrecords";//fetch all the student records
			$results = mysqli_query($con, $readQuery);

			//no need to display if student records table is empty
			if(mysqli_num_rows($results) == 0)
			{
				echo "<h2 style='text-align: center'> No Data Found </h2>";
			}

			else
			{
				//table header
				echo "<table border='1px'>
						<tr bgcolor='limegreen'>
						<th>ID</th>
						<th>Name</th>
						<th>Branch</th>
						<th>Phone Number</th>
						<th>Gender</th>
						<th></th>
					</tr>";

				//table rows with delete button on each row
				while($row = mysqli_fetch_assoc($results))
				{
					echo "

							<tr>

								<td>". $row['id'] ."</td>
								<td>". $row['name'] ."</td>
								<td>". $row['branch'] ."</td>
								<td>". $row['mobileNo'] ."</td>
								<td>". $row['gender'] ."</td>
								<td class='buttonCell buttonCellDelete'><button onclick='deleteRow(" . $row['id'] . ")'>Delete</button></td>
							</tr>

						";
				}
			}

		?>
	</table>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script><!-- jQuery import -->
	<script src="assets/js/script.js"></script><!-- for the deleteRow() function -->

</body>
</html>