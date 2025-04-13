<?php

session_start();

if ($_POST['action'] == 'create') {
    $user_id = $_SESSION['user_id'];

    $errors = [];
    $title = $_POST['title'];
    if(empty($title)){
        echo "Titel is verplicht";
        exit;
    }

    $beschrijving = $_POST['beschrijving'];
    if (empty($beschrijving)) {
        echo 'Beschrijving is verplicht';
        exit;
    }

    if (empty($afdeling)) {
        echo 'Afdeling is verplicht';
        exit;
    }

    $afdeling = $_POST['afdeling'];
    if (is_numeric($afdeling)) {
        echo "Afdeling kan geen nummer zijn";
        exit;
    }
    $deadline = $_POST['deadline'];
    if(empty($deadline)){
        echo 'Deadline is verplicht';
        exit;
    }
    
    if (!empty($errors)) {
        var_dump($errors);
        die();
    }

    // 1. Verbinding
    require_once '../../../config/conn.php';

    // 2. Query
    $query = "INSERT INTO taken (title, beschrijving, afdeling, deadline, user_id) 
              VALUES (:title, :beschrijving, :afdeling, :deadline, :user_id)";

    // 3. Prepare
    $statement = $conn->prepare($query);

    // 4. Execute
    $statement->execute([  
        ':beschrijving' => $beschrijving,
        ':afdeling' => $afdeling,
        ":title" => $title,
        ":deadline" => $deadline,
        ":user_id" => $user_id
        
    ]);

    header("Location: ../../../resources/views/meldingen/index.php");
    exit;
}


if ($_POST['action'] == 'update') {
    $id = $_POST['id'];
    $status = $_POST['status']

    $errors = [];

    $beschrijving = $_POST['beschrijving'];
    if (empty($beschrijving)) {
        $errors[] = "Vul een beschrijving in";
    }

    $afdeling = $_POST['afdeling']; 
    if (empty($afdeling)) {
        $errors[] = "Vul een geldige afdeling in";
    }

    $title = $_POST['title'];
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
}
