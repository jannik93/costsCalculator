<?php session_start();
if(isset($_SESSION))
{
    
    include('index.php');
    include('logics/ClassGlobalFunc.php');
    include('logics/ClassGasolineCostsLogic.php');
    include('configuration.php');
   
   echo "<title>Spritkosten History</title>";

   echo "<h1 class='headline'>Spritkosten</h1>";
}
else
{
    header("Location: index.php");
}


    $classGasolineCostsLogic = new ClassGasolineCostsLogic;
    $resultHistory = $classGasolineCostsLogic->GetHistoryForGasolineCosts($mysqli);

    $classGlobalFunc = new ClassGlobalFunc;
    
    echo "<table class='table table-striped'>";
    echo "<tr><th>Kosten</th><th>Getätigt von</th><th>Getätigt am</th></tr>";

    while($rowHistory = $resultHistory->fetch_assoc())      
    {   
                        
        $createdTimeStamp = $rowHistory['CreatedTimeStamp'];
        $costs= $rowHistory["Costs"];
        $costsFormated = number_format($costs , 2 , "," , "." );
    
        $userName = $classGlobalFunc->GetUserNameById($mysqli,$rowHistory['UserId']);

        echo "<tr><td style='color:red'>$costs €</td><td>$userName</td><td>$createdTimeStamp</td></tr>";

    }
    echo "</table>";

?>