<html>
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

	<link rel="stylesheet" href="requestPage.css">

	<table id="table">
        <tr>
        	<th>ID</th>
            <th>Name</th>
        	<th>Quantity</th>
        </tr>
	

<?php
	
	$bank = $_POST['banks'];
	
	if(empty($bank)){
		$bank = "northwestHarvest";
		$db_name = "northwestHarvest";
	}

	$db_name = $bank;
	
	
	$host = "ibcasserver.mysql.database.azure.com";
    $username = "ibcasvismay@ibcasserver";
    $password = "jointechsavvyyouth1!";


    $conn = mysqli_init();
    mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);

    if (mysqli_connect_errno()) {
      	die("Failed to connect to MYSQL: ".mysqli_connect_error());
    }
		
           
    $sql = "SELECT id, name, quantity FROM inventory";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
	
		while ($row = $result->fetch_assoc()) {
			echo "<tr><td>". $row["id"] ."</td><td>". $row["name"] ."</td><td>". $row["quantity"] . "</td></tr>";
		}
		echo "</table>";
    }
    else{
    	echo "0 results availible at this time";
    }

    $conn->close();
?>
</html>