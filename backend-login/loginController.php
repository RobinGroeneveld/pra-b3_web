<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];


// 1. Verbinding
require_once "../config/conn.php";

// 2. Query
$query = "SELECT * 
          FROM users 
          WHERE username = :username"; 

// 3. Prepare
$statement = $conn->prepare($query);

 // 4. Execute
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