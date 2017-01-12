<?php session_start();
if(isset($_SESSION))
{
    include('logics/ClassGasolineCostsLogic.php');
    include('logics/ClassGlobalFunc.php');
    include('index.php');
    include("configuration.php");
}
else
{
    header("Location: index.php");
}
?>

<html>
    <head>
        <title>Spritkosten hinzufügen</title>       
        <link href="theme/bootstrap-3.3.7/css/bootstrap.css" rel="stylesheet"/>
        <link href="theme/bootstrap-3.3.7/css/bootstrap-theme.css" rel="stylesheet"/>
        <link href="theme/css/default.css" rel="stylesheet" /> 

        <script src="theme/bootstrap-3.3.7/js/bootstrap.js"></script>
        <script src="theme/bootstrap-3.3.7/js/npm.js"></script>
        <script src="script/jquery.js"></script>
    </head>
    <body>
        <form method="post">
            <div class="form-group" >
                <label for="cr">Betrag:</label>
                <input type="number" class="form-control" id="cr" name="costs" min="1" step="any"/>
            </div>
            <input type="submit" class="btn btn-default" value="Einzahlen"/>
        </form>
    </body>
</html>
<?php
if(isset($_POST["costs"]))
{
    $classGlobalFunc = new ClassGlobalFunc;
    $userId=  $classGlobalFunc->GetUserId($mysqli,$_SESSION['currentUser']);

    $costs = $_POST["costs"];

    $classGasolineCostsLogic = new ClassGasolineCostsLogic; 
    $classGasolineCostsLogic->InsertCosts($costs,$mysqli,$userId);

    header("Location: index.php");
}


?>