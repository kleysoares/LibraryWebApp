<!DOCTYPE>
<html  lang="en-UK">
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
								echo "Today is ".date("d/m/Y").".";
							}
						?>
					</td>
					<td align="right" style="width:60%; padding:0px 0px 0px 30px"> <!--padding: top right bottom left-->
						<a href="admin_home.php">
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
						<?php include("admin_search_books.php"); ?>
					</td>
					<td align="right">
						<button onclick="document.getElementById('id02').style.display='block'" class="button" title="Books past their due dates">Books Past Due Date</button>
						<?php include("admin_late_books.php"); ?>
					</td>
				</tr>
				<tr>
					<td>
						<button onclick="document.getElementById('id03').style.display='block'" class="button" title="Add a new Book">Add a New Book</button>
						<?php include("admin_add_books.php"); ?>
					</td>
					<td align="right">
						<button onclick="document.getElementById('id04').style.display='block'" class="button" title="View checked-out books">View Checked-out Books</button>
						<?php include("admin_view_books_out.php"); ?>
					</td>					
				</tr>
				<tr>
					<td>
						<button onclick="document.getElementById('id05').style.display='block'" class="button" title="Add a new user">Add a New User</button>
						<?php include("admin_new_user.php"); ?>
					</td>
					<td align="right">
						<button onclick="document.getElementById('id06').style.display='block'" class="button" title="Log out of the system">Log Out</button>
						<?php include("admin_log_out.php"); ?>
					</td>
				</tr>
			</table>
		</div>