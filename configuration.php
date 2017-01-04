<?php
    
   	// $servername = "localhost";
    // $dbUsername = "jannik93";
    // $dbPassword = "jannikx3y";
	// $dbDatabaseName = "jannik93";

    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
	$dbDatabaseName = "costscalculator";
    //Create connection
    $mysqli =  mysqli_connect($servername, $dbUsername, $dbPassword, $dbDatabaseName);
    
    // Check connection
    if ($mysqli->connect_error)
    {
        setcookie("connectionFailed",1);
        header("Location: index.php");
    }

    

?>