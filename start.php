<?php
if(isset($_SESSION['currentUser']))
{
    include('index.php');
}
else
{
    header("Location: index.php");
}


    echo '<html>
        <head>
            "<title>".'.$_SESSION['currentUser'].' - Start</title>'.
        '</head> 
        <body>

        <p>Mit dem Kostenrechner können die Ausgaben der letzen Monate eingesehen werden sowie Ausgabe und Einzahlungen getätigt werden.</p>

        <body>
    </html>'
?>