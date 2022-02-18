<?php

$host = "ibcasserver.mysql.database.azure.com";
    $username = "ibcasvismay@ibcasserver";
    $password = "jointechsavvyyouth1!";
    $db_name = "login";
      
    $conn = mysqli_init();
    mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);
    if (mysqli_connect_errno()) {
        die("Failed to connect to MYSQL: ".mysqli_connect_error());
    }

    session_start();
    
    $user_check = $_SESSION['login_user'];

    $query = "SELECT username, password FROM login WHERE username = '$user_check'";
    $ses_sql = $conn->query($query);
    $row = $result->fetch_assoc();
    $login_session = $row['username'];
?>