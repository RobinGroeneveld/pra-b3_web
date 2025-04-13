<?php

session_start();

require_once 'config/config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepagina</title>
    <link rel="stylesheet" href="public_html/css/main.css">
    <script src="https://kit.fontawesome.com/81af0c0b33.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
    <div class="wrapper">
            <div class="alignment">
                <div class="devloperland">
                    <img src="img/logo-big-v4.png" alt="" height="150px" width="500px">
                </div>
                <div class="header-tekst">
                    <h3>Welkom bij het hoofdmenu hier kan je taken aanmaken, verwijderen en aanpassen en de taken kunt u ook zien</h3>
                </div>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="<?= $base_url ?>/logout.php">Uitloggen</a>
                <?php else: ?>
                    <a href="<?= $base_url ?>/login.php">Inloggen</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    </header>
    <main>
        <div class="a-elements-homepage">
            <a href="departments/personeel.php">Personeel</a>
            <a href="departments/horeca.php">Horeca</a>
            <a href="departments/techniek.php">Techniek</a>
            <a href="departments/inkoop.php">Inkoop</a>
            <a href="departments/klantenservice.php">klantenservice</a>
            <a href="departments/groen.php">Groen</a>
        </div>
    </main>
    <footer>
        <div class="tasks">
            <a href="resources/views/tasks/index.php">Taken toevoegen, verwijderen en aanpassen</a>
            <a href="resources/views/tasks/self-made_tasks.php">Taken die u zelf heeft gemaakt</a>
            <a href="resources/views/tasks/done.php">Taken die klaar zijn`over de hele afdeling</a>
        </div>

        <div class="tasks2">
            <a href="resources/views/tasks/notdone.php">Taken die nog niet klaar zijn over de hele afdeling</a>
        </div>
    </footer>
</body>
</html>