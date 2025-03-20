<?php
require_once __DIR__.'/../config/conn.php';

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
    <link rel="stylesheet" href="../public_html/css/main.css">
    <title>takenlijst</title>
    <?php require_once '../resources/views/components/head.php'; ?>
</head>
<body>
<header>
    <div class="wrapper">
        <div class="alignment">
            <div class="home-icon">
                <a href="../index.php"><i class="fa-solid fa-house"></i></a>
            </div>
            <div class="header-tekst">
                <h3>Welkom bij de takenlijst</h3>
            </div>
          
        </div>
    </div>
</header>
    <main>
        <?php
            require_once '../config/conn.php';

            $query = "SELECT title, afdeling, status FROM taken WHERE status <> 'done'";

            $statement = $conn->prepare($query);

            $statement->execute();

            $meldingen = $statement->fetchALL(PDO::FETCH_ASSOC);
        ?>
        <div class="container">
            <table>
                <tr>
                    <th>Titel</th>
                    <th>Afdeling</th>
                    <th>Status</th>
                </tr>
                <?php foreach($meldingen as $melding): ?>
                    <tr>
                        <td><?php echo ($melding['title']); ?></td>
                        <td><?php echo ($melding['afdeling']); ?></td>
                        <td><?php echo ($melding['status']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </main>
</body>
</html>