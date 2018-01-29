<!DOCTYPE>
<html>
	<head>
		<link rel="stylesheet" href="../style.css">
		<title>CCT Online Library Administrator Page</title>
	</head>
	<body>
		<div>
			<table style="width:100%">
				<tr>
					<td style="width:50%">
						<?php
							if(isset($_SESSION["username"])) {
								echo "Welcome, ".$_SESSION["username"]."!<br>";
								echo "Student ID: ".$_SESSION["sid"].".<br>";
								echo "Today is ".date("d/m/Y").".";
							}
						?>
					</td>
					<td align="right" style="width:60%; padding:0px 0px 0px 30px">
						<a href="student_home.php">
							<img class="image" src="../CCT_Logo.jpg" alt="College Logo" style="width: 120px">
						</a>
					</td>
				</tr>
			</table>
		</div>		
		<br>
		<div>
			<table style="width:100%">
				<tr>
					<td>
						<button onclick="document.getElementById('id01').style.display='block'" class="button" title="Search for books">Search Books</button>
						<?php include("student_search_books.php"); ?>
					</td>
					<td align="right">
						<button onclick="document.getElementById('id02').style.display='block'" class="button" title="Books past their due dates">Send us a Message</button>
						<?php include("student_send_message.php"); ?>
					</td>
				</tr>
				<tr>
					<td>
						<button onclick="document.getElementById('id03').style.display='block'" class="button" title="Add a new Book">View Checked-out Books</button>
						<?php include("student_view_books_out.php"); ?>
					</td>
					<td align="right">
						<button onclick="document.getElementById('id04').style.display='block'" class="button" title="View checked-out books">Log Out</button>
						<?php include("student_log_out.php"); ?>
					</td>					
				</tr>
			</table>
		</div>
		<br>
		<br>
		<br>