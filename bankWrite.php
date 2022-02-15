<html>
	<link rel="stylesheet" href="adminPage.css">

	<form id = "bankSelector" action = "bankWrite.php" method = "POST">
		<label for="banks">Choose a Donation Center:</label>
		<select id="banks" name="banks" required>
			<option>Select One</option>
			<option value="northwestHarvest">Northwest Harvest</option>
		</select>
		<input type="submit" value="Submit">
	</form>

	<table id="table">
        <tr>
        	<th>ID</th>
            <th>Name</th>
        	<th>Quantity</th>
			<th>Change Quantity</th>
        </tr>
	

<?php
	#variables
	$bank = $_POST['banks'];
	#$requiredCheck = $_POST['requiredCheck'];
	#echo $requiredCheck;
	#for(int i = 0; i < 10; i++){
		
	#}
		
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
			
	#if(isset($requiredCheckmark)){

	#}
	#else{
		$sql = "SELECT id, name, quantity FROM inventory";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			$i = 1;
			while ($row = $result->fetch_assoc()) {
				echo "<tr>
					<td>". $row["id"] ."</td>
					<td>". $row["name"] ."</td>
					<td>". $row["quantity"] . "</td>
					<td> <input type=\"text\" id=\"quantity\".$i name=\"quantity\".$i> </td>
				</tr>";
					
				#<td> <label for="item1">Bananas</label> </td>
				#<td> <input type="text" id="item1"> </td>
				$i++;
			}
				echo "</table> <form action = \"bankWrite.php\" method = \"POST\"> 
				<input type=\"checkbox\" id=\"requiredCheck\" name=\"requiredCheck\" required> 
				<label for=\"requiredCheck\">I have reviewed my changes</label> </form>
				<input type=\"submit\" value=\"Submit\">";
			}
			else{
				echo "0 results availible at this time";
			}
		}
	#}
	$conn->close();
?>
</html>