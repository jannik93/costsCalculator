<?php
 
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
        

            $sqlHistory = "SELECT Costs,UserId ,CreatedTimeStamp FROM gasolinecosts";
            $resultHistory = $mysqli->query($sqlHistory);

            return $resultHistory;

        }
    } 
