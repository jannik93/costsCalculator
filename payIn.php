<?php
    include('configuration.php');
    include('index.php');
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
<<<<<<< HEAD
        <form action="logics/payInLogic.php" method="post">
            <div class="form-group" >
                <label for="cr">Betrag:</label>
                <input type="number" class="form-control" id="cr" name="credit" min="1" step="any"/>
            </div>
            <input type="submit" class="btn btn-default" value="Einzahlen"/>
        </form>
        
        test2
=======
      
    <form action="logics/payInLogic.php" method="post">
        <div class="form-group" >
            <label for="cr">Betrag:</label>
            <input type="number" class="form-control" id="cr" name="credit" min="1" step="any"/>
        </div>
        <input type="submit" class="btn btn-default" value="Einzahlen"/>
    </form>
  
>>>>>>> 39eee917d2291cc9f4cd390b8934765233ded771
    </body>
</html>