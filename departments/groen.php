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

    $query = "SELECT title, afdeling FROM taken WHERE afdeling = groen";
    $statement = $conn->prepare($query);
    $statement->bindParam(':afdeling', $afdeling);
    $statement->execute();
    $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <h1>groen</h1>
    <table>
            <tr>
                <th>Beschrijving</th>
                <th>Afdeling</th>
                <th>Status</th>
                <th>Title</th>
                <th>Deadline</th>
            </tr>
        <?php foreach($meldingen as $melding):  ?>
        
            <tr>
                <td><p><?php echo($melding['beschrijving']);?></p></td>  
                <td><p><?php echo($melding['afdeling']);?></p></td>  
                <td><p><?php echo($melding['status']);?></p></td>  
                <td><p><?php echo($melding['title']);?></p></td>  
                <td><p><?php echo($melding['deadline']);?></p></td>  
                <td><a href="edit.php? id=<?php echo $melding['id'];?>">Aanpassen</a></td>
            </tr>
        <?php endforeach; ?>

        </table>

</body>
</html>




