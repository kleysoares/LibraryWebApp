<?php
	include("../connector.php");
	
	$sql = "SELECT DISTINCT title, author, isbn, duedate FROM books b
			INNER JOIN transaction t
			ON b.id = t.bid
			AND t.backin = 'OUT'
			WHERE t.sid = ?";
	$stmt = $conn->prepare($sql);
	$stmt -> bindParam(1, $_SESSION["sid"]);
	$stmt -> execute();
	
	include("../errordb.php");
	
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	function books() {
		global $rows;

		foreach($rows as $row){
			echo "<tr align='left'>";
				echo "<td>";
					echo $row['title'];
				echo "</td>";

				echo "<td align='left'>";
					echo $row['author'];
				echo "</td>";

				echo "<td align='center'>";
					echo $row['isbn'];
				echo "</td>";

				echo "<td align='center'>";
					echo $row['duedate'];
				echo "</td>";							
			echo "</tr>";
		}
	}
?>
<div id="id03" class="modal animate-zoom">
	<span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close window">×</span>
		<form class="modal-content animate">
			<div class="container" align="left">
				<h1>VIEW YOUR CHECKED-OUT BOOKS</h1>
				<br>
				<table align='center' cellpadding='10'>
					<tr>
						<th style='width: 200px'>Title</th>
						<th style='width: 200px'>Author</th>
						<th style='width: 120px'>ISBN</th>
						<th style='width: 120px'>Due Date</th>
					</tr>
					<?php echo books(); ?>
				</table>
				<div class="clearfix">
					<br>
					<button type="button" align="left" onclick="document.getElementById('id03').style.display='none'" class="closebtn">Close</button>
				</div>
			</div>
		</form>
</div>