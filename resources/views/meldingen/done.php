<?php
require_once __DIR__.'/../../../config/conn.php';

// 1. Query
$query = "SELECT title, afdeling FROM taken WHERE status = 'done'";

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
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($task['title']); ?></td>
                        <td><?php echo htmlspecialchars($task['afdeling']); ?></td>
                        <td><?php echo htmlspecialchars($task['beschrijving']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
