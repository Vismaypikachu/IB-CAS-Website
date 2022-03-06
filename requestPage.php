<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="requestPage.css">
    <title>Request Page</title>
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

	<form id = "bankSelector" action = "bankRequest.php" method = "POST">
		<label for="banks">Choose a Donation Center:</label>
		<select id="banks" name="banks" required>
			<option>Select One</option>
			<option value="northwestHarvest">Northwest Harvest</option>
		</select>
		<input type="submit" value="Submit">
	</form>

</body>
</html>
