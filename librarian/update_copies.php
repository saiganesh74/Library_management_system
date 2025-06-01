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
				margin-left: 35%;
				background-color:transparent !important;
				border: 1px groove whitesmoke !important;
				color: whitesmoke !important;
			}
			.butn:hover{
			font-weight: bold;
			transition: 0.5s ease-in-out !important;
			box-shadow: 0px 0px 50px 10px cyan ,inset 200px 0px 0px 0px cyan !important;
			color:black !important;
			}
		</style>
		<title>LMS</title>
		<link rel="stylesheet" type="text/css" href="../css/global_styles.css" />
		<link rel="stylesheet" type="text/css" href="../css/for1.css" />
		<link rel="stylesheet" href="css/update_copies_style.css">
	</head>
	<body>
	<form class="cd-form" method="POST" action="#">
			<center><legend>Update Book Copies</legend></center>
			
				<div class="error-message" id="error-message">
					<p id="error"></p>
				</div>
				
				<center><div class="icon">
					<input class="b-isbn" type='text' name='b_isbn' id="b_isbn" placeholder="Book ISBN" required />
				</div></center>
					
				<center><div class="icon">
					<input class="b-copies" type="number" name="b_copies" placeholder="Copies to add" required />
				</div></center>
						
				<input type="submit" class="butn" name="b_add" value="Update Book Copies" />
		</form>
	</body>
	
	<?php
		if(isset($_POST['b_add']))
		{
			$query = $con->prepare("SELECT isbn FROM book WHERE isbn = ?;");
			$query->bind_param("s", $_POST['b_isbn']);
			$query->execute();
			if(mysqli_num_rows($query->get_result()) != 1)
				echo error_with_field("Invalid ISBN", "b_isbn");
			else
			{
				$query = $con->prepare("UPDATE book SET copies = copies + ? WHERE isbn = ?;");
				$query->bind_param("ds", $_POST['b_copies'], $_POST['b_isbn']);
				if(!$query->execute())
					die(error_without_field("ERROR: Couldn\'t update book copies"));
				echo success("Number of book copies has been updated");
			}
		}
	?>
</html>