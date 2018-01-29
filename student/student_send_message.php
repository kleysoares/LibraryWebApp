<?php
	//This is just an extra page so the number of buttons on the header is even.
?>
<div id="id02" class="modal animate-zoom">
	<form class="modal-content animate" action="student_home.php" method="post">
		<div class="container" align="left">			
			<label class="form"><b>Message</b></label>
			<input type="text" rows="5" name="message" placeholder="Enter message here..." required>
			
			<div class="clearfix">
			<br>
				<button type="submit" class="submitbtn">Send</button>
				<button type="button" onclick="document.getElementById('id02').style.display='none'" class="closebtn">Close</button>
			</div>
		</div>
	</form>
</div>
