<?php   
    if(!isset($_SESSION))
    {
        session_start();
    }
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

            echo '<nav class="navbar navbar-default navbar-fixed-top">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">Kostenrechner</a>
                        </div>
                        <ul class="nav navbar-nav">
                            <li class="active "><a href="#">Home</a></li>
                            <li><a href="#">Übersicht</a></li>
                            <li><a href="payIn.php">Einzahlen</a></li>
                            <li><a href="history.php">History</a></li>      
                            <li><a href="useCredit.php">Neuer Einkauf</a></li>      
                        </ul>
                    </div>
                </nav>';

        }
        else
        {
         
            echo '<link href="theme/css/loginBox.css" rel="stylesheet"/>';
            include("loginBox.php");
        }
     
        if(isset($_COOKIE['successfull']) && $_COOKIE['successfull'] == 1)
        {
            echo "<div class='alert alert-success'>
                <strong>Gespeichert!</strong> Eingabe erfolgreich gespeichert!
                </div>";   
        }
        else if(isset($_COOKIE['successfull']) && $_COOKIE['successfull'] == 1)
        {
            echo "<div class='alert alert-warning'>
                <strong>Fehler!</strong> Fehler beim Speichern!
                </div>";
        }
       
        ?>
    </body>
</html>

