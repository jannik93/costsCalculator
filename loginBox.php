<!DOCTYPE html>
<html lang="de">

  <body>   
  <h1 class="headerLogin">Kostenrechner</h1>
        <form class="modal-content animate" action="logics/loginLogic.php" method="Post">
            <div class="container">
                <label><b>Benutzername</b></label>
                <input id="name" type="text" required placeholder="Benutzername eingeben" name="username" />
                
                <label><b>Passwort</b></label>
                <input id="pw" type="password" required placeholder="Passwort eingeben" name="password" />
                <button type="submit">Einloggen</button>
             </div>  
        </form>
    </body> 
</html>