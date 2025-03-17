<?php require_once __DIR__.'/../../../config/config.php'; ?>
<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen / Nieuw</title>
    <?php require_once __DIR__.'/../components/head.php'; ?>
</head>

<body>

    <?php require_once __DIR__.'/../components/header.php'; ?>

    <div class="container">
        <h1>Taak aanpassen</h1>

        <form action="<?php echo $base_url; ?>/app/Http/Controllers/meldingenController.php" method="POST">
            <input type="submit" value="Verstuur melding">
        </form>

        <!-- Delete Confirmation Form -->
        <h2>Verwijder taak</h2>
        <form action="../../../app/Http?controllers/meldingenControler.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <p>Weet je zeker dat je dit record wilt verwijderen?</p>
            <input type="submit" value="Taak verwijderen">
            <a href="index.php">Annuleer</a>
        </form>
    </div>

</body>

</html>
