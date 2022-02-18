<?php

$host = "ibcasserver.mysql.database.azure.com";
    $username = "ibcasvismay@ibcasserver";
    $password = "jointechsavvyyouth1!";
    $db_name = "login";
      
    $conn = mysqli_connect($conn, $host, $username, $password, $db_name, 3306);
    session_start();
    
    $user_check = $_SESSION['login_user'];

    $query = "SELECT username, password FROM login WHERE username = '$user_check'";
    $ses_sql = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($ses_sql);
    $login_session = $row['username'];
?>