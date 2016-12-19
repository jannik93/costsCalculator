<?php
    
    //local
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbDatabaseName = "costsCalculator";


    //Create connection
    $mysqli =  mysqli_connect($servername, $dbUsername, $dbPassword, $dbDatabaseName);
    
    // Check connection
    if ($mysqli->connect_error)
    {
        setcookie("connectionFailed",1);
        header("Location: index.php");
    }

    

?>