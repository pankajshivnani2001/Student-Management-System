<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student System | Update</title>
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>
	<nav>
		<span>Student Management System</span>
		<div class="links">
			<a href="createProfile.php">Create</a>
			<a href="read.php">Read</a>
			<a href="update.php">Update</a>
			<a href="delete.php">Delete</a>
		</div>
	</nav>

	<h1 style="text-align: center;">Update</h1>

	<?php 

		include("assets/dbConfig.php");//Database connection configuration
		
		//get all the student related details from the database if the student ID is shared through the URL(GET)
		if(isset($_GET['studentId']))
		{
			$id = $_GET['studentId'];
			
			$readQuery = "SELECT * FROM studentrecords WHERE id='$id'";
			$result = mysqli_query($con, $readQuery);
			$row = mysqli_fetch_assoc($result);
			$name = $row['name']; 
			$branch = $row['branch']; 
			$phone = $row['mobileNo']; 
			$gender = $row['gender']; 
		}
		else
		{
			header("Location: update.php");
		}

	?>



	<!-- Form For Displaying Student Profile Details fetched above. User can modify these details for updation -->
	<div class="formContainer">
	
	<form action="updateHandler.php" method="POST">
			<label for="id">Student ID(cannot modify)</label>
			<input type="number" name="id" id="id" value="<?php echo $id; ?>" readonly>
			<br>
			<label for="name">Update Student Name</label>
			<input type="text" name="name" id="name" value="<?php echo $name; ?>" required>
			<br>
			<label for="branch">Select Branch</label>
			<select name="branch">
				<option value="Computer Science" <?php if($branch=="Computer Science") echo "selected='selected'"; ?>>Computer Science</option>
				<option value="Mechanical" <?php if($branch=="Mechanical") echo "selected='selected'"; ?>>Mechanical</option>
				<option value="Electrical" <?php if($branch=="Electrical") echo "selected='selected'"; ?>>Electrical</option>
				<option value="Electronics" <?php if($branch=="Electronics") echo "selected='selected'"; ?>>Electronics</option>
			</select>
			<br>
			<label for="phone">Enter 10 digit Phone Number</label>
			<input type="number" name="phone" id="phone" value="<?php echo $phone; ?>">
			<br>
			<label for="gender">Select Gender</label>
			<input type="radio" name="gender" value="male" <?php if($gender=="male") echo "checked='checked'"; ?>>Male
			<input type="radio" name="gender" value="female" <?php if($gender=="female") echo "checked='checked'"; ?>>Female

			<br>
			<input type="submit" name="update" value="Update">
	</form>
	</div>


	<?php 
		//If the user submits the above form(POST), fetch the details and update them in the database
		if(isset($_POST['update']))
		{
			$id = $_POST['id'];
			$name = $_POST['name'];
			$branch = $_POST['branch'];
			$phone = $_POST['phone'];
			$gender = $_POST['gender'];

			
			$updateQuery = "UPDATE studentrecords SET name = '$name', branch = '$branch', mobileNo = '$phone', gender = '$gender' WHERE id = '$id'";
			mysqli_query($con, $updateQuery);

			header("Location: update.php");//redirect back to the update page
		}

	?>
</body>
</html>