<?php
session_start();
if(!isset($_SESSION['user_id']))
{
    $msg = "Je moet eerst inloggen!";
    header("Location:../../../login.php?msg=$msg");    
    exit;
}
?>
<?php require_once __DIR__.'/../../../config/config.php'; ?>
<!doctype html>
<html lang="nl">

<head>
    <title>taken veranderen</title>
    <?php require_once __DIR__.'/../components/head.php'; ?>
</head>

<body>

    <?php require_once __DIR__.'/../components/header.php'; ?>
    <?php
        $id = $_GET['id'];

        require_once '../../../config/conn.php';

        $query = "SELECT * from taken WHERE id = :id";

        $statement = $conn -> prepare($query);

        $statement->execute([
            ":id" => $id
        ]);

        $melding = $statement ->fetch(pdo::FETCH_ASSOC);
        
    ?>

    <div class="container">
        <h1>Taak aanpassen</h1>

        <form action="<?php echo $base_url; ?>/app/Http/Controllers/meldingenController.php" method="POST">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value=<?php echo $id; ?>>

            <div class="form-group">
                <label for="title">Voer de title in</label>
                <input type="text" min="0" name="title" id="title"  class="form-input" value="<?php echo $melding['title'];?>">
            </div>
            
            <div class="form-group">
                <label for="beschrijving">Voer de beschrijving in</label>
                <input type="text" name="beschrijving" id="beschrijving" value="<?php echo $melding['beschrijving']; ?>">
            </div>
            <div class="form-group">
                <label for="deadline">Voer de deadline in</label>
                <input type="date" name="deadline" id="deadline" value="<?php echo $melding['deadline']; ?>">
            </div>

            <div class="form-group">
                <label for="afdeling">Kies de afdeling</label>
                <select name="afdeling" id="afdeling">
                    <option value="">--Selecteer een optie</option>
                    <option value="personeel">Personeel</option>
                    <option value="horeca">Horeca</option>
                    <option value="techniek">Techniek</option>
                    <option value="inkoop">Inkoop</option>
                    <option value="klantenservice">Klantenservice</option>
                    <option value="groen">Groen</option>
                </select>
            </div>

            <input type="submit" value="Verstuur melding">
        </form>

        <!-- Delete Confirmation Form -->
        <h2>Verwijder taak</h2>
        <form action="<?php echo $base_url; ?>/app/Http/Controllers/meldingenController.php" method="POST">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id" value="<?php echo $melding['id']; ?>">
            <input type="submit" value="Verwijder melding">
        </form>
    </div>

</body>

</html>
