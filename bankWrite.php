<html>
	<link rel="stylesheet" href="adminPage.css">

	<table id="table">
        <tr>
        	<th>ID</th>
            <th>Name</th>
        	<th>Quantity</th>
        </tr>
	
</html>
<?php

	$bank = $_POST['banks'];
	
	if(empty($bank)){
		$bank = "northwestHarvest";
		$db_name = "northwestHarvest";
	}

	$db_name = $bank;
	
	echo $db_name;
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
					<td> <input type="checkbox" id="item".i name="item".i> </td>
					<td>". $row["id"] ."</td>
					<td>". $row["name"] ."</td>
					<td>". $row["quantity"] . "</td>
				</tr>";
			
			#<td> <label for="item1">Bananas</label> </td>
			#<td> <input type="text" id="item1"> </td>
		}
		echo "</table>";
    }
    else{
    	echo "0 results availible at this time";
    }

    $conn->close();
?>