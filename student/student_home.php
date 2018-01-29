<?php
	session_start();
	
	//refreshing page so all the functions may work smoothly.
	if($_POST) {
		echo "<meta http-equiv='refresh' content='1'>";
	}
	
	include("student_header.php");
 
	include("student_footer.php");
?>