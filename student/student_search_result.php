<?php
	session_start(); //this session is necessary for displaying student's information on the top left corner.
	
	include("student_header.php");
?>
<h1>SEARCH RESULT</h1>
	<table align='center' cellpadding='10'>
	<tr>
		<th style='width: 70px'>ID</th>
		<th style='width: 200px'>Title</th>
		<th style='width: 200px'>Author</th>
		<th style='width: 120px'>ISBN</th>
		<th style='width: 70px'>Status</th>
	</tr>
<?php
	//foreach($rows as $row){
		echo "<tr align='center'>";
			echo "<td>";
				echo $_SESSION['id'];
			echo "</td>";

			echo "<td align='left'>";
				echo $_SESSION['title'];
			echo "</td>";

			echo "<td align='left'>";
				echo $_SESSION['author'];
			echo "</td>";

			echo "<td align='center'>";
				echo $_SESSION['isbn'];
			echo "</td>";

			echo "<td align='center'>";
				echo $_SESSION['status'];
			echo "</td>";

			echo "<td align='center'>";
				echo "<input type='hidden' name='".$_SESSION['id']."'>";
				echo "<a href=student_check_book_out.php?id=".$_SESSION['id'].">";	
				echo "<button class='outbtn nobtn' type='submit' name='id' formmethod='post'";
					if($_SESSION['status'] == 'OUT'){
													echo "disabled"; 
													} 
					echo ">Check out</button>";
				echo "</a>";
			echo "</td>";
		echo "</tr>";
	//}

	echo "</table>";

	include("student_footer.php");
?>