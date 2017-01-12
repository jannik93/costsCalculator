<?php 

namespace logics
{

        class ClassGlobalFunc
        {

            function GetUserId($mysqli,$currentUser)
            {
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
                }

                return $userId;
            }

            function GetUserNameById($mysqli,$userID)
            {
                $sqlUser="SELECT Username FROM users WHERE UserId = '$userId'";
                $resultUser=$mysqli->query($sqlUser);     

                if ($resultUser->num_rows == 1) 
                {
                    while($rowUser = $resultUser->fetch_assoc()) 
                    {
                        $userName =  $rowUser['Username'];
                    }     
                }
                else
                {
                    $userName = 'unbekannt';

                }

                return $userName;
            }
        }
}
?>