<?php
	include('header.php');
	include('session.php');

	if(!isset($_SESSION['login_user'])){
		header("location: loginPage.php");
	}
	
	
	$host = "ibcasserver.mysql.database.azure.com";
    $username = "ibcasvismay@ibcasserver";
    $password = "jointechsavvyyouth1!";
	$db_name = "users";


    $conn = mysqli_init();
    mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);

    if (mysqli_connect_errno()) {
      	die("Failed to connect to MYSQL: ".mysqli_connect_error());
    }
		
    $currentUsername = $_SESSION['login_user'];
    $sql = "SELECT access FROM userInfo WHERE name = '$currentUsername'";
	$result = $conn->query($sql);

	while($row = mysqli_fetch_array($result)){
	    $bankAccess[] = $row['access'];
	}
	$bankAccessString = implode(",", $bankAccess);
	$bankArray = explode(',', $bankAccessString);

    $conn->close();
	
  
	
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="adminPage.css">
    <title>Request Page</title>
</head>
<body>
	
	<form action = "bankWrite.php" method = "POST">
		<label for="banks">Choose a Donation Center:</label>
		<select id="banks" name="banks" required>
			<option>Select One</option>
		<?php
			foreach($bankArray as $bankName){
				echo "
					<option value=\"".$bankName."\">".$bankName."</option>
				";			
			}
		?>
		</select>

		
		<input type="submit" value="Submit">
	</form>

</body>
</html>
