<?php

session_start();

require_once('checkUserLogged.php');
require_once('checkCsrfToken.php');

require_once('connect.php');

$email = $_GET['email'];
$senha = $_GET['senha'];

$sql = $conn->prepare('SELECT * FROM user WHERE email = :email AND senha = :senha');
$sql->execute(["email" => $email, "senha" => $senha]);
$result = $sql->fetch();
$sql = null;

if (!$result) {
    header("Location: index.php");
    return;
} else {
    $user = [
        'id' =>$result['id'], 
        'nome' => $result['nome'],
        'email' => $result['email']
    ];

    $_SESSION['user'] = $user;
}

header('Location: dashboard.php');
