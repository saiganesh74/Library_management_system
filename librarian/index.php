<?php
	require "../db_connect.php";
	require "../message_display.php";
	require "../verify_logged_out.php";
	require "../header.php";
	

	if(isset($_POST['l_login']))
	{
		$lname=$_POST['l_user'];
$lpass=$_POST['l_pass'];
$sql=mysqli_query($con,"SELECT * FROM librarian WHERE username = '$lname' AND password ='$lpass' ;");


		if(mysqli_num_rows($sql) == 1){
			$_SESSION['type'] = "librarian";
			$_SESSION['id'] = mysqli_fetch_array($sql)[0];
			$_SESSION['username'] = $_POST['l_user'];
			header('Location: home.php');
		
	}
	else
		{
			?>
			<script style="accent-color:red;">
				alert("Incorrect details");
				</script>
			<?php
		}
	}
?>

<html>
	<head>
		<style>
			body{
				background-color:black !important;
			}
			.butn{
				margin-left: 38%;
				background-color:transparent !important;
				border: 1px groove whitesmoke !important;
				color: whitesmoke !important;
			}
			.butn:hover{
			transition: 0.5s ease-in-out !important;
            box-shadow: inset 100px 0px 0px 0px cyan !important;
			box-shadow: 0px 0px 50px 10px cyan ,inset 100px 0px 0px 0px cyan !important;
			color:black !important;
			}
			.box{
				background-color: black !important;
				height: 40% !important;
				box-shadow: 0px 0px 8px 2px cyan;
				border: 1px ridge cyan !important;
				overflow: scroll !important;
				overflow-x: hidden !important;
			}
			::-webkit-scrollbar{
				background-color: transparent !important;
			}
		</style>
		<title>LMS</title>
		<link rel="stylesheet" type="text/css" href="../css/global_styles.css">
		<link rel="stylesheet" type="text/css" href="../css/for1.css">
		<link rel="stylesheet" type="text/css" href="css/index_style.css">
	</head>
	<body>
			<div class="box" style="height:40%; overflow:hidden; width:20%; margin-left:40%;">
		<form class="cd-form" method="POST" action="#">
		
		<center><legend style="font-sixe:3rem;">Librarian Login</legend></center>

			<div class="error-message" id="error-message">
				<p id="error"></p>
			</div>
			<div class="inp">
			<div class="icon">
				<input class="l-user" type="text" name="l_user" placeholder="Username" required />
			</div>
			
			<div class="icon">	
				<input class="l-pass" type="password" name="l_pass" placeholder="Password" required />
			</div>
			
			<input type="submit"  value="Login" class="butn" name="l_login"/>
			</div>
</div>
			
		</form>
		<p align="center"><a href="../index.php"">
		<div class="bk" style="text-transform:uppercase; color:red !important;">
		Go Back
		</div>
	</a>
	</body>
	

	
</html>