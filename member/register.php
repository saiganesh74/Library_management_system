<?php
	require "../db_connect.php";
	require "../message_display.php";
	require "../header.php";
?>

<html>
	<head>
		<title>LMS</title>
		<link rel="stylesheet" type="text/css" href="../css/global_styles.css">
		<link rel="stylesheet" type="text/css" href="../css/for1.css">
		<link rel="stylesheet" href="css/register_style.css">
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
		</style>
	</head>
	<body>
		<form class="cd-form" method="POST" action="#">
			<center><legend>Member Registration</legend><p>Please fillup the form below:</p></center>
			<center>
				<div class="error-message" id="error-message">
					<p id="error"></p>
				</div>

				<div class="icon">
					<input class="m-name" type="text" name="m_name" placeholder="Full Name" required />
				</div>

				<div class="icon">
					<input class="m-email" type="email" name="m_email" id="m_email" placeholder="Email" required />
				</div>
				
				<div class="icon">
					<input class="m-user" type="text" name="m_user" id="m_user" placeholder="Username" required />
				</div>
				
				<div class="icon">
					<input class="m-pass" type="password" name="m_pass" placeholder="Password" required />
				</div>
			
				
				<div class="icon">
					<input class="m-balance" type="number" name="m_balance" id="m_balance" placeholder="Initial Balance" required />
				</div>
				</center>
				<br>

				<input type="submit" name="m_register" class="butn" value="Submit" />
<br><br><br>
				<p align="center"><a href="../member/index.php" style="text-decoration:none;
				margin-left: -8%; color:#94aab0;"; >Go Back</a>
		</form>
	</body>
	
	<?php
		if(isset($_POST['m_register']))
		{
			if($_POST['m_balance'] <150)
				echo error_with_field("Initial balance must be at least 150 in order to create an account", "m_balance");
			else
			{
				$query = $con->prepare("(SELECT username FROM member WHERE username = ?) UNION (SELECT username FROM pending_registrations WHERE username = ?);");
				$query->bind_param("ss", $_POST['m_user'], $_POST['m_user']);
				$query->execute();
				if(mysqli_num_rows($query->get_result()) != 0)
					echo error_with_field("The username you entered is already taken", "m_user");
				else
				{
					$query = $con->prepare("(SELECT email FROM member WHERE email = ?) UNION (SELECT email FROM pending_registrations WHERE email = ?);");
					$query->bind_param("ss", $_POST['m_email'], $_POST['m_email']);
					$query->execute();
					if(mysqli_num_rows($query->get_result()) != 0)
						echo error_with_field("An account is already registered with that email", "m_email");
					else
					{
						$query = $con->prepare("INSERT INTO pending_registrations(username, password, name, email, balance) VALUES(?, ?, ?, ?, ?);");
						$query->bind_param("ssssd", $_POST['m_user'], $_POST['m_pass'], $_POST['m_name'], $_POST['m_email'], $_POST['m_balance']);
						if($query->execute())
							echo success("Details submitted, soon you'll will be notified after verifications!");
						else
							echo error_without_field("Couldn\'t record details. Please try again later");
					}
				}
			}
		}
	?>
	
</html>