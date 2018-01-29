<script>
	function goBack() {
		window.history.back();
	}
</script>

<?php
	session_start();

	include("admin_header.php");
	
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
	}

	$message = "";
	if($_POST) {
		
		$bid = $_POST['bid'];
		
		include("../connector.php");
		
		$sql = "UPDATE books SET status = 'IN' WHERE id = ?;";
		$stmt = $conn->prepare($sql);
		$stmt -> bindParam(1, $bid);
		$stmt -> execute();
		
		$sql2 = "UPDATE transaction SET backin = 'IN' WHERE bid = ?;";
		$stmt2 = $conn->prepare($sql2);
		$stmt2 -> bindParam(1, $bid);
		$stmt2 -> execute();
		
		include("../errordb.php");
		
		$message = "You have just checked in the book below successfully.";
	}
?>
<h1>You are about to check this book back in:</h1>
<table align='center' cellpadding='10'>
	<tr>
		<th style='width: 80px'>ID</th>
		<th style='width: 200px'>Title</th>
		<th style='width: 200px'>Author</th>
		<th style='width: 120px'>ISBN</th>
	</tr>
	<tr align='center'>
	
<?php
	echo "<td align='left'>";
		echo $id;
	echo "</td>";
	echo "<td align='left'>";
		echo $title;
	echo "</td>";
							
	echo "<td align='left'>";
		echo $author;
	echo "</td>";
							
	echo "<td align='left'>";
		echo $isbn;
	echo "</td>";
?>
	</tr>
	<tr>
		<center>
			<span class="error"><?php echo $message."<br>"."<br>"; ?></span>
		</center>
	</tr>
	</table>
	<br>
	<div>
		<table align="center" style='width: 70%'>
			<td>
				<form method="post">
					<input type="hidden" name="bid" value="<?php echo $bid; ?>"/>
						<button type="submit" class="closebtn">Confirm</button>
						<a href="admin_home.php">
							<button type="button" class="submitbtn">Return</button>
						</a>
				</form>
			</td>
		</table>
	</div>
<?php
	include("admin_footer.php");
?>