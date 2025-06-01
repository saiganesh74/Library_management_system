<?php
	require "../db_connect.php";
	require "../message_display.php";
	require "../verify_logged_out.php";
	require "../header.php"; 
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
			.butn:hover{
			font-weight: bold;
			transition: 0.5s ease-in-out !important;
            box-shadow: inset 100px 0px 0px 0px cyan !important;
			box-shadow: 0px 0px 50px 10px cyan ,inset 100px 0px 0px 0px cyan !important;
			color:black !important;
			}
			body{
				background: black !important;
			}
			.box{
				background-color: black !important;
				height: 40% !important;
				box-shadow: 0px 0px 8px 2px cyan;
				border: 1px ridge cyan !important;
				overflow:scroll !important;
				overflow-x:hidden !important;
			}
			::-webkit-scrollbar{
				background-color:transparent !important;
			}
		</style>
		<title>LMS</title>
		<link rel="stylesheet" type="text/css" href="../css/global_styles.css">
		<link rel="stylesheet" type="text/css" href="../css/newstyle.css">
		<link rel="stylesheet" type="text/css" href="css/index_style.css">
		<link rel="website icon" type="jpg" href="img.jpg">
	</head>
	<body oncontextmenu="return false">
		<form class="cd-form" method="POST" action="#">
		<div class="box">
		<center><legend class="mem">Member Login</legend></center>
			
			<div class="error-message" id="error-message">
				<p id="error"></p>
			</div>
			<center>
			<div class="icon">
				<input class="m-user" type="text" name="m_user" placeholder="Username" required />
			</div>
			
			<div class="icon">
				<input class="m-pass" type="password" name="m_pass" placeholder="Password" required />
			</div>
			</center>
			<input type="submit" value="Login" class="butn" name="m_login"/>
			
			<br /><br /><br /><br />
			</div>
			<p align="center">Don't have an account?&nbsp;<a href="register.php" style="text-decoration: underline red; color:#d83b3b; font-weight:bold; ">Register Now!</a>

			<p align="center"><a href="../index.php" style="text-decoration:none;color:#94aab0;"; >Go Back</a>
		</form>
	</body>
	
	<?php
		if(isset($_POST['m_login']))
		{
			$query = $con->prepare("SELECT id, balance FROM member WHERE username = ? AND password = ?;");
			$query->bind_param("ss", $_POST['m_user'], $_POST['m_pass']);
			$query->execute();
			$result = $query->get_result();
			if(mysqli_num_rows($result) != 1)
				echo error_without_field("Invalid details or Account has not been activated yet!");
			else 
			{
				$resultRow = mysqli_fetch_array($result);
				$balance = $resultRow[1];
			if($balance < 0){
				echo error_without_field("Your account has been suspended. Please contact librarian for further information!");
			} else {
					$_SESSION['type'] = "member";
					$_SESSION['id'] = $resultRow[0];
					$_SESSION['username'] = $_POST['m_user'];
					header('Location: home.php');
				}
			}
		}
	?>
</html>