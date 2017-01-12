<?php session_start();
if(isset($_SESSION))
{
    
    include('index.php');
    include('logics/ClassGlobalFunc.php');
    include('logics/ClassGasolineCostsLogic.php');
    include('configuration.php');
   
}
else
{
    header("Location: index.php");
}


    $classGasolineCostsLogic = new ClassGasolineCostsLogic;
    $rowHistory = $classGasolineCostsLogic->GetHistoryForGasolineCosts($mysqli);

    $classGlobalFunc = new ClassGloClassGlobFuncbalFunc;
    
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