<?php
	$titleErr = "";
	$title = "";
	$authorErr = "";
	$author = "";
	$isbnErr = "";
	$isbn = "";
	
	if(isset($_POST["title03"])) {
		if($_POST) { //returns the request method used to access the page
			$title = $_POST["title03"];
			$author = $_POST["author"];
			$isbn = $_POST["isbn"];
		
			//validating title
			if (empty($title))
				$titleErr = "Title is required.";
			else
				$titleErr = "";

			//validating author
			if (empty($author))
			$authorErr = "Author is required.";
			else
				$authorErr = "";
				
			//validating isbn
			if (empty($isbn))
				$isbnErr = "ISBN is required.";
			else if (!preg_match("/^[0-9]{10}$/", $isbn))
				$isbnErr = "Limit of 10 digits. No whitespaces and characters allowed.";
			else
				$isbnErr = "";
		  
			//if no errors occur, data will be inserted
			if (empty($titleErr) && empty($authorErr) && empty($isbnErr)) {
				
				include("../connector.php");

				//command to insert data
				$sql = "INSERT INTO books (title, author, isbn, status) VALUES (?, ?, ?, 'IN');";
				$sth = $conn->prepare($sql);
				$sth->bindParam(1, $title);
				$sth->bindParam(2, $author);
				$sth->bindParam(3, $isbn);
				$sth->execute();

				exit();
			}
		}
	}
?>
<div id="id03" class="modal animate-zoom">
	<form class="modal-content animate" action="admin_home.php" method="post">
		<div class="container" align="left">
			<h1>ADD A NEW BOOK</h1>
			<span class="error">* required field</span><br>
					
			<label class="form"><b>Title</b></label>
				<span class="error">*</span>
				<input type="text" name="title03" required />
				<span class="error"><?php echo $titleErr."<br>"; ?></span>

			<label class="form"><b>Author</b></label>
				<span class="error">*</span>
				<input type="text" name="author" required />
				<span class="error"><?php echo $authorErr."<br>"; ?></span>

			<label class="form"><b>ISBN</b></label>
				<span class="error">*</span>
				<input type="text" placeholder="Numbers only" name="isbn" required minlength='10' maxlength='10'/>
				<span class="error"><?php echo $isbnErr."<br>"; ?></span>
						
			<div class="clearfix">
				<br>
				<button type="submit" class="submitbtn">Submit</button>
				<button type="button" onclick="document.getElementById('id03').style.display='none'" class="closebtn">Close</button>
			</div>
		</div>
	</form>
</div>