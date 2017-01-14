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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="script/jquery.js"></script>
        <script src="theme/bootstrap-3.3.7/js/bootstrap.min.js"></script>
        

        <?php  
            if(isset($_SESSION['currentUser']))
            {
                echo  '<link rel="stylesheet" href="theme/bootstrap-3.3.7/css/bootstrap.css" />';
                echo  '<link rel="stylesheet" href="theme/bootstrap-3.3.7/css/bootstrap-theme.css" />';
                echo  '<link rel="stylesheet" href="theme/css/default.css" />'; 
            }
            else
            {
                echo  '<link rel="stylesheet" href="theme/css/loginBox.css" />';
            }
        ?>

        <link rel="icon" type="image/png" href="theme/images/icon.png" sizes="16x16">

    </head>
    <body>
      <?php  

        $summaryIsActive = '';
        $painIsActive = '';
        $historyIsActive = '';
        $homeIsActive = '';
        $useCreditIsActive = '';
        $addGasolineCostsIsActive = '';
        $gasolineHistoryIsActive = '';

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

            case 'addGasolineCosts.php':
                $addGasolineCostsIsActive = 'active';
                break;
            
            case 'gasolineHistory.php':
                $gasolineHistoryIsActive = 'active';

            default:
                $homeIsActive = 'active';
                
        }
           
        if(isset($_SESSION['currentUser']))
        { 

    echo    '<nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="start.php">Kostenrechner</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                            <li class="'.$homeIsActive.'"><a href="start.php">Home</a></li>
                            <li class="'.$summaryIsActive.'"><a href="summary.php">Übersicht</a></li>
                            <li class="'.$painIsActive.'"><a href="payIn.php">Einzahlen</a></li>
                            <li class="'.$historyIsActive.'"><a href="history.php">History</a></li>      
                            <li class="'.$useCreditIsActive.'"><a href="useCredit.php">Neuer Einkauf</a></li>   
                             <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Spritkosten<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="'.$addGasolineCostsIsActive.'"><a href="addGasolineCosts.php">Neue Spritkosten</a></li>   
                                    <li class="'.$gasolineHistoryIsActive.'"><a  href="gasolineHistory.php">Spritkosten History</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
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

