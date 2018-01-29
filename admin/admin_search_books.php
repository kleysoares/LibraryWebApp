<?php
	include("../connector.php");
	
	$sql = "SELECT * FROM books;";
	$stmt = $conn->prepare($sql);
	$stmt-> execute();
	
	include("../errordb.php");
	
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	function books() {
		global $rows;

		foreach($rows as $row){
			echo "<tr align='center'>";
				echo "<td>";
					echo $row['id'];
				echo "</td>";

				echo "<td align='left'>";
					echo $row['title'];
				echo "</td>";

				echo "<td align='left'>";
					echo $row['author'];
				echo "</td>";
							
				echo "<td align='left'>";
					echo $row['isbn'];
				echo "</td>";
							
				echo "<td align='center'>";
					echo $row['status'];
				echo "</td>";							
			echo "</tr>";
		}
	}
?>
<div id="id01" class="modal animate-zoom">
	<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close window">×</span>
		<form class="modal-content animate" action="admin_update_books.php" method="get">
			<div class="container">
				<h1>SEARCH FOR BOOKS</h1>
				<table align='center' cellpadding='10'>
					<tr>
						<th style='width: 70px'>ID</th>
						<th style='width: 200px'>Title</th>
						<th style='width: 200px'>Author</th>
						<th style='width: 120px'>ISBN</th>
						<th style='width: 70px'>Status</th>
					</tr>
						<?php echo books(); ?>
				</table>
				<div class="clearfix">
					<br>
					<button type="button" align="center" onclick="document.getElementById('id01').style.display='none'" class="closebtn">Close</button>
				</div>
			</div>
		</form>
</div>