<?php
	$title = "";
	
	if(isset($_GET["title"])) {
		if($_GET) {
			$title = $_GET["title"];
			$title = "%".$title."%";

			if(!empty($title)) {
				include("../connector.php");
				$sql = "SELECT * FROM books WHERE title LIKE ?;";
				$stmt = $conn->prepare($sql);
				$stmt-> bindParam(1, $title);
				$stmt-> execute();

				include("../errordb.php");
				
				$rows = $stmt->fetch(PDO::FETCH_ASSOC);
				//$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
				foreach($rows as $row) {
					$_SESSION['id'] = $rows['id'];
					$_SESSION['title'] = $rows['title'];
					$_SESSION['author'] = $rows['author'];
					$_SESSION['isbn'] =  $rows['isbn'];
					$_SESSION['status'] = $rows['status'];
				}
			}
		}
	}
?>
<div id="id01" class="modal animate-zoom">
	<form class="modal-content animate" action="student_search_result.php" method="get">
		<div class="container">
			<h1>SEARCH FOR BOOKS</h1>
			<label class="form"><b>By Title</b></label>
			<input type="text" name="title">
			<div class="clearfix">
			<br>
				<button type="submit" class="submitbtn">Search</button>
				<button type="button" onclick="document.getElementById('id01').style.display='none'" class="closebtn">Close</button>
			</div>
		</div>
	</form>
</div>