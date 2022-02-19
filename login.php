<?php
    session_start();
    $error='';

    if(isset($_POST['submit'])){
        if(empty($_POST['username']) || empty($_POST['password'])){
            $error = "Please enter all the required fields.";
        }
        else{
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);              
                
            $dbhost = "ibcasserver.mysql.database.azure.com";
            $dbusername = "ibcasvismay@ibcasserver";
            $dbpassword = "jointechsavvyyouth1!";
            $db_name = "login";
        
            $conn = mysqli_init();
            mysqli_real_connect($conn, $dbhost, $dbusername, $dbpassword, $db_name, 3306);
        

            $query = "SELECT username, password FROM login WHERE username=? AND password=? LIMIT 1";

            $stmt = $conn->prepare($query);
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $stmt->bind_result($username, $password);
            $stmt->store_result();


            if($stmt->fetch()){
                session_start();
                $_SESSION['login_user'] = $username;
                header("location: bankWrite.php");
            }
            else{
                $error = "invalid username or password";
            }
            mysqli_close($conn);
        }
    }
?>