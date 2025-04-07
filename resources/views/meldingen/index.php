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
    <title>taken, toevoegen en verwijderen</title>
    <script src="https://kit.fontawesome.com/81af0c0b33.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../../public_html/css/main.css">
</head>
<body>

    <?php

    // database connection
    require_once "../../../config/conn.php"; 

    // select query with placeholders
    $query = "SELECT * 
              FROM taken 
              ORDER BY deadline DESC";

    // prepare statement
    $statement = $conn->prepare($query);

    //statement execute
    $statement->execute();
    
    //fetch data
    $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    ?>

    <header>
        <div class="wrapper">
            <div class="alignment">
                <div class="devloperland">
                    <img src="" alt="">
                </div>
                <div class="home-icon">
                    <a href="../../../index.php"><i class="fa-solid fa-house"></i></a>
                </div>
                <div class="header-tekst">
                    <h3>Welkom bij het ovezicht waar je de taken kan zien en kan maken</h3>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <a href="create.php">Nieuwe taak aanmaken</a>
            <div class="container-taken">
                <table>
                <tr>
                    <th>Titel</th>
                    <th>Beschrijving</th>
                    <th>Afdeling</th>
                    <th>Status</th>
                    <th>Deadline</th>
                </tr>
                
            <?php foreach($tasks as $task): ?>

                <tr>
                    <td><p><?php echo($task['title']);?></p></td>  
                    <td><p><?php echo($task['beschrijving']);?></p></td>  
                    <td><p><?php echo($task['afdeling']);?></p></td>  
                    <td><p><?php echo($task['status']);?></p></td>  
                    <td><p><?php echo($task['deadline']);?></p></td>  
                    <td><a href="edit.php?id=<?php echo $task['id'];?>">Aanpassen</a></td>
                </tr>

            <?php endforeach; ?>
                </table>
            </div>
        </div>
    </main>
</body>
</html>