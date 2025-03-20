<?php
require_once __DIR__.'/../config/conn.php';

$afdeling = $_GET['afdeling'] ?? '';

$query = "SELECT title, afdeling FROM taken WHERE afdeling = :afdeling";
$statement = $conn->prepare($query);
$statement->bindParam(':afdeling', $afdeling);
$statement->execute();
$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
?>