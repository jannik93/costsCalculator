<?php
    include("index.php");
    include("configuration.php");


    //show table with history
    
    $sqlHistory="SELECT Credit, IsAdded, CreatedTimeStamp, UserId FROM history";
    $resultHistory = $mysqli->query($sqlHistory);

    $sqlTotalCredit="SELECT Credit FROM totalcredit";;
    $resultTotalCredit=$mysqli->query($sqlTotalCredit);

    if ($resultTotalCredit->num_rows > 0)
    {
        while($rowTotaLCredit = $resultTotalCredit->fetch_assoc()) 
        {
            $totalCredit = $rowTotaLCredit['Credit'];
        }
    
    } 

    if ($resultHistory->num_rows > 0) 
        {
            echo '<span>Aktuelles Guthaben: '.$totalCredit.'</span>';
            echo "<table class='table table-striped'>";
            echo '<tr>';

            if($totalCredit > 0)
            {
                echo '<th style="color:green">Guthaben:'.$totalCredit.'</th> <th></th> <th>
                </tr>';
            }
            else
            {
                echo '<th style="color:red">Guthaben:'.$totalCredit.'</th> <th></th> <th>
                </tr>';
            }

            echo "<tr><th>Betrag</th>><th>Eingezahlt von:</th>><th>Eingezahlt am:</th></tr>";
          
            // output data of each row
            while($rowHistory = $resultHistory->fetch_assoc()) 
            {   
                $userId = $rowHistory['UserId'];    
                $sqlUser="SELECT Username FROM users WHERE UserId = '$userId'";
                $resultUser=$mysqli->query($sqlUser);                  
              
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