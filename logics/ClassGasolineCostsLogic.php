<?php

namespace logics
{
  
    class ClassGasolineCostsLogic
    {
        

        public function InsertCosts($costs,$mysqli,$userId)
        {
            

            $stmt = $mysqli->prepare("INSERT INTO gasolinecosts (Costs,UserId) VALUES (?,?)");
            $stmt->bind_param("di", $costs,$userId);
            $stmt->execute();
        }

        //return the a history result
        public function GetHistoryForGasolineCosts($mysqli)
        {
            include("ClassGlobalFunc.php");

            $sqlHistory = "SELECT Costs,CreatedTimeStamp, UserId  FROM gasolinecosts";
            $resultHistory = $mysqli->query($sqlHistory);

            return $resultHistory;

        }
    } 
}
