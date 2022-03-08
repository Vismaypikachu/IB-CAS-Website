<html>
	<?php include('header.php'); ?>
	<link rel="stylesheet" href="adminPage.css">	
<?php

	$bank = $_POST['banks'];
	if(!empty($bank)){
		
		$host = "ibcasserver.mysql.database.azure.com";
		$username = "ibcasvismay@ibcasserver";
		$password = "jointechsavvyyouth1!";
		$db_name = "foodBanks";

		$conn = mysqli_init();
		mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);
		if (mysqli_connect_errno()) {
			die("Failed to connect to MYSQL: ".mysqli_connect_error());
		}
			
		//if checkmarked
		if(isset($_POST['requiredCheck'])){
			
			$result = $conn->query("SELECT id, name, stock, wantedStock FROM $bank");
			$num_rows = $result->num_rows;
			if($num_rows > 0){
				$i = 1;
				while($row = $result->fetch_assoc()){
					$result2 = $conn->query("UPDATE $bank SET stock = " .$_POST["stock".$i]. " WHERE name = '" .$row["name"]. "';");
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
					<th>Stock</th>
					<th>Wanted Stock</th>
					<th>Change Stock</th>
					<th>Change Wanted Stock</th>
				</tr>";
		$result = $conn->query("SELECT id, name, quantity FROM inventory");
		$num_rows = $result->num_rows;
		if($num_rows > 0){
			$i = 1;
			echo "<form action = \"bankWrite.php\" method = \"POST\">
				<tr>
					<td> <input type=\"text\" id=\"banks\" name = \"banks\" value=".$bank." style=\"display: none;\"> </td>
				</tr>
			";
			
			while ($row = $result->fetch_assoc()) {
				echo "<tr>
					<td>". $row["id"] ."</td>
					<td>". $row["name"] ."</td>
					<td>". $row["stock"] . "</td>
					<td>". $row["wantedStock"] . "</td>
					<td> <input type=\"text\" id=\"stock" .$i. "\" name=\"stock" .$i. "\" required> </td>
					<td> <input type=\"text\" id=\"wantedStock" .$i. "\" name=\"wantedStock" .$i. "\" required> </td>
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
	else{
		echo "Please select a database!";
	}
?>
</html>