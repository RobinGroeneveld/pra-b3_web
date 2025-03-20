<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    require_once __DIR__.'/../config/conn.php';

    $afdeling = $_GET['afdeling'] ?? '';

    $query = "SELECT title, afdeling FROM taken WHERE afdeling = :afdeling";
    $statement = $conn->prepare($query);
    $statement->bindParam(':afdeling', $afdeling);
    $statement->execute();
    $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>

    
</body>
</html>




