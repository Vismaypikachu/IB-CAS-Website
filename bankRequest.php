<html>
	<?php include('header.php'); ?>
	<link rel="stylesheet" href="requestPage.css">

	<table id="table">
        <tr>
        	<th>ID</th>
            <th>Name</th>
        	<th>Stock</th>
			<th>Wanted Stock</th>
        </tr>
	

<?php
	
	$bank = $_POST['banks'];
	
	if(empty($bank)){
		$bank = "northwestHarvest";
	}
	
	
	$host = "ibcasserver.mysql.database.azure.com";
    $username = "ibcasvismay@ibcasserver";
    $password = "jointechsavvyyouth1!";
	$db_name = "foodBanks";


    $conn = mysqli_init();
    mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);

    if (mysqli_connect_errno()) {
      	die("Failed to connect to MYSQL: ".mysqli_connect_error());
    }
		
           
    $sql = "SELECT id, name, stock, wantedStock FROM $bank";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
	
		while ($row = $result->fetch_assoc()) {
			echo "<tr><td>". $row["id"] ."</td><td>". $row["name"] ."</td><td>". $row["stock"] . "</td></tr>". $row["wantedStock"] . "</td></tr>";
		}
		echo "</table>";
    }
    else{
    	echo "0 results availible at this time";
    }

    $conn->close();
?>
</html>