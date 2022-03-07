<?php

	include('session.php');

	if(!isset($_SESSION['login_user'])){
		header("location: loginPage.php");
	}
	
	
	$host = "ibcasserver.mysql.database.azure.com";
    $username = "ibcasvismay@ibcasserver";
    $password = "jointechsavvyyouth1!";
	$db_name = "users";


    $conn = mysqli_init();
    mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);

    if (mysqli_connect_errno()) {
      	die("Failed to connect to MYSQL: ".mysqli_connect_error());
    }
		
    $currentUsername = $_SESSION['login_user'];
    $sql = "SELECT access FROM userInfo WHERE name = '$currentUsername'";
	$result = $conn->query($sql);

	while($row = mysqli_fetch_array($result)){
	    $bankAccess[] = $row['access'];
	}
	$bankAccessString = implode(",", $bankAccess);
	$bankArray = explode(',', $bankAccessString);

    $conn->close();
	
  
	
?>


<!DOCTYPE html>
<html lang="en">

<!-- HEADER CONTENT -->
<header id = "header">
		<div id="titleBar"> <!-- Title Bar-->
			<h1>IB CAS Project</h1>
		</div>
		
		<div id="navBar"> <!-- Nav Bar-->
			<p>
				<a href = "requestPage.php">Request Page</a>
				<a href = "adminPage.php">Admin Page</a>      
				<a href="logout.php">Log Out</a>

			</p>
		</div>
	</header>

<script>
	window.onscroll = function() {myFunction()};

	// Get the header
	var header = document.getElementById("header");

	// Get the offset position of the navbar
	var sticky = header.offsetTop;

	// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
	function myFunction() {
	  if (window.pageYOffset > sticky) {
		header.classList.add("sticky");
	  } else {
		$(".ghost").addClass("hidden");
	  }
	}
</script>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="adminPage.css">
    <title>Request Page</title>
</head>
<body>
	
	<form action = "bankWrite.php" method = "POST">
		<label for="banks">Choose a Donation Center:</label>
		<select id="banks" name="banks" required>
			<option>Select One</option>
		<?php
			foreach($bankArray as $bankName){
				echo "
					<option value=\"".$bankName."\">".$bankName."</option>
				";			
			}
		?>
		</select>

		
		<input type="submit" value="Submit">
	</form>

</body>
</html>
