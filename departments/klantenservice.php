<?php
session_start();

if(!isset($_SESSION['user_id']))
{
    $msg = "Je moet eerst inloggen!";
    header("Location:../login.php?msg=$msg");    
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public_html/css/main.css">
    <?php require_once "../resources/views/components/head.php"; ?>
    <title>klantenservice overzicht</title>
</head>
<body>
    <header>
        <div class="wrapper">
            <div class="alignment">
                <div class="home-icon">
                    <a href="../index.php"><i class="fa-solid fa-house"></i></a>
                </div>
                <div class="header-tekst">
                    <h3>Welkom bij de pagina waar u alle taken kan zien van de klantenservice afdeling</h3>
                </div>
            </div>
        </div>
    </header>
<?php

    // Database connection
    require_once __DIR__.'/../config/conn.php';

    // Variable for the sort of department
    $afdeling = 'klantenservice';

    // Query
    $query = "SELECT title, afdeling, beschrijving, status, deadline 
              FROM taken 
              WHERE afdeling = :afdeling
              ORDER BY deadline ASC";

    // Prepare
    $statement = $conn->prepare($query);

    $statement->bindParam(':afdeling', $afdeling);

    // Execute
    $statement->execute();

    // Fetch all the data
    $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

    ?>
    
    <table>
            <tr>
                <th>Titel</th>
                <th>Beschrijving</th>
                <th>Afdeling</th>
                <th>Status</th>
                <th>Deadline</th>
            </tr>
        <?php foreach($tasks as $task):  ?>
        
            <tr>
                <td><p><?php echo($task['title']);?></p></td> 
                <td><p><?php echo($task['beschrijving']);?></p></td>  
                <td><p><?php echo($task['afdeling']);?></p></td>  
                <td><p><?php echo($task['status']);?></p></td>  
                <td><p><?php echo($task['deadline']);?></p></td>  
            </tr>
        <?php endforeach; ?>

        </table>
</body>
</html>




