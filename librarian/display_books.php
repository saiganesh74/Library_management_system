<?php
    require "../db_connect.php";
    require "../message_display.php";
	require "verify_librarian.php";
	require "header_librarian.php";
?>
 <?php

if(isset($_POST['sub'])){
	$h=mysqli_query($con,"select * from book where title ='$title' ");
	
    for($i=0; $i<$rows; $i++)
				{
					$row = mysqli_fetch_array($h);
					echo "<tr>";
							
					for($j=0; $j<6; $j++){
						if($j == 4)
							echo "<td>Rs.".$row[$j]."</td>";
						else
                            echo "<td>".$row[$j]."</td>";
                     }       
					echo"</tr>";
				}

}
      ?>

<html>
	<head>
		<title>LMS</title>
		<link rel="stylesheet" type="text/css" href="../member/css/home_style.css" />
        <link rel="stylesheet" type="text/css" href="../css/global_styles.css">
		<link rel="stylesheet" type="text/css" href="../css/for1.css">
		<link rel="stylesheet" type="text/css" href="../member/css/custom_radio_button_style.css">
	</head>
	<body style="color:white;">
		<form action="" method="POST">  
     <div class="container" align="center" > 
        <div class="content" style="color:white;">
<br>
     
        <div class="user-details" >
            <div class="input-box" >
            <span class="details" >Enter Title Of </span>
         <input type="text" value="  " placeholder="Enter your Batch.. Ex:20173" name="title" required ></span>
          </div>
  
        </div>
           
<button type="submit" name="sub">
      <span></span>
      <span></span>
      <span></span>
      <span></span> 
Search
        
</button>

</form>

    <?php
			$query = $con->prepare("SELECT * FROM book ORDER BY title");
			$query->execute();
			$result = $query->get_result();
			if(!$result)
				die("ERROR: Couldn't fetch books");
			$rows = mysqli_num_rows($result);
			if($rows == 0)
				echo "<h2 align='center'>No books available</h2>";
			else
			{
				?><form class='cd-form'>

				<div class='error-message' id='error-message'>
						<p id='error'></p>
					</div>
				<table width='100%' cellpadding=10 cellspacing=10>
				<tr>
				
						<th>ISBN<hr></th>
						<th>Book Title<hr></th>
						<th>Author<hr></th>
						<th>Category<hr></th>
						<th>Price<hr></th>
                        <th>Copies<hr></th>
					</tr>
			<?php	for($i=0; $i<$rows; $i++)
				{
					$row = mysqli_fetch_array($result);
					echo "<tr>";
							
					for($j=0; $j<6; $j++){
						if($j == 4)
							echo "<td>Rs.".$row[$j]."</td>";
						else
                            echo "<td>".$row[$j]."</td>";
                     }       
					echo"</tr>";
				}
				?>
				</table>
				
				</form>
			<?php
			}
?>
    </body>

</html>