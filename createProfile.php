<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student System | Create</title>
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

	<p id=successMsg></p>

	<h1 style="text-align: center;">Create</h1>


	<!-- Form for taking student profile information input -->
	<div class="formContainer">
	<form action="createProfile.php" method="POST">
			<label for="name">Enter Student Name</label>
			<input type="text" name="name" id="name" required>
			<br>
			<label for="branch">Select Branch</label>
			<select name="branch">
				<option value="Computer Science">Computer Science</option>
				<option value="Mechanical">Mechanical</option>
				<option value="Electrical">Electrical</option>
				<option value="Electronics">Electronics</option>
			</select>
			<br>
			<label for="phone">Enter 10 digit Phone Number</label>
			<input type="number" name="phone" id="phone">
			<br>
			<label for="gender">Select Gender</label>
			<input type="radio" name="gender" value="male"><span>Male</span>
			<input type="radio" name="gender" value="female"><span>Female</span>

			<br>
			<input type="submit" name="submit" value="Submit">
	</form>
	</div>


	<?php 
		include("assets/dbConfig.php");//For Database connection configuration

		/* when the user fills the form above and submits the form(POST), fetch all the entered details and insert into
		   database
		*/
		if(isset($_POST['submit']))
		{
			$name = $_POST['name'];
			$branch = $_POST['branch'];
			$phone = $_POST['phone'];
			$gender = $_POST['gender'];

			$insertQuery = "INSERT INTO studentrecords(name, branch, mobileNo, gender) values ('$name', '$branch', '$phone', '$gender')";
			mysqli_query($con, $insertQuery);

			//to display the success message, we use simple JavaScript 
			echo "<script>document.getElementById('successMsg').innerText = 'Inserted Data Successfully!'</script>";
		}
	?>
</body>
</html>