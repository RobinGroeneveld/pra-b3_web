<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public_html/css/main.css">
    <title>inloggen</title>
</head>
<body>
    <header>
        <div class="wrapper">
            <div class="alignment">
                <div class="header-tekst">
                    <h3>Welkom bij de inlog pagina</h3>
                </div>
            </div>
        </div>
    </header>
    <main>
        <form action="backend/loginController.php" method="POST" class="form-login">
            <div class="form-group-login">
                <input type="text" name="username" id="username" placeholder="Gebruikersnaam">
            </div>
            <div class="form-group-login">
                <input type="password" name="password" id="password" placeholder="Wachtwoord">
            </div>
            <div class="form-group-login">
                <input type="submit" value="Inloggen">   
            </div>
        </form>
    </main>
    
</body>
</html>