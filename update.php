<?php

session_start();

if(!isset($_SESSION['user'])) {
header("Location: index.php");
}

require_once('connect.php');

$user = $_SESSION['user'];
$nome = $_GET['nome'];
$email = $_GET['email'];
$senha = $_GET['senha'];

$sql = $conn->prepare('UPDATE user SET nome = :nome, email = :email, senha = :senha WHERE id = :id');
$sql->execute(["email" => $email, "senha" => $senha, "nome" => $nome, "id" => $user['id']]);
$result = $sql->rowCount();

if (!$result) {
    header("Location: index.php");
}else{
    $user = [
        'id' => $user['id'], 
        'nome' => $nome,
        'email' => $email
    ];

    $_SESSION['user'] = $user;
    
    header('Location: dashboard.php');
}

// http://localhost/csrf/update.php?nome=Renata&email=renatinha_htadanight%40bol.com.br&senha=soulinda