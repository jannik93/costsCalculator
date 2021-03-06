<?php
  if(!isset($_SESSION))
    {
        session_start();
    }
    echo '<title>'.$_SESSION['currentUser'].'History</title>';
    
    if(isset($_SESSION['currentUser']))
    {

        include("index.php");
        include("configuration.php");
        echo "<h2>History</h2>";

        //show table with history
        $sqlHistory = "SELECT Credit, IsAdded, CreatedTimeStamp, UserId, Comment FROM history";
        $resultHistory = $mysqli->query($sqlHistory);

        $sqlTotalCredit = "SELECT Credit FROM totalcredit";;
        $resultTotalCredit = $mysqli->query($sqlTotalCredit);
    

        if ($resultTotalCredit->num_rows > 0)
        {
            while($rowTotaLCredit = $resultTotalCredit->fetch_assoc()) 
            {
                $totalCredit = $rowTotaLCredit['Credit'];
                $totalCreditFormated = number_format($totalCredit , 2 , "," , "." );
            }
        
        } 

        if ($resultHistory->num_rows > 0) 
            {
              
                echo 
                "<table id='myTable' class='table table-striped'>
                <thead>
                    <tr>
                        <th>Betrag</th><th>Getätigt von:</th><th>Getätigt am:</th><th>Beschreibung:</th>
                    </tr>
                </thead>";
            
                echo "<tbody>";
                // output data of each row
                while($rowHistory = $resultHistory->fetch_assoc()) 
                {   
                    $userId = $rowHistory['UserId'];    
                    $sqlUser="SELECT Username FROM users WHERE UserId = '$userId'";
                    $resultUser=$mysqli->query($sqlUser);                  
                
                    $createdTimeStamp = $rowHistory['CreatedTimeStamp'];
                    $credit= $rowHistory["Credit"];
                    $creditFormated = number_format($credit , 2 , "," , "." );
                    $comment = $rowHistory['Comment'];
                    
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
                        echo "<td style='color:green'>$creditFormated €</td><td>$userName</td><td>$createdTimeStamp</td><td>$comment</td>";
                    
                    }
                    else
                    {
                        echo "<td style='color:red'>$creditFormated €</td><td>$userName</td><td>$createdTimeStamp</td><td>$comment</td>";
                    }
                    echo "</tr>";  
                }
                echo "</tbody>";
                echo "</table>";

                if($totalCredit > 0)
                {
                    // echo '<th style="color:green">Guthaben: '.$totalCreditFormated.' €'.'</th><th></th><th></th><th>
                    // </tr>';
                    echo '<span style="color:green">Guthaben:'.$totalCreditFormated.' €'.'</span>';
                }
                else
                {
                // echo '<th style="color:red">Guthaben:'.$totalCreditFormated.' €'.'</th><th></th><th></th><th>
                //     </tr>';

                    echo '<span style="color:red">Guthaben:'.$totalCreditFormated.' €'.'</span>';
                }


                if(isset($_COOKIE['successfull']) && $_COOKIE['successfull'] == '1')
                {
                    echo "<div class='alert alert-success'>
                        <strong>Gespeichert!</strong> Eingabe erfolgreich gespeichert!
                        </div>";   
                }
            }
        }
?>