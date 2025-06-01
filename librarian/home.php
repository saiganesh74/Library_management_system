<?php
	require "../db_connect.php";
	require "verify_librarian.php";
	require "header_librarian.php";
?>

<html>
	<head>
		<title>LMS</title>
		<link rel="stylesheet" type="text/css" href="css/home_style.css" />
	</head>
	<body  style="background-color:rgba(0, 0, 0, 0.855);">
		<div id="allTheThings">
			
			<a href="insert_book.php">
				<input type="button" value="Insert New Book Record"  style="background-color:aquamarine; color:black;" value="Insert New Book Record" />
			</a><br />

			<a href="update_copies.php">
				<input type="button" value="Update Copies of a Book" style="background-color:aquamarine; color:black;" value="Insert New Book Record"  />
			</a><br />

			<a href="delete_book.php">
				<input type="button" value="Delete Book Records" style="background-color:aquamarine; color:black;" value="Insert New Book Record"  />
			</a><br />

			<a href="display_books.php">
				<input type="button" value="Display Available Books" style="background-color:aquamarine; color:black;" value="Insert New Book Record"  />
			</a><br />

			<a href="pending_book_requests.php">
				<input type="button" value="Manage Pending Book Requests" style="background-color:aquamarine; color:black;" value="Insert New Book Record"  />
			</a><br />

			<a href="pending_registrations.php">
				<input type="button" value="Manage Pending Membership Registrations" style="background-color:aquamarine; color:black;" value="Insert New Book Record"  />
			</a><br />

			<a href="update_balance.php">
				<input type="button" value="Update Balance of Members"  style="background-color:aquamarine; color:black;" value="Insert New Book Record" />
			</a><br />

			<a href="due_handler.php">
				<input type="button" value="Today's Reminder" style="background-color:aquamarine; color:black;" value="Insert New Book Record"  />
			</a><br /><br />

		</div>
	</body>
</html>