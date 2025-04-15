<?php
session_start();

if(!isset($_SESSION['user_id']))
{
    $msg = "Je moet eerst inloggen!";
    header("Location:../../../login.php?msg=$msg");    
    exit;
}
    // Database connection
    require_once "../../../config/conn.php"; 

    // Retrieve the logged-in user's ID from the session
    $user_id = $_SESSION['user_id'];

    // Query 
    $query = "SELECT beschrijving, afdeling, status, title, deadline 
              FROM taken
              WHERE user_id = :user_id
              ORDER BY deadline ASC";

    //Prepare
    $statement = $conn->prepare($query);

    //Execute
    $statement->execute([
        ":user_id" => $user_id
    ]);
    // Fetch data
    $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public_html/css/main.css">
    <?php require_once __DIR__.'/../../../resources/views/components/head.php'; ?>
    <title>taken die door u zijn gemaakt</title>
</head>
<body>
    <header>
        <div class="wrapper">
            <div class="alignment">
                <div class="home-icon">
                    <a href="../../../index.php"><i class="fa-solid fa-house"></i></a>
                </div>
                <div class="header-tekst">
                    <h3>Welkom bij het overzicht bij de taken die u heeft gemaakt</h3>
                </div>
            </div>
        </div>
    </header>
    <main>
    <table>
        <tr>
            <th>title</th>
            <th>Beschrijving</th>
            <th>Afdeling</th>
            <th>Status</th>
            <th>Deadline</th>
        </tr>
        <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?php echo ($task['title']); ?></td>
                    <td><?php echo ($task['beschrijving']); ?></td>
                    <td><?php echo ($task['afdeling']); ?></td>
                    <td><?php echo ($task['status']); ?></td>
                    <td><?php echo ($task['deadline']); ?></td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
    </main>
</body>
</html>