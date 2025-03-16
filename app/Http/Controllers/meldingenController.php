<?php
if($_POST['action'] == 'create'){
    $name = $_POST['name'];
    if(empty($name)){
        echo 'Naam is verplicht';
    }
    $beschrijving = $_POST['beschrijving'];
    if(empty($beschrijving)){
        echo 'Beschrijving is verplicht';
    }
    $afdeling = $_POST['afdeling'];
    if(empty($afdeling)){
        echo 'Afdeling is verplicht';
    }
    //1. verbinding

    require_once '../../../config/conn.php';

    //2. Query

    $query = "INSERT INTO taken (name, beschrijving, afdeling) VALUES (:name, :beschrijving, :afdeling)";

    //3. Prepare

    $statement = $conn -> prepare($query);

    //4. Execute

    $statement -> execute([
        ':name' => $name,
        ':beschrijving' => $beschrijving,
        ':afdeling' => $afdeling,
    ]);

    header("location: ../../../resources/views/meldingen/index.php");
}
if($_POST['action'] == 'update'){
    
}

