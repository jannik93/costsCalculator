<?php session_start();
if(isset($_SESSION))
{
    
    include('index.php');
   
}
else
{
    header("Location: index.php");
}
?>

<html>
    <head>
        <title>Einzahlen</title>       
        <link href="theme/bootstrap-3.3.7/css/bootstrap.css" rel="stylesheet"/>
        <link href="theme/bootstrap-3.3.7/css/bootstrap-theme.css" rel="stylesheet"/>
        <link href="theme/css/default.css" rel="stylesheet" /> 

        <script src="the me/bootstrap-3.3.7/js/bootstrap.js"></script>
        <script src="theme/bootstrap-3.3.7/js/npm.js"></script>
        <script src="script/jquery.js"></script>
    </head>
    <body>
        <form action="logics/payInLogic.php" method="post">
            <div class="form-group" >
                <label for="cr">Betrag:</label>
                <input type="number" class="form-control" id="cr" name="credit" min="1" step="any"/>
            </div>
            <input type="submit" class="btn btn-default" value="Einzahlen"/>
        </form>
    </body>
</html>