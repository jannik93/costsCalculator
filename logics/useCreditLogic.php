<?php
if(!isset($_SESSION))
{
    session_start();
}

    include('../configuration.php');
    

    if(isset($_POST['costs']) && isset($_POST['comment']))
    {
        $currentUser = $_SESSION['currentUser'];

        $sqlUser="SELECT UserId FROM users WHERE Username = '$currentUser'";
        $resultUser = $mysqli->query($sqlUser);
        
        $date = date('Y-m-d H:i:s');

        if ($resultUser->num_rows == 1) 
        {
            // output data of each row
            while($row = $resultUser->fetch_assoc()) 
            {
               $userId =  $row['UserId'];
               
            }
        }

        $isAdded = 0;
        $stmt = $mysqli->prepare("INSERT INTO history (Credit,IsAdded, UserId,Comment, LastChange) VALUES ( ?, ?, ?, ?, ?)");
        $stmt->bind_param("diiss", $_POST['costs'], $isAdded, $userId,$_POST['comment'], $date);
        $stmt->execute(); 

        $sqlGetLastTotal = "SELECT Credit from totalcredit";
        $resultTotal = $mysqli->query($sqlGetLastTotal);

        if ($resultTotal->num_rows > 0) 
        {
            while($rowTotal = $resultTotal->fetch_assoc()) 
            {
                $LastTotal =  $rowTotal['Credit'];             
                $PostCredit = $_POST['costs'];
                $NewTotal = $LastTotal - $PostCredit;           
            }


            //save credit to total credit
            $sqlUpdate = "UPDATE totalcredit SET Credit = $NewTotal ";
            if ($mysqli->query($sqlUpdate) === TRUE) 
            {
                header('location: ../history.php');
                setcookie('$successfull', 1); 
            }
            else 
            {
                echo "Error updating record: " . $conn->error;
            }
        }


         
    

        setcookie('successfull',1);
        header('location: ../history.php');
    }
    else
    {


    }

?>