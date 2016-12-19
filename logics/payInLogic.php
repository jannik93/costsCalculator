<?php session_start();

include('../configuration.php');
include('../payIn.php');

    if(isset($_Post['credit']) && isset($_SESSION['currentUser']))
    {
        $sql = "SELECT UserID  FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) 
        {
            // output data of each row
            while($row = $result->fetch_assoc()) 
            {
               $userId =  $row["id"];
            }

            $stmt = $mysqli->prepare("INSERT INTO history (Credit, UserId, LastChange) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $_Post['credit'], $userId, date());
            $stmt->execute();
        }
        else 
        {
            echo '<div class="alert alert-warning">
                  <strong>Warning!</strong> Beim Zugriff auf die Datenbank ist etwas schief gelaufen!
                  </div>';
        }
        
        
    }


?>