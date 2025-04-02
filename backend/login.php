<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public_html/css/main.css">
    <title>inloggen</title>
</head>
<body>
    <header>
        <div class="wrapper">
            <div class="alignment">
                <div class="home-icon">
                    <a href="../../../index.php"><i class="fa-solid fa-house"></i></a>
                </div>
                <div class="header-tekst">
                    <h3>Welkom bij het overzicht waar de taken niet klaar zijn</h3>
                </div>
            </div>
        </div>
    </header>
    <main>
        <form action="loginController.php">
            <input type="text" name="username" placeholder = "gebruikersnaam">
            <input type="password" name="password" placeholder="wachtwoord">
            <input type="submit" value="Inloggen">
        </form>
    </main>
    
</body>
</html>