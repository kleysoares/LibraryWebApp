<?php
	include("../connector.php");
	
	$out = new DateTime('today'); //new date object of today's 
	$outstr = $out -> format('Y-m-d'); //convert date to string
	$duestr = date('Y-m-d', strtotime('+ 7 days')); //add 7 days
	$week = new Datetime($duestr); //create date object from string

	$sql = "SELECT DISTINCT s.id, t.duedate, b.title, b.author, b.isbn FROM students s
			JOIN transaction t ON s.id = t.sid
			JOIN books b ON b.id = t.bid
			WHERE t.backin = 'OUT'
			AND t.duedate < ?";
	$stmt = $conn->prepare($sql);
	$stmt -> bindParam(1, $outstr);
	$stmt -> execute();
	//echo $duestr;

	include("../errordb.php");

	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

	function overdueBooks() {
		global $rows;
		global $days;
		global $week;

		foreach($rows as $row){

			if($row['duedate'] < $week) {
				echo "<tr align='center'>";
				echo "<td>";
					echo $row['id'];
				echo "</td>";

				echo "<td align='left'>";
					echo $row['duedate'];
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

				echo "</tr>";
			}
		}
	}
?>
<div id="id02" class="modal animate-zoom">
	<span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close window">×</span>
		<form class="modal-content animate" action="admin_check_book_in.php" method="get">
			<div class="container" align="left">				
			<h1>VIEW LATE BOOKS</h1>
			<br>
				<table align='center' cellpadding='10'>
					<tr>
						<th style='width: 70px'>Student ID</th>
						<th style='width: 120px'>Due Date</th>
						<th style='width: 200px'>Title</th>
						<th style='width: 200px'>Author</th>
						<th style='width: 120px'>ISBN</th>
					</tr>
					<?php overdueBooks(); ?>
				</table>					
				<div class="clearfix">
					<br>
					<button type="button" onclick="document.getElementById('id02').style.display='none'" class="closebtn">Close</button>
				</div>
			</div>
		</form>
</div>