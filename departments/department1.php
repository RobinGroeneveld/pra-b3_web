<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>taakenlijst</title>
</head>
<body>
    <main>
        <?php
            require_once '../config/conn.php';

            $query = "SELECT * FROM taken";

            $statement = $conn->prepare($query);

            $statement->execute();

            $meldingen = $statement->fetchALL(PDO::FETCH_ASSOC);
        ?>
        <table>
            <tr>
                <th>attractie</th>
                <th>type</th>
                <th>capaciteit</th>
                <th>prioriteit</th>
                <th>melder</th>
                <th>overige_info</th>
                <th>aanpassen</th>
            </tr>
            <?php foreach($meldingen as $melding):?>
                <tr>
                    <td><?php echo $melding['name']; ?></td>
                    <td><?php echo $melding['beschrijving']; ?></td>
            <?php endforeach; ?>
        </table>
    </main>
</body>
</html>