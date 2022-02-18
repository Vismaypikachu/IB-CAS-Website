<html>
	<link rel="stylesheet" href="adminPage.css">

	<header id = "header">
		<div id="titleBar"> <!-- Title Bar-->
			<h1>IB CAS Project</h1>
		</div>
		
		<div id="navBar"> <!-- Nav Bar-->
			<p>
				<a href = "requestPage.php">Request Page</a>
				<a href = "loginPage.php">Admin Page</a>           
				<a href='logout.php'>Click here to log out</a>
			</p>
		</div>
	</header>

	<form id = "bankSelector" action = "bankWrite.php" method = "POST">
		<label for="banks">Choose a Donation Center:</label>
		<select id="banks" name="banks" required>
			<option>Select One</option>
			<option value="northwestHarvest">Northwest Harvest</option>
		</select>
		<input type="submit" value="Submit">
	</form>
	

<?php
	
	$bank = $_POST['banks'];
	if(!empty($bank)){
		
	$db_name = $bank;
		
		
	$host = "ibcasserver.mysql.database.azure.com";
	$username = "ibcasvismay@ibcasserver";
	$password = "jointechsavvyyouth1!";


	$conn = mysqli_init();
	mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);
	if (mysqli_connect_errno()) {
		die("Failed to connect to MYSQL: ".mysqli_connect_error());
	}
	

	//if checkmarked
	if(isset($_POST['requiredCheck'])){
		
		
		$result = $conn->query("SELECT id, name, quantity FROM inventory");
		$num_rows = $result->num_rows;
		if($num_rows > 0){
			$i = 1;
			while($row = $result->fetch_assoc()){
				#echo $_POST['quantity'.$i];
				$result2 = $conn->query("UPDATE inventory SET quantity = " .$_POST["quantity".$i]. " WHERE name = '" .$row["name"]. "';");
				$i++;
			}
		}
		else{
			echo "0 results availible at this time";
		}
	}

	echo " <table id=\"table\">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Quantity</th>
					<th>Change Quantity</th>
				</tr>";
	$result = $conn->query("SELECT id, name, quantity FROM inventory");
	$num_rows = $result->num_rows;
	if($num_rows > 0){
		$i = 1;
		echo "<form action = \"bankWrite.php\" method = \"POST\">";
		while ($row = $result->fetch_assoc()) {
			echo "<tr>
				<td>". $row["id"] ."</td>
				<td>". $row["name"] ."</td>
				<td>". $row["quantity"] . "</td>
				<td> <input type=\"text\" id=\"quantity" .$i. "\" name=\"quantity" .$i. "\"> </td>
			</tr>";
			
			$i++;
		}
		echo "</table> 
		<input type=\"checkbox\" id=\"requiredCheck\" name=\"requiredCheck\" required> 
		<label for=\"requiredCheck\">I have reviewed my changes</label>
		<input type=\"submit\" value=\"Submit\"></form><br>";
		
		if(isset($_POST['requiredCheck'])){ echo "<h3> Thank you for submitting! Your changes were successfully merged.</h3>";}
	}
	else{
		echo "0 results availible at this time";
	}

	$conn->close();
}
?>
</html>