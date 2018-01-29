<?php
	session_start();
	
	$usernameErr = "";
	$username = "";
	$passwordErr = "";
	$password = "";
	$optionErr = "";
	$option = "";
	$students = "students";
	$message = "";

	if(isset($_POST["username01"])) {
		if($_POST){ //returns the request method used to access the page
			$username = $_POST["username01"];
			$password = $_POST["password"];
			$option = $_POST["option"];
			
			//validating username
			if (empty($username))
				$usernameErr = "Username is required.";
			else if (strlen($username) < 3)
				$usernameErr = "At least 3 characters for the username.";
			else
				$usernameErr = "";
			
			//validating password
			if (empty($password))
				$passwordErr = "Password is required.";
			else if (!preg_match("/^[a-zA-Z0-9]{6,10}+$/", $password))
				$passwordErr = "Combination of characters and digits between 6 and 10 is necessary. No whitespaces allowed.";
			else
				$passwordErr = "";
			
			//validating option
			if (empty($option))
				$optionErr = "Select one option.";
			else
				$optionErr = "";
			
			//if no errors occur, data will be inserted
			if (empty($usernameErr) && empty($passwordErr) && empty($optionErr)) {
				include("connector.php");
				
				//command to find the data
				if($option == $students)
					$sql = "SELECT * FROM students WHERE username = :username LIMIT 1;";
				else
					$sql = "SELECT * FROM admin WHERE username = :username LIMIT 1;";

				$stmt = $conn->prepare($sql);
				$stmt->bindValue(':username', $username);
				$stmt->execute();

				//returns an array indexed by column name as returned in the result set
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				
				if($stmt->rowCount() == 1) {
					$phash = $row["password"];
					
					//boolean is false
					if (password_verify($password, $phash)) {
						$username = $row["username"];
						$name = strtoupper($username);
						$_SESSION["username"] = $name;
						

						if($option == $students) {
								header("Location: student/student_home.php");
								$_SESSION["sid"] = $row["id"];
							} else
								header("Location: admin/admin_home.php");
					
						exit();
					} else
						$message = "Invalid password.";
				} else
					$message = 'Sorry your log-in details are not correct';
			}
		}
	}
?>
<!DOCTYPE>
<html lang="en-UK">
	<head>
		<link rel="stylesheet" href="style.css">
		<title> CCT Online Library </title>
		<script>
			function goBack() {
				window.history.back();
			}
		</script>
	</head>
	<body>
		<div align="center">
			<img class="image" src="CCT_Logo.jpg" alt="College Logo" style="width:40%">
			<h1>Welcome to CCT Online Library</h1>
			<h2>What would you like to do?</h2>
		</div>
		<center>
			<div style="width: 50%">
				<form method="post">
					<div>
						<?php
							if(!empty($message)){
								echo "<span class=error>".$message."</span><br><br>";
							}
						?>
						<span class="error">* required field</span><br>
						
						<label class="form"><b>Username</b></label>
							<span class="error">*</span>
							<input type="text" name="username01" required minlength="3"/>
							<span class="error"><?php echo $usernameErr."<br>"; ?></span>

						<label class="form"><b>Password</b></label>
							<span class="error">*</span>
							<input type="password" name="password" placeholder="6-10 letters and digits" required minlength="6" maxlength="10"/>
							<span class="error"><?php echo $passwordErr."<br>"; ?></span>

						<label class="form"><b>Student</b></label>
							<input type="radio" name="option" value="students" required />
						
						<label class="form"><b>Admin</b></label>
							<input type="radio" name="option" value="admin" required />

						<span class="error">*</span>
						<span class="error"><?php echo $optionErr."<br>"; ?></span>

						<div class="clearfix">
						<br>
							<button type="submit" class="submitbtn">Login</button>
							<button type="button" onclick="goBack()" class="closebtn">Return</button>
						</div>
					</div>
				</form>
			</div>
		</center>
		<div align="right">
			<br><br>&copy; Kleyton Soares - 2016144
		</div>
	</body>
</html>