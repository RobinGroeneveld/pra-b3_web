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
        <div class="header-navbar">
            <h3>Welkom bij de Homepagina van de takenlijst</h3>
            <div class="logout">
                <a href="logout.php">Uitloggen</a>
            </div>
            <div class="login">
                <a href="login.php">Inloggen</a>
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
            <a href="resources/views/meldingen/index.php">Taken toevoegen, verwijderen en aanpassen</a>
            <a href="resources/views/meldingen/iddone.php">Taken die u zelf heeft gemaakt</a>
            <a href="resources/views/meldingen/done.php">Taken die klaar zijn`over de hele afdeling</a>
        </div>

        <div class="tasks2">
            <a href="resources/views/meldingen/notdone.php">Taken die nog niet klaar zijn over de hele afdeling</a>
        </div>
    </footer>
</body>
</html>