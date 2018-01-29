<?php
	if(isset($_POST["logout"])) {
		if($_POST) {
			//remove all session variables
			session_unset();

			//destroy the session
			session_destroy();

			header("Location: ../index.php");
			exit();
		}
	}
?>
<div id="id04" class="modal animate-zoom">
	<form class="modal-content animate" action="../index.php" method="post">
		<div class="container" align="left">
			<h1>Are you sure you want to exit?</h1>
					
			<div class="clearfix">
				<br>
				<button type="submit" class="submitbtn" name="logout">YES</button>
				<button type="button" onclick="document.getElementById('id04').style.display='none'" class="closebtn">NO</button>
			</div>
		</div>
	</form>
</div>