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

        <script src="theme/bootstrap-3.3.7/js/bootstrap.js"></script>
        <script src="theme/bootstrap-3.3.7/js/npm.js"></script>
        <script src="script/jquery.js"></script>
    </head>
    <body>
      
    <form action="logics/payInLogic" method="post">
        <div class="form-group" >
            <label for="creditId">Betrag:</label>
            <input type="number" class="form-control" id="creditId" name="credit"min="1" step="any">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
  
    </body>
</html>