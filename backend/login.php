<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inloggen</title>
</head>
<body>
    <header>

    </header>
    <main>
    <form action="loginController.php" method="POST">
        <input type="text" name="username" placeholder="user">
        <input type="password" name="password" placeholder="pass">
        <input type="submit" value="Inloggen">
    </main>
    
</body>
</html>