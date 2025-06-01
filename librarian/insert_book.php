<?php
	require "../db_connect.php";
	require "../message_display.php";
	require "verify_librarian.php";
	require "header_librarian.php";
?>

<html>
	<head>
	<style>
			.butn{
				cursor: pointer;
				padding: 13px 15px;
				margin-left: 38%;
				background-color:transparent !important;
				border: 1px groove whitesmoke !important;
				color: whitesmoke !important;
			}
			.cd-select icon{
				background-color:transparent !important;
			}
			.butn:hover{
			font-weight: bold;
			transition: 0.5s ease-in-out !important;
			box-shadow: 0px 0px 50px 10px cyan ,inset 120px 0px 0px 0px cyan !important;
			color:black !important;
			}
		</style>
		<title>LMS</title>
		<link rel="stylesheet" type="text/css" href="../css/global_styles.css" />
		<link rel="stylesheet" type="text/css" href="../css/for1.css" />
		<link rel="stylesheet" href="css/insert_book_style.css">
	</head>
	<body>
	<form class="cd-form" method="POST" action="#">
			<center><legend>Add New Book Details</legend></center>
			
				<div class="error-message" id="error-message">
					<p id="error"></p>
				</div>
				
				<div class="icon" style="margin-left: 12%; width: 100%; ">
					<input class="b-isbn" id="b_isbn" type="number" name="b_isbn" placeholder="S.No" required />
				</div>
				
				<div class="icon" style="margin-left: 12%; width: 100%; ">
					<input class="b-title" type="text" name="b_title" placeholder="Book Title" required />
				</div>
				
				<div class="icon" style="margin-left: 12%; width: 100%; ">
					<input class="b-author" type="text" name="b_author" placeholder="Author Name" required />
				</div>
				
				<div>
				<h4 style="margin-left: 12%; width: 100%; ">Category</h4>
				<p class="cd-select icon" style="margin-left: 12%; width: 100%; background:" >
						<select class="b-category" name="b_category">
							<option  style="background-color:black;">History</option>
							<option style="background-color:black;">Comics</option>
							<option style="background-color:black;">Fiction</option>
							<option style="background-color:black;">Non-Fiction</option>
							<option style="background-color:black;">Biography</option>
							<option style="background-color:black;">Medical</option>
							<option style="background-color:black;">Fantasy</option>
							<option style="background-color:black;">Education</option>
							<option style="background-color:black;">Sports</option>
							<option style="background-color:black;">Technology</option>
							<option style="background-color:black;">Literature</option>
						</select>
					</p>
				</div>
				
				
				<div class="icon">
					<input class="b-price" type="number" name="b_price" placeholder="Price" required style="margin-left: 12%; width: 75%;"/>
				</div>
				
				<div class="icon" >
					<input class="b-copies" type="number" name="b_copies" placeholder="Number of Copies" required style="margin-left: 12%; width: 75%;"/>
				</div>
				
				<br />
				<input type="submit" class="butn" name="b_add" value="Add book" />
		</form>
	<body>
	
	<?php
		if(isset($_POST['b_add']))
		{
			$query = $con->prepare("SELECT isbn FROM book WHERE isbn = ?;");
			$query->bind_param("s", $_POST['b_isbn']);
			$query->execute();
			
			if(mysqli_num_rows($query->get_result()) != 0)
				echo error_with_field("A book with that ISBN already exists", "b_isbn");
			else
			{
				$query = $con->prepare("INSERT INTO book VALUES(?, ?, ?, ?, ?, ?);");
				$query->bind_param("ssssdd", $_POST['b_isbn'], $_POST['b_title'], $_POST['b_author'], $_POST['b_category'], $_POST['b_price'], $_POST['b_copies']);
				
				if(!$query->execute())
					die(error_without_field("ERROR: Couldn't add book"));
				echo success("New book record has been added");
			}
		}
	?>
</html>