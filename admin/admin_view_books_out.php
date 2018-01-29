<?php
	include("../connector.php");

	$sql = "SELECT s.id, b.title, b.author, b.isbn FROM books b
			JOIN transaction t ON b.id = t.bid
			JOIN students s ON s.id = t.sid
			WHERE t.backin = 'OUT'";
	//"SELECT * FROM books WHERE status = 'OUT';";
	$stmt = $conn->prepare($sql);
	$stmt-> execute();

	include("../errordb.php");

	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

	function booksOut() {
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
					echo "<a href=admin_check_book_in.php?id=".$row['id'];
					echo "<button class='outbtn nobtn' type='submit' name='id'>Check it back in</button>";
					echo "</a>";
			echo "</td>";
			echo "</tr>";
		}
	}
?>
<div id="id04" class="modal animate-zoom">
	<span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close window">×</span>
		<form class="modal-content animate" action="admin_check_book_in.php" method="get">
			<div class="container" align="left">				
			<h1>VIEW CHECKED-OUT BOOKS</h1>
			<br>
				<table align='center' cellpadding='10'>
					<tr>
						<th style='width: 70px'>Student ID</th>
						<th style='width: 200px'>Title</th>
						<th style='width: 200px'>Author</th>
						<th style='width: 120px'>ISBN</th>
					</tr>
					<?php booksOut(); ?>
				</table>					
				<div class="clearfix">
					<br>
					<button type="button" onclick="document.getElementById('id04').style.display='none'" class="closebtn">Close</button>
				</div>
			</div>
		</form>
</div>