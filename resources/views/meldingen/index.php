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
    <header>
        <div class="wrapper">
            <div class="alignment">
                <div class="home-icon">
                    <a href="../../../index.php"><i class="fa-solid fa-house"></i></a>
                </div>
                <div class="header-tekst">
                    <h3>Welkom bij het ovezicht waar je de taken kan zien en kan maken</h3>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        
        <a href="create.php">Nieuwe taak aanmaken</a>

        <?php
        require_once "../../../config/conn.php"; 

    
        $query = "SELECT * FROM taken ORDER BY deadline DESC";

        $statement = $conn->prepare($query);

        $statement->execute();
        
        $meldingen = $statement->fetchAll(PDO::FETCH_ASSOC);
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
        <?php foreach($meldingen as $melding): ?>
            <tr>
                <td><p><?php echo($melding['beschrijving']);?></p></td>  
                <td><p><?php echo($melding['afdeling']);?></p></td>  
                <td><p><?php echo($melding['status']);?></p></td>  
                <td><p><?php echo($melding['title']);?></p></td>  
                <td><p><?php echo($melding['deadline']);?></p></td>  
                <td><a href="edit.php?id=<?php echo $melding['id'];?>">Aanpassen</a></td>
            </tr>
        <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>
</html>