<html>
	<link rel="stylesheet" href="adminPage.css">

	<form id = "bankSelector" action = "bankWrite.php" method = "POST">
		<label for="banks">Choose a Donation Center:</label>
		<select id="banks" name="banks" required>
			<option>Select One</option>
			<option value="northwestHarvest">Northwest Harvest</option>
		</select>
		<input type="submit" value="Select Bank">
	</form>

	<table id="table">
        <tr>
			<th>Check</th>
        	<th>ID</th>
            <th>Name</th>
        	<th>Quantity</th>
			<th>Change Quantity</th>
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
		$i = 0;
		while ($row = $result->fetch_assoc()) {
			echo "<tr>
					<td> <input type=\"checkbox\" id=\"check\".$i name=\"check\".$i> </td>
					<td>". $row["id"] ."</td>
					<td>". $row["name"] ."</td>
					<td>". $row["quantity"] . "</td>
					<td> <input type=\"text\" id=\"quantity\".$i name=\"quantity\".$i> </td>
				</tr>";
			
			#<td> <label for="item1">Bananas</label> </td>
			#<td> <input type="text" id="item1"> </td>
		}
		echo "</table> <form><input type=\"submit\" value=\"Submit\"></form>";
    }
    else{
    	echo "0 results availible at this time";
    }

    $conn->close();
?>
</html>