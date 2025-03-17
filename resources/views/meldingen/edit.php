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
        <h1>taak aanpassen</h1>

        <form action="<?php echo $base_url; ?>/app/Http/Controllers/meldingenController.php" method="POST">
            <input type="submit" value="Verstuur melding">
        </form>
    </div>

</body>

</html>
