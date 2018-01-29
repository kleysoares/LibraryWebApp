<?php
	session_start();
	
	//refreshing page so all the functions may work smoothly.
	if($_POST) {
		echo "<meta http-equiv='refresh' content='1'>";
	}
	
	include("admin_header.php");
	
	include("admin_footer.php");
?>
