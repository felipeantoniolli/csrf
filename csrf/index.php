<?php

session_start();

$number =  mt_rand();
$token = base64_encode($number);
$_SESSION['csrf'] = $token;

if (isset($_SESSION['user'])) {
		header("Location: dashboard.php");
		return;
}
?>


<!DOCTYPE html>
<html>
<head>
<title>CSRF</title>
<link href="css.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="login-page">
	  <div class="form">
		<form class="register-form">
		   <input type="text" placeholder="Usúario"/>
		  <input type="password" placeholder="Senha"/>
		  <input type="text" placeholder="Email"/>
		  <button>Criar</button>
		  <p class="message">Tem uma conta? <a href="#">Entre agora! </a></p>
		</form>
		<form class="login-form" method="get" action="login.php">
		  <input type="text" name="email" placeholder="Email"/>
			<input type="password" name="senha" placeholder="Senha"/>
			<input type="hidden" name="csrf" value="<?= $token ?>"/>
		  <button type="submit">Login</button>
		  <p class="message">Não tem conta? <a href="#">Crie agora!</a></p>
		</form>
	  </div>
	</div>
</body>
</html>