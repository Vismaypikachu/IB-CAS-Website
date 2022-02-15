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

	<form id = "bankSelector" method="POST">
		<label for="banks">Choose a Donation Center:</label>
		<select id="banks" name="banks" required>
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
	</table>
</body>
</html>
