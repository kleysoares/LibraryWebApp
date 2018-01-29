<?php
	$usernameErr = "";
	$username = "";
	$passwordErr = "";
	$password = "";
	
	if(isset($_POST["username10"])) {
		if($_POST){ //returns the request method used to access the page
			$username = $_POST["username10"];
			$password = $_POST["password"];
		
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
	  
			//if no errors occur, data will be inserted
			if (empty($usernameErr) && empty($passwordErr)) {
				include("../connector.php");

				$sql1 = "SELECT id FROM admin WHERE id = ?;"; //checking duplicate id
				$checkID = $conn->prepare($sql1);
				$checkID -> bindParam(1, $id);
				$checkID -> execute();
				
				$sql2 = "SELECT username FROM admin WHERE username = ?;"; //checking duplicate username
				$checkUser = $conn->prepare($sql2);
				$checkUser -> bindParam(1, $username);
				$checkUser -> execute();
				
				if($checkID -> rowCount() == 0 && $checkUser -> rowCount() == 0) {
					$phash = password_hash($password, PASSWORD_BCRYPT); //hashing password

					$sql3 = "INSERT INTO admin (username, password) VALUES (?, ?);"; //command to insert data
					$sth = $conn->prepare($sql3);
					$sth->bindParam(1, $username);
					$sth->bindParam(2, $phash);
					$sth->execute();
			
					//header('Location: admin_home.php');
					exit();
				} else
					$message = "Username already taken!";
			}
		}
	}
?>
<div id="id10" class="modal animate-zoom">
	<form class="modal-content animate" action="admin_home.php" method="post">
		<div class="container" align="left">
			<h1>ADD A NEW ADMIN</h1>
			<span class="error">* required field</span><br>

			<label class="form"><b>Username</b></label>
			<span class="error">*</span>
			<input type="text" name="username10" required minlength="3"/>
			<span class="error"><?php echo $usernameErr."<br>"; ?></span>

			<label class="form"><b>Password</b></label>
			<span class="error">*</span>
			<input type="password" name="password" placeholder="6-10 characters"required minlength="6" maxlength="10"/>
			<span class="error"><?php echo $passwordErr."<br>"; ?></span>

			<div class="clearfix">
			<br>
				<button type="submit" class="submitbtn" onclick="submitform()">Submit</button>
				<button type="button" onclick="document.getElementById('id10').style.display='none'" class="closebtn">Close</button>
			</div>
		</div>
	</form>
</div>