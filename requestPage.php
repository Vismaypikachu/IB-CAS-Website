<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="requestPage.css">
    <title>Request Page</title>
</head>
<body>

	<form id = "bankSelector">
		<label for="banks">Choose a Donation Center:</label>
		<select id="banks" name="banks">
			<option value="northwestHarvest">Northwest Harvest</option>
		</select>
		<input type="submit" value="Submit">
	</form>

    <table id="table">
        <tr>
        	<th>ID</th>
            <th>Name</th>
        	<th>Quantity</th>
        </tr>
    	<?php
			if ($('#bankSelector').val() == "northwestHarvest") {
				require "db.php";
			}
           
            $sql = "SELECT id, name, quantity FROM inventory";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>". $row["id"] ."</td><td>". $row["name"] ."</td><td>". $row["quantity"] . "</td></tr>";
            }
            }
            else{
                echo "0 results availible at this time";
            }

            $conn->close();
    	?>
	</table>
</body>
</html>
