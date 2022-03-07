<?php
    include('login.php');
    
	if(isset($_SESSION['login_user'])){
        header("location: adminPage.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginPage.css">
    <title>Login Page</title>
</head>

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

<body>

    <div id="login">
        <h2>Login Form</h2>
        <form action="loginPage.php" method="POST">
            <label>Username: </label>
            <input id="name" name="username" placeholder="username" type="text">
            <label>Password: </label>
            <input id="password" name="password" placeholder="*********" type="password">
            <br><br>
            <input name="submit" type="submit" value="Login">
            <span><?php echo $error; ?></span>
        </form>
    </div>
</body>
</html>