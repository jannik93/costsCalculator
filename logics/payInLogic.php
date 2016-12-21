<?php session_start();

    include('../configuration.php');
    
    if(isset($_POST['credit']) && isset($_SESSION['currentUser']))
    {

        $currentUser = $_SESSION["currentUser"];
        $sql="SELECT UserId FROM users WHERE Username = '$currentUser'";
        $result = $mysqli->query($sql);
        
        $date = date('Y-m-d H:i:s');

        if ($result->num_rows == 1) 
        {
            // output data of each row
            while($row = $result->fetch_assoc()) 
            {
               $userId =  $row['UserId'];
               
            }
          
            $stmt = $mysqli->prepare("INSERT INTO history (Credit, UserId, LastChange) VALUES (?, ?, ?)");
            $stmt->bind_param("dis", $_POST['credit'], $userId, $date);
            $stmt->execute();
        }
        else 
        {
            setcookie('userNotFound',1);
            header('location: ../index.php');
        }

            setcookie('$creditSaved',1);
            header('location: ../index.php');
    }
    else
    {
            setcookie('$wrongInputCredit',1);
            header('location: ../index.php');
    }
?>