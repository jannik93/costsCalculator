<?php   
session_start();
?>

<!DOCTYPE html>
<html>
  
    <head>
        <title>Start</title>

    <script src="theme/bootstrap-3.3.7/js/bootstrap.js"></script>
    <script src="theme/bootstrap-3.3.7/js/npm.js"></script>
    <script src="script/jquery.js"></script>

    </head>
    <body>
      <?php       
        if(isset($_SESSION['currentUser']))
        {
            echo  '<link href="theme/css/default.css" rel="stylesheet" />'; 
            echo  '<link href="theme/bootstrap-3.3.7/css/bootstrap.css" rel="stylesheet"/>';
            echo  '<link href="theme/bootstrap-3.3.7/css/bootstrap-theme.css" rel="stylesheet"/>';
            echo  '<link href="theme/css/loginBox.css" rel="stylesheet"/>';

            include('start.php');
        }
        else
        {
         
            echo '<link href="theme/css/loginBox.css" rel="stylesheet"/>';
            include("loginBox.php");
        }
      ?>
        
    </body>
</html>

