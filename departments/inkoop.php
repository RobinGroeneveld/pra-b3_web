<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public_html/css/main.css">
    <title>Document</title>
</head>
<body>
<?php require_once "../resources/views/components/header.php"; ?>
<?php
    require_once __DIR__.'/../config/conn.php';

    $afdeling = 'inkoop';

    $query = "SELECT title, afdeling, beschrijving, status, deadline FROM taken WHERE afdeling = :afdeling";
    $statement = $conn->prepare($query);
    $statement->bindParam(':afdeling', $afdeling);
    $statement->execute();
    $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <h1>Inkoop</h1>
    <table>
            <tr>
                <th>Beschrijving</th>
                <th>Afdeling</th>
                <th>Status</th>
                <th>Title</th>
                <th>Deadline</th>
            </tr>
        <?php foreach($tasks as $task):  ?>
        
            <tr>
                <td><p><?php echo($task['beschrijving']);?></p></td>  
                <td><p><?php echo($task['afdeling']);?></p></td>  
                <td><p><?php echo($task['status']);?></p></td>  
                <td><p><?php echo($task['title']);?></p></td>  
                <td><p><?php echo($task['deadline']);?></p></td>  
            </tr>
        <?php endforeach; ?>

        </table>

</body>
</html>




