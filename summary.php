<?php
include ("configuration.php");
include("index.php");

//get history from specific months
// $sqlHistory = "SELECT Credit FROM history WHERE CreatedTimeStamp ";
// $resultHistory = $mysqli->query($sqlHistory);

$date = Date("m");
echo "<title>Übersicht</title>";

echo '<table class="table table-striped">
        <tr>
            <th>Monat</th>
            <th>Ausgaben</th>
        </tr>';

for($i = 1; $i <= $date; $i ++)
{
    
    $sql = "SELECT Credit,CreatedTimeStamp FROM history WHERE MONTH(CreatedTimeStamp) = $i AND IsAdded = 0";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc()) 
        {
            $monthlyCredit += $row['Credit'];
            
        }

    }
    else
    {
        exit;
    }

    $monthAsString = get_month_name($i);
    echo '<tr>
            <td>'.$monthAsString.'</td>
            <td>'.$monthlyCredit.' €'.'</td>
        </tr>';
}

echo "</table>";



function get_month_name($month)
{
    $months = array(
        1   =>  'Januar',
        2   =>  'Februar',
        3   =>  'März',
        4   =>  'April',
        5   =>  'Mai',
        6   =>  'Juni',
        7   =>  'Juli',
        8   =>  'August',
        9   =>  'September',
        10  =>  'Oktober',
        11  =>  'November',
        12  =>  'Dezember'
    );

    return $months[$month];
}

  

?>
