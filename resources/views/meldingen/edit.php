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
            <input type="hidden" name="action" value="update">
            <input type="id" name="id" value="<?php echo $id ?>">

            <div class="form-group">
                <label for="title">Voer de title in</label>
                <input type="text" name="title" id="title" value="<?php echo $melding['title']; ?>">
            </div>
            
            <div class="form-group">
                <label for="beschrijving">Voer de beschrijving in</label>
                <input type="text" name="beschrijving" id="beschrijving" value="<?php echo $melding['beschrijving']; ?>">
            </div>
            <div class="forn-group">
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
        <form action="../../../app/Http?controllers/meldingenControler.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <p>Weet je zeker dat je dit record wilt verwijderen?</p>
            <input type="submit" value="Taak verwijderen">
            <a href="index.php">Annuleer</a>
        </form>
    </div>

</body>

</html>
