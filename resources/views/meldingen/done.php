<?php
session_start();
if(!isset($_SESSION['user_id']))
{
    $msg = "Je moet eerst inloggen!";
    header("Location:../../../login.php?msg=$msg");    
    exit;
}
?>

<!doctype html>
<html lang="nl">
<head>
    <title>Voltooide Taken</title>
    <?php require_once __DIR__.'/../components/head.php'; ?>
</head>
<body>
    
    <?php 
    require_once __DIR__.'/../../../config/conn.php';

    // 1. Query
    $query = "SELECT title, afdeling, deadline FROM taken WHERE status = 'done' ORDER BY deadline ASC";

    // 2. Prepare
    $statement = $conn->prepare($query);

    // 3. Execute
    $statement->execute();

    // 4. Fetch results
    $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>

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
        <div class="container">
            <table>
                <thead>
                    <tr>
                        <th>Titel</th>
                        <th>Afdeling</th>
                        <th>Deadline</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tasks as $task): ?>
                        <tr>
                            <td><?php echo ($tasks['title']); ?></td>
                            <td><?php echo ($tasks['afdeling']); ?></td>
                            <td><?php echo ($tasks['deadline']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
   
    
</body>
</html>