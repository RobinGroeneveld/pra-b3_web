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
    <header>
        <div class="wrapper">
            <div class="alignment">
                <div class="home-icon">
                    <a href="../../../index.php"><i class="fa-solid fa-house"></i></a>
                </div>
                <div class="header-tekst">
                    <h3>Welkom bij het overzicht waar de taken klaar zijn over de hele afdeling</h3>
                </div>
            </div>
        </div>
    </header>

    <?php

        // Get the id from the URL method GET
        $id = $_GET['id'];

        //Database connection
        require_once '../../../config/conn.php';

        // Query
        $query = "SELECT * 
                  from taken 
                  WHERE id = :id";

        // Prepare
        $statement = $conn -> prepare($query);

        //Execute
        $statement->execute([
            ":id" => $id
        ]);

        // Fetch the data
        $tasks = $statement ->fetch(pdo::FETCH_ASSOC);
        
    ?>
    <main>
        <div class="wrapper">
            <div class="middle">
                <h3>Taak aanpassen</h3>
            </div>
            
            <form action="../../../app/Http/Controllers/meldingenController.php" method="POST">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id" value="<?php echo $tasks['id']; ?>">

                <div class="form-group">
                    <label for="title">Titel</label>
                    <input type="text" name="title" id="title" value="<?php echo $tasks['title']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="beschrijving">Beschrijving</label>
                    <input type="text" name="beschrijving" id="beschrijving" value="<?php echo $tasks['beschrijving']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="afdeling">Afdeling</label>
                    <input type="text" name="afdeling" id="afdeling" value="<?php echo $tasks['afdeling']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" required>
                        <option value="">--Selecteer een optie</option>
                        <option value="to-do">to-do</option>
                        <option value="done">done</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit"></input>
                </div>
            </form>
            <form action="<?php echo $base_url; ?>/app/Http/Controllers/meldingenController.php" method="POST">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?php echo $tasks['id']; ?>">
                <div class="form-group">
                    <input type="submit" value="Verwijder taak">
                </div>
            </form>
        </div>
    </main>
</body>

</html>
