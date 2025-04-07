<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$user_id = $_SESSION['user_id'];

require_once "../config/conn.php";

$query = "SELECT * FROM users WHERE username = :username"; 

$statement = $conn->prepare($query);

$statement->execute([
    ":username" => $username
]);

$user = $statement->fetch(PDO::FETCH_ASSOC);

if ($statement->rowCount() < 1) {
    die("Hij bestaat niet");
}

if (!$password == $user['password']) {
    die("wachtwoord is niet juist!");
}

$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['username'];

header("Location: ../index.php");
exit;
?>