<?php
    include("index.php");
    include("configuration.php");


    //show table with history
    
    $sqlHistory="SELECT Credit, IsAdded, CreatedTimeStamp, UserId FROM history";
    $resultHistory = $mysqli->query($sqlHistory);

    

    if ($resultHistory->num_rows > 0) 
        {
            echo "<table class='table table-striped'>";
            echo "<tr><th>Betrag</th>><th>Eingezahlt von:</th>><th>Eingezahlt am:</th></tr>";
          
            // output data of each row
            while($rowHistory = $resultHistory->fetch_assoc()) 
            {   
                
                $sqlUser="SELECT Username FROM users WHERE UserId = '$userId'";
                $resultUser=$mysqli->query($sqlUser);
                $userId = $rowHistory['UserId'];
                $createdTimeStamp = $rowHistory['CreatedTimeStamp'];
                $credit= $rowHistory["Credit"];

                
                //get username by id
                if ($resultUser->num_rows == 1) 
                {
                    while($rowUser = $resultUser->fetch_assoc()) 
                    {
                        $userName =  $rowUser['Username'];
                    }     
                }
                else
                {
                    $userName='unknown';
                }

                 echo "<tr>";
                 if($rowHistory['IsAdded'] == 1)
                 {
                    echo "<td style='color:green'>$credit €</td><td>$userName</td><td>$createdTimeStamp</td>";
                   
                 }
                 else
                 {
                    echo "<td style='color:red'>$credit €</td><td>$userName</td><td>$createdTimeStamp</td>";
                 }
                  echo "</tr>";  
            }
                echo "</table>";
        }
?>