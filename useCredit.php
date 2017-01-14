<?php
    include('index.php');
?>

<html>

    <head>
        <?php 
        echo "<title>".$_SESSION['currentUser']." - Neuer Einkauf</title>";
        ?>
    </head>
    <body>
        <h2>Neuer Einkauf</h2>
         <form action="logics/useCreditLogic.php" method="post">
            <div class="form-group" >
                <label for="co">Betrag:</label>
                <input type="number" class="form-control" id="co" name="costs" min="1" step="any"/>
            </div>
             <div class="form-group" >
                <label for="com">Beschreibung:</label>
                <textarea type="text" class="form-control" id="com" name="comment"></textarea>
            </div>
            <input type="submit" class="btn btn-default" value="Speichern"/>
        </form>



    </body>


</html>