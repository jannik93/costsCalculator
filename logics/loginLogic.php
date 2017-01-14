<?php  session_start();
    
    include '../configuration.php';
    //prüfe post Daten
    if(isset($_POST['username']) && isset($_POST['password']))
    {
        $postUsername = $_POST['username'];
        $postPassword = $_POST['password'];

    }
    else
    {
        echo 'All fields required';
        exit;
    }

    $sql = "SELECT Username,UserPassword  FROM users WHERE Username='$postUsername' AND UserPassword='$postPassword'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) 
    {
        // output data of each row
        while($row = $result->fetch_assoc()) 
        {
            $username= $row["Username"];
                                
        }
        
        
        $_SESSION['currentUser'] = $username;

        header("Location: ../start.php");
    
    }
    else 
    {
        header("Location: ../index.php");
    }

    //return to start
    exit;
?> 