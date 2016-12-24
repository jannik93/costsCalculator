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
                            <li class="active"><a href="#">Home</a></li>
                            <li><a href="#">Übersicht</a></li>
                            <li><a href="payIn.php">Einzahlen</a></li>
                            <li><a href="history.php">History</a></li>      
                        </ul>
                    </div>
                </nav>';

        }
        else
        {
         
            echo '<link href="theme/css/loginBox.css" rel="stylesheet"/>';
            include("loginBox.php");
        }
     
        if(isset($_COOKIE['creditSaved']) && $_COOKIE['creditSaved'] == 1)
        {
            echo "<div class='alert alert-success'>
                <strong>Gespeichert!</strong> Die Einzahlung wurde erfolgreich gespeichert!
                </div>";   
        }
        else if(isset($_COOKIE['userNotFound']) && $_COOKIE['userNotFound'] == 1)
        {
            echo "<div class='alert alert-warning'>
                <strong>Fehler!</strong> Der im Moment angemeldete Benutzer wurde nicht gefunden!
                </div>";
        }
        else if(isset($_COOKIE['wrongInputCredit']) && $_COOKIE['wrongInputCredit'] == 1)
        {
             echo "<div class='alert alert-warning'>
                <strong>Fehler!</strong> Die eingegebene Einzahlung hatte ein falsches Format!
                </div>";
        }
        ?>
    </body>
</html>

