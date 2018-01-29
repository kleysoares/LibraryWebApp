<div id="id05" class="modal animate-zoom">
	<span onclick="document.getElementById('id05').style.display='none'" class="close" title="Close window">×</span>
		<div class="container">
			<h1>ADD A NEW USER</h1>								
			<br>
			<table style="width: 100%">
				<tr>
					<td>
						<button onclick="document.getElementById('id09').style.display='block'" class="button" title="Register a new student.">New Student</button>
							<?php include("admin_new_student.php"); ?>
					</td>
					<td align="right">
						<button onclick="document.getElementById('id10').style.display='block'" class="button" title="Register a new admin.">New Admin</button>
							<?php include("admin_new_admin.php"); ?>
					</td>
				</tr>
			</table>
		</div>
</div>
