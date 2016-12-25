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
            try 
            {
                //save credit to history
                $isAdded = 1;
                $stmt = $mysqli->prepare("INSERT INTO history (Credit,IsAdded, UserId, LastChange) VALUES ( ?, ?, ?, ?)");
                $stmt->bind_param("diis", $_POST['credit'], $isAdded, $userId, $date);
                $stmt->execute(); 

                $sqlGetLastTotal = "SELECT Credit from TotalCredit";
                $resultTotal=$mysqli->query($sqlGetLastTotal);
                 //get username by id
                if ($resultTotal->num_rows > 0) 
                {
                    while($rowTotal = $resultTotal->fetch_assoc()) 
                    {
                        $LastTotal =  $rowTotal['Credit'];             
                        $PostCredit = $_POST['credit'];
                        $NewTotal = $LastTotal + $PostCredit;                 
                    }

                    
                    //save credit to total credit
                    $sqlUpdate = "UPDATE totalcredit SET Credit = $NewTotal ";
                    if ($mysqli->query($sqlUpdate) === TRUE) {
                        echo "Record updated successfully";
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }


                    header('location: ../history.php');
                    setcookie('$creditSaved', 1);     
                }
                else
                {
                    //save credit to total credit
                    $stmt = $mysqli->prepare("INSERT INTO  totalcredit (Credit) VALUES(?)");
                    $stmt->bind_param("d", $_POST['credit']);
                    $stmt->execute(); 

                    header('location: ../history.php');
                    setcookie('$creditSaved', 1);  
                }
                


            }
            //catch exception
            catch(Exception $e)
            {
              
            }
        }
        else 
        {
            setcookie('userNotFound', 1);
            header('location: ../index.php');
        }
    }
    else
    {       
        echo "wronginput";
        exit;
            setcookie('$wrongInputCredit', 1);
            header('location: ../index.php');
    }

?>