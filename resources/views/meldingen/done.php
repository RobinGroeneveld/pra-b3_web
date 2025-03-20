<?php

session_start();

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

<!doctype html>
<html lang="nl">
<head>
    <title>Voltooide Taken</title>
    <?php require_once __DIR__.'/../components/head.php'; ?>
</head>
<body>
    <?php require_once __DIR__.'/../components/header.php'; ?>

    <div class="container">
        <h1>Voltooide Taken</h1>
        <a href="index.php">Terug naar overzicht</a>
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
</body>
</html>
