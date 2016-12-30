<!DOCTYPE html>
<html lang="de">
  <head>
  </head>
  <body>   
  <h1 class="headerLogin">Kostenrechner</h1>
        <form class="modal-content animate" action="logics/loginLogic.php" method="Post">

            <div class="container">
                <label><b>Benutzername</b></label>
                <input id="name" type="text" required placeholder="Benutzername eingeben" name="username" />

                <label><b>Passwort</b></label>
                <input id="pw" type="password" required placeholder="Passwort eingeben" name="password" />
                <?php 
                    if(isset($_COOKIE["connectionFailed"]) && $_COOKIE["connectionFailed"] == 1)
                    {
                        echo '<span style="color:darkred; font-weight:bold">Verbindungt zur Datenbank fehlgeschlagen.. :( :(</span>';
                    }
                    if(isset($_COOKIE['wrongLoginData']) && $_COOKIE['wrongLoginData'] == 1)
                    {
                        echo '<span style="color:darkred; font-weight:bold">Benutzername oder Passwort falsch :(</span>';
                    }
                    if(isset($_COOKIE['wrongLoginData']) && $_COOKIE['wrongLoginData'] == 3)
                    {
                        echo '<span style="color:darkred; font-weight:bold">Na! Ist noch nicht Dezember!</span>';
                    }  

                ?>
                <button type="submit">Einloggen</button>
             </div>
        </form>
    </body> 
</html>