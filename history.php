<?php
    include("index.php");
    include("configuration.php");


    //show table with history
    
    $sqlHistory="SELECT Credit, CreatedTimeStamp, UserId FROM history";
    $resultHistory = $mysqli->query($sqlHistorysql);
 
    

    if ($resultHistory->num_rows == 1) 
        {
            echo "<table class='table table-striped'>";
            echo "<tr><th>Betrag</th>><th>Eingezahlt von:</th>><th>Eingezahlt am:</th></tr>";
          
            // output data of each row
            while($rowHistory = $result->fetch_assoc()) 
            {
                $userId = $rowHistory['UserId'];
                $createdTimeStamp = $rowHistory['CreatedTimeStamp'];
                $sqlUser="SELECT Username FROM users WHERE UserId = '$userId'";
                $credit= $rowHistory["Credit"];

                $resultUser=$mysqli->query($sqlUser);
                //get username by id
                if ($result->num_rows == 1) 
                {
                    while($row = $result->fetch_assoc()) 
                    {
                        $userName =  $row['Username'];
                    }     
                }
                else
                {
                    $userName='unknown';
                }

                 echo "<tr>";
                 echo "<td>$credit</td><td>['$userName']</td><td>'$createdTimeStamp'</td>";
                 echo "</tr>";
            }
            echo "</table>";
           
        }



?>