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
    <?php require_once __DIR__.'/../components/header.php'; ?>
    <div class="container">
        <h1>Taken:</h1>
        <a href="create.php">Nieuwe taak aanmaken</a>


        <?php

        require_once "../../../config/conn.php"; // <-- puntkomma toegevoegd

        $query = "SELECT * from taken";

        $statement = $conn -> prepare($query);

        $statement->execute();

        $meldingen = $statement->fetchAll(pdo::FETCH_ASSOC);

        ?>

        <div class="container-taken">
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
            
    </div>

   
</body>
</html>