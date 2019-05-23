<?php


session_start();

require_once('connect.php');

$email = $_GET['email'];
$senha = $_GET['senha'];

$sql = $conn->prepare('SELECT * FROM user WHERE email = :email AND senha = :senha');
$sql->execute(["email" => $email, "senha" => $senha]);
$result = $sql->fetch();
$sql = null;

if (!$result) {
    header("Location: index.php");
}else{
    foreach ($result as $user) {
        $_SESSION['nome'] = $result['nome'];
    }
    
    header('Location: dashboard.php');
}

