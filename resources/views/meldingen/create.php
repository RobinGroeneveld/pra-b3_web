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
    <title>Nieuwe taak aanmaken</title>
    <link rel="stylesheet" href="../../../public_html/css/main.css">
 
</head>

<body>

    <?php require_once __DIR__.'/../components/header.php'; ?>

    <div class="container">
        <div class="middle">
            <h3>Nieuwe taak aanmaken</h3>
        </div>
        <form action="<?php echo $base_url; ?>/app/Http/Controllers/meldingenController.php" method="POST">
            <input type="hidden" name="action" value="create">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            
            <div class="form-group">
                <label for="title">Voer de title in</label>
                <input type="text" name="title" id="title">
            </div>

            <div class="form-group">
                <label for="beschrijving">Voer de beschrijving in</label>
                <input type="text" name="beschrijving" id="beschrijving">
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
            <div class="deadline">
                <label for="deadline">Vul een deadline in</label>
                <input type="date" name="deadline" id="deadline">
            </div>
            <input type="submit" value="Verstuur melding">
        </form>
          
    </div>

</body>

</html>
