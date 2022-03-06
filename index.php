<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homePage.css">
    <title>IB CAS Project</title>
    
</head>

<body id = "container">
	<!-- HEADER CONTENT -->
	<header id = "header">
		<div id="titleBar"> <!-- Title Bar-->
			<h1>IB CAS Project</h1>
		</div>
		
		<div id="navBar"> <!-- Nav Bar-->
			<p>
				<a href = "requestPage.php">Request Page</a>
				<a href = "adminPage.php">Admin Page</a>      
				
				<?php
					if(isset($_SESSION['login_user'])){
						echo "<a href='logout.php'>Log Out</a>";
					}
				?>
			</p>
		</div>
	</header>
	
	<!-- BODY CONTENT -->
	<div id = "content">
		<div id="ghost"> </div>
		
		<div id = "about us"> 
			<h2 style = "margin: 6px">About Us</h2>
			<br>
		</div>
		
		<div id = "intro"> 
			<p>Welcome to the INSERT NAME webpage. Here we do ...</p>
		</div>
		
		<div id = "our team"> 
			<h2 style = "margin: 6px">Our Team</h2>
			<br>
		</div>
		
	</div>
	
</body>

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
</html>