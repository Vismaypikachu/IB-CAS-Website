<?php
    session_start();
    $error='';

    if(isset($_POST['submit'])){
        if(empty($_POST['username']) || empty($_POST['password'])){
            $error = "Please enter all the required fields.";
        }
        else{
            $username = $_POST['username'];
            $password = $_POST['password'];              
                
            $host = "ibcasserver.mysql.database.azure.com";
            $username = "ibcasvismay@ibcasserver";
            $password = "jointechsavvyyouth1!";
            $db_name = "login";
        
            $conn = mysqli_init();
            mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);
            if (mysqli_connect_errno()) {
                die("Failed to connect to MYSQL: ".mysqli_connect_error());
            }

            $query = "SELECT username, password FROM login WHERE username=? AND password=? LIMIT 1";

            $stmt = $conn->prepare($query);
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $stmt->bind_result($username, $password);
            $stmt->store_result();


            if($stmt->fetch()){
                $_SESSION['login user'] = $username;
                header("location: adminPage.php");
            }
            else{
                $error = "invalid username or password";
            }
            mysqli_close($conn);
        }
    }
?>