<?php
        $host = "ibcasserver.mysql.database.azure.com";
        $username = "ibcasvismay@ibcasserver";
        $password = "jointechsavvyyouth1!";
        $db_name = "northwestHarvest";

        $conn = mysqli_init();
        mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);

        if (mysqli_connect_errno()) {
                die("Failed to connect to MYSQL: ".mysqli_connect_error());
        }
?>
