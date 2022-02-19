<?php
    include('login.php');
    
	if(isset($_SESSION['login_user'])){
        header("location: bankWrite.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginPage.css">
    <title>Login Page</title>
</head>

<body>

    <div id="login">
        <h2>Login Form</h2>
        <form action="loginPage.php" method="POST">
            <label>Username: </label>
            <input id="name" name="username" placeholder="username" type="text">
            <label>Password: </label>
            <input id="password" name="password" placeholder="****************" type="password">
            <br><br>
            <input name="submit" type="submit" value="Login">
            <span><?php echo $error; ?></span>
        </form>
    </div>
</body>
</html>