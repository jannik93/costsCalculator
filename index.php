<?php   
    if(!isset($_SESSION))
    {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="de">
  
    <head>

        <meta charset="utf-8"/>
         
        <meta name="viewport"      content="width=device-width, initial-scale=1.0">

        <script src="theme/bootstrap-3.3.7/js/bootstrap.js"></script>
        <script src="theme/bootstrap-3.3.7/js/npm.js"></script>
        <script src="script/jquery.js"></script>

        <link rel="icon" type="image/png" href="theme/images/icon.png" sizes="16x16">

    </head>
    <body>
      <?php  

        $summaryIsActive = '';
        $painIsActive = '';
        $historyIsActive = '';
        $homeIsActive = '';
        $useCreditIsActive = '';

        switch(basename($_SERVER["PHP_SELF"]))
        {
            case 'summary.php':
                $summaryIsActive = 'active';
                break;
            
            case 'payIn.php':
                $painIsActive = 'active';
                break;
            
            case 'history.php':
                $historyIsActive = 'active';
                break;

            case 'useCredit.php':
                $useCreditIsActive = 'active';
                break;

            default:
                $homeIsActive = 'active';
                
            
        }
           
        if(isset($_SESSION['currentUser']))
        {
            echo  '<link href="theme/css/default.css" rel="stylesheet" />'; 
            echo  '<link href="theme/bootstrap-3.3.7/css/bootstrap.css" rel="stylesheet"/>';
            echo  '<link href="theme/bootstrap-3.3.7/css/bootstrap-theme.css" rel="stylesheet"/>';
            echo  '<link href="theme/css/loginBox.css" rel="stylesheet"/>';

            echo '<nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">Kostenrechner</a>
                        </div>
                        <ul class="nav navbar-nav">';
           
            echo    '<li class="'.$homeIsActive.'"><a href="#">Home</a></li>
                            <li class="'.$summaryIsActive.'"><a href="summary.php">Übersicht</a></li>
                            <li class="'.$painIsActive.'"><a href="payIn.php">Einzahlen</a></li>
                            <li class="'.$historyIsActive.'"><a href="history.php">History</a></li>      
                            <li class="'.$useCreditIsActive.'"><a href="useCredit.php">Neuer Einkauf</a></li>      
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

