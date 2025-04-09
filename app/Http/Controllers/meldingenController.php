<?php

session_start();

if ($_POST['action'] == 'create') {
    $beschrijving = $_POST['beschrijving'];
    $afdeling = $_POST['afdeling'];
    $title = $_POST['title'];
    $deadline = $_POST['deadline'];

    

    if(empty($title)){
        echo "Titel is verplicht";
        exit;
    }

    if (empty($beschrijving)) {
        echo 'Beschrijving is verplicht';
        exit;
    }

    if (empty($afdeling)) {
        echo 'Afdeling is verplicht';
        exit;
    }
    if(nummeric($afdeling)){
        echo "Afdeling kan geen nummer zijn";
        exit;
    }
    if(empty($deadline)){
        echo 'Deadline is verplicht';
        exit;
    }

    // 1. Verbinding
    require_once '../../../config/conn.php';

    // 2. Query
    $query = "INSERT INTO taken (title, beschrijving, afdeling, deadline) VALUES (:title, :beschrijving, :afdeling, :deadline)";

    // 3. Prepare
    $statement = $conn->prepare($query);

    // 4. Execute
    $statement->execute([
        ':beschrijving' => $beschrijving,
        ':afdeling' => $afdeling,
        ":title" => $title,
        ":deadline" => $deadline
    ]);

    header("Location: ../../../resources/views/meldingen/index.php");
    exit;
}


if ($_POST['action'] == 'update') {
    $id = $_POST['id'];
    $beschrijving = $_POST['beschrijving'];
    $status = $_POST['status'];
    $afdeling = $_POST['afdeling']; // Zorg ervoor dat deze variabele wordt opgehaald
    $title = $_POST['title'];

    // Validatie
    $errors = [];
    if (empty($beschrijving)) {
        $errors[] = "Vul een beschrijving in";
    }

    if (empty($afdeling)) {
        $errors[] = "Vul een geldige afdeling in";
    }

    if (empty($title)) {
        $errors[] = "Vul een titel in";
    }

    if (!empty($errors)) {
        var_dump($errors);
        die();
    }

    // 1. Verbinding
    require_once '../../../config/conn.php';

    // 2. Query
    $query = "UPDATE taken
              SET beschrijving = :beschrijving,
                  afdeling = :afdeling,
                  title = :title,
                  status = :status
              WHERE id = :id";

    // 3. Prepare
    $statement = $conn->prepare($query);

    // 4. Execute
    $statement->execute([
        ":beschrijving" => $beschrijving,
        ":afdeling" => $afdeling,
        ":title" => $title,
        ":status" => $status,
        ":id" => $id
    ]);

    // Redirect na succesvolle update
    header("Location: ../../../resources/views/meldingen/index.php?msg=Melding aangepast");
    exit;
}

if ($_POST['action'] == 'delete') {
    $id = $_POST['id'];
    

    // 1. Verbinding
    require_once '../../../config/conn.php';

    // 2. Query
    $query = "DELETE FROM taken WHERE id = :id";

    // 3. Prepare
    $statement = $conn->prepare($query);

    // 4. Execute
    $statement->execute([
        ":id" => $id
    ]);

    header("Location: ../../../resources/views/meldingen/index.php");
    exit;
    $query = "SELECT * FROM taken ORDER BY deadline DESC";
    $statement = $conn->prepare($query);
    $statement->execute();
    $meldingen = $statement->fetchAll(PDO::FETCH_ASSOC);
}
