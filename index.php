<?php
	require "db_connect.php";
	require "header.php";
	session_start();
	
	if(empty($_SESSION['type']));
	else if(strcmp($_SESSION['type'], "librarian") == 0)
		header("Location: librarian/home.php");
	else if(strcmp($_SESSION['type'], "member") == 0)
		header("Location: member/home.php");
?>

<html>
	<head>
		<style>
			body{
				background: grey !important;
				animation: animate 2s linear infinite;
			}
            #allTheThings{
				border: 1px groove transparent !important;
				border-radius: 4px !important;
				height: 35% !important;
				width: 5600px !important;
				backdrop-filter: blur(10px);
			}
			.stu{
				color: black;
				font-family: copperplate gothic;
				font-weight: bold;
			}
			.mem{
				color: black!important;
			}
		</style>
		<title>LMS</title>
		<link rel="stylesheet" type="text/css" href="css/index_style.css"/>
		<link rel="stylesheet" type="text/css" href="css/newstyle.css ">
	</head>
	<body oncontextmenu="return false">

		<div id="allTheThings">
			<div id="member" style=" filter: drop-shadow(10px 10px 10px black);">
				<a href="member">
					<img src="img/ic_membership.svg" width="250px" height="auto"/><br/>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<div class="stu">Student Login</div>
				</a>
			</div>
			<div id="verticalLine">
				<div id="librarian" style="filter: drop-shadow(10px 10px 7px black);">
					<a id="librarian-link" href="librarian">
						<img src="img/ic_librarian2.svg" width="250px" height="220"/><br/>
						&nbsp;&nbsp;&nbsp;
						<div class="mem">Librarian Login</div>
				

				</div>
			</div>	
		</div>

	</body>
</html>