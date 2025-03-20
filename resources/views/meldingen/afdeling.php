<?php
require_once __DIR__.'/../../../config/conn.php';

$afdeling = $_GET['afdeling'] ?? '';

$query = "SELECT title, afdeling FROM taken WHERE afdeling = :afdeling";
$statement = $conn->prepare($query);
$statement->bindParam(':afdeling', $afdeling);
$statement->execute();
$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>taken, toevoegen en verwijderen</title>
    <script src="https://kit.fontawesome.com/81af0c0b33.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../../public_html/css/main.css">
</head>
<body>

    <header>
        <div class="wrapper">
            <div class="alignment">
                <div class="logo">
                    <a href="../../../index.php"><i class="fa-solid fa-house"></i><a/>
                </div>
                <div class="header-tekst">
                    <h3>Welkom bij de takenlijst</h3>
                </div>
                <div class="profile-icon">
                    <a href="../../../profile.php"><i class="fa-solid fa-user"></i></a>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="middle">
            <h3>Kies een optie toevoegen, wijzigen of verwijderen</h3>
        </div>
        <div class="container-taken">
            <div class="middle">
                <a href="create.php">Nieuwe taak aanmaken</a>
                <a href="edit.php">Taken verwijderen em wijzigen</a>
                <a href="done.php">Bekijk Voltooide Taken</a>
            </div>
            
        </div>
    </main>
       
    <footer>

    </footer>
</body>
</html>