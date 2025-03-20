<?php
if ($_POST['action'] == 'create') {
    $beschrijving = $_POST['beschrijving'];
    $afdeling = $_POST['afdeling'];
    $title = $_POST['title'];
    $deadline = $_POST['deadline'];

    if (empty($beschrijving)) {
        echo 'Beschrijving is verplicht';
        exit;
    }

    if (empty($afdeling)) {
        echo 'Afdeling is verplicht';
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
}
