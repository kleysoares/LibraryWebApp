<?php
	session_start(); //this session is necessary for displaying student's information on the top left corner.

	include("student_header.php");
	
	if($_GET) {
		$bid = $_GET['id'];
		
		include("../connector.php");
		
		$sql = "SELECT * FROM books WHERE id = :id;";
		$stmt = $conn -> prepare($sql);
		$stmt -> bindValue(":id", $bid);
		$stmt -> execute();
		
		include("../errordb.php");
		
		$row = $stmt -> fetch(PDO::FETCH_ASSOC);
		$id = $row['id'];
		$title = $row['title'];
		$author = $row['author'];
		$isbn = $row['isbn'];
		$status = $row['status'];
	}
	
	$message = "";
	if($_POST) {
		$bid = $_POST['bid'];
		
		include("../connector.php");
		
		$sql = "UPDATE books SET status = 'OUT' WHERE id = ?;";
		$stmt = $conn->prepare($sql);
		$stmt -> bindParam(1, $bid);
		$stmt -> execute();

		$out = new DateTime('today'); //new date object of today's date`
		$outstr = $out -> format('Y-m-d'); //convert date to string
		$duestr = date('Y-m-d', strtotime('+ 7 days'));

		$sql2 = "INSERT INTO transaction (`sid`, `bid`, `out`, `duedate`, `backin`) VALUES (?, ?, ?, ?, 'OUT');";
		$stmt2 = $conn->prepare($sql2);
		$stmt2 -> bindParam(1, $_SESSION["sid"]);
		$stmt2 -> bindParam(2, $bid);
		$stmt2 -> bindParam(3, $outstr);
		$stmt2 -> bindParam(4, $duestr);
		$stmt2 -> execute();
		
		include("../errordb.php");
		
		$message = "You've just borrowed the book above. Return date is on ".$duestr.".";
	}
?>
<h1>You are about to check this book out:</h1>
	<table align='center' cellpadding='10'>
		<tr>
			<th style='width: 80px'>ID</th>
			<th style='width: 200px'>Title</th>
			<th style='width: 200px'>Author</th>
			<th style='width: 120px'>ISBN</th>
		</tr>
		<tr align='center'>
	
<?php
	echo "<td align='center`'>";
		echo $id;
	echo "</td>";

	echo "<td align='left'>";
		echo $title;
	echo "</td>";

	echo "<td align='left'>";
		echo $author;
	echo "</td>";

	echo "<td align='center'>";
		echo $isbn;
	echo "</td>";
?>
		</tr>
	</table>
	<br>
	<div>
		<table align="center" style='width: 70%'>
			<tr>
				<center>
					<span class="error"><?php echo $message."<br>"."<br>"; ?></span>
				</center>
			</tr>
			<tr>
				<td>
					<form method="post">
						<input type="hidden" name="bid" value="<?php echo $bid; ?>"/>
						<button type="submit" class="closebtn">Confirm</button>
						<a href="student_home.php">
							<button type="button" class="submitbtn">Return</button>
						</a>
					</form>
				</td>
			</tr>
		</table>
	</div>
<?php
	include("student_footer.php");
?>