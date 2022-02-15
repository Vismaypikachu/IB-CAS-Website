<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Page</title>
</head>
<body>

	<form id = "bankSelector">
		<label for="banks">Choose a Donation Center:</label>
		
		<select id="banks" name="banks">
			<option value="Northwest Harvest">Northwest Harvest</option>
		</select>
		<input type="submit" value="Submit">
	</form>
    
	<table>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Quantity</th>
		</tr>
		<?php
			$con=mysqli_init(); mysqli_ssl_set($con, NULL, NULL, {ca-cert filename}, NULL, NULL); mysqli_real_connect($con, "ibcasserver.mysql.database.azure.com", "ibcasvismay@ibcasserver", "jointechsavvyyouth1!", "northwestHarvest", 3306);
			#$('#searchbar').val()
			#$conn = mysqli_connect("ibcasserver.mysql.database.azure.com", "ibcasvismay@ibcasserver", "jointechsavvyyouth1!", "northwestHarvest");
			
			if($conn->connect_error){
				die("Connection Failed: " . $conn->connnect_error);
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
	</table>
</body>
</html>
