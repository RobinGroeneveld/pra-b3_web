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

    // select query with placeholders
    $query = "SELECT title, afdeling, deadline 
              FROM taken 
              WHERE status = 'done' 
              ORDER BY deadline ASC";

    // statement prepare
    $statement = $conn->prepare($query);

    //statement execute
    $statement->execute();

    // fetch data
    $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

    ?>

    <header>
        <div class="wrapper">
            <div class="alignment">
                <div class="home-icon">
                    <a href="../../../index.php"><i class="fa-solid fa-house"></i></a>
                </div>
                <div class="header-tekst">
                    <h3>Welkom bij het overzicht waar de taken klaar zijn over de hele afdeling</h3>
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
                            <td><?php echo ($task['title']); ?></td>
                            <td><?php echo ($task['afdeling']); ?></td>
                            <td><?php echo ($task['deadline']); ?></td> 
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
   
    
</body>
</html>