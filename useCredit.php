
<?php
    include('index.php');
?>

<html>

    <head>
        <title>Neuer Einkauf</title>
    </head>
    <body>

         <form action="logics/payInLogic.php" method="post">
            <div class="form-group" >
                <label for="co">Betrag:</label>
                <input type="number" class="form-control" id="co" name="costs" min="1" step="any"/>
            </div>
             <div class="form-group" >
                <label for="com">Betrag:</label>
                <textarea type="text" class="form-control" id="com" name="comment"></textarea>
            </div>
            <input type="submit" class="btn btn-default" value="Einzahlen"/>
        </form>



    </body>


</html>