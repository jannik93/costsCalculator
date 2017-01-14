<?php session_start();
if(isset($_SESSION))
{
    include('logics/ClassGasolineCostsLogic.php');
    include('logics/ClassGlobalFunc.php');
    include('index.php');
    include("configuration.php");

    echo "<title>Spritkosten Hinzufügen</title>";
    echo "<h1 class='headline'>Neue Spritkosten</h1>";
}
else
{
    header("Location: index.php");
}
?>

<html>
    <head>
        <title>Spritkosten hinzufügen</title>       
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