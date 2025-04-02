<?php
session_start();
if(!isset($_SESSION['user_id']))
{
    $msg = "Je moet eerst inloggen!";
    header("Location:../../../login.php?msg=$msg");    
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public_html/css/main.css">
    <script src="https://kit.fontawesome.com/81af0c0b33.js" crossorigin="anonymous"></script>
    <title>takenlijst</title>
</head>
<body>
    <?php
        require_once '../../../config/conn.php';

        $query = "SELECT title, afdeling, deadline, status FROM taken WHERE status <> 'done' ORDER BY deadline DESC"; ;

        $statement = $conn->prepare($query);

        $statement->execute();
        
        $meldingen = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>
<header>
    <div class="wrapper">
        <div class="alignment">
            <div class="home-icon">
                <a href="../../../index.php"><i class="fa-solid fa-house"></i></a>
            </div>
            <div class="header-tekst">
                <h3>Welkom bij de not done takenlijst</h3>
            </div>
        </div>
    </div>
</header>
<main>
    <div class="container">
        <table>
            <tr>
                <th>Titel</th>
                <th>Afdeling</th>
                <th>Status</th>
                <th>Deadline</th>
            </tr>
            <?php foreach($meldingen as $melding): ?>
                <tr>
                    <td><?php echo ($melding['title']); ?></td>
                    <td><?php echo ($melding['afdeling']); ?></td>
                    <td><?php echo ($melding['status']); ?></td>
                    <td><?php echo ($melding['deadline']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</main>
</body>
</html>