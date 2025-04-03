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

if($action == 'update'){
    $id = $_POST['id'];
    $beschrijving = $_POST['beschrijving'];
    if(!is_numeric($capaciteit))
    {
        $errors[]="Vul voor capaciteit een geldig getal in.";
    }

    if(empty($afdeling))
    {
        $errors[]="Vul voor capaciteit een geldige afdeling in.";
    }


    $title = $_POST['title'];
    if(empty($melder))
    {
        $errors[]="voer een title on";
    }

    $deadline = $_POST["deadline"]; 

    if(isset($errors)){
        var_dump($errors);
        die();
    }


    //1. Verbinding
    require_once '../../../config/conn.php';

    //2. Query
    $query = "UPDATE meldingen
            SET beschrijving = :beschrijving,
                afdeling = :afdeling,
                title = :title, 
                deadline = :deadline
        WHERE id = :id";

    //3. Prepare
    $statement = $conn->prepare($query);

    //4. Execute
    $statement->execute([
        ":beschrijving"      => $beschrijving,
        ":afdeling"      => $afdeling,
        ":title"          => $title,
        ":deadline"    => $deadline,
        ":id"              => $id
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
    $query = "SELECT * FROM taken ORDER BY deadline DESC";
    $statement = $conn->prepare($query);
    $statement->execute();
    $meldingen = $statement->fetchAll(PDO::FETCH_ASSOC);
}
