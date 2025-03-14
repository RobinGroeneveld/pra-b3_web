<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>taakenlijst</title>
</head>
<body>
    <main>
        <form action="<?php echo $base_url; ?>/app/Http/Controllers/meldingenController.php" method="POST">
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" name="name" id="name" class="form-input">
            </div>
            <div class="form-group">
                <label for="beschrijving">beschrijving</label>
                <input type="text" name="beschrijving" id="beschrijving" class="form-input">
            </div>
            <div class="form-group">
                <label for="afdeling">afdeling</label>
                <input type="text" name="afdeling" id="afdeling" class="form-input">
            </div>
            <input type="submit" value="Verstuur melding">
        </form>
    </main>
</body>
</html>