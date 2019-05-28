<!DOCTYPE html>

<?php
  session_start();

  $number =  mt_rand();
  $token = base64_encode($number);
  $_SESSION['csrf'] = $token;

  if(!isset($_SESSION['user'])) {
    header("Location: index.php");
    return;
  }

  $user = $_SESSION['user'];
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link rel="stylesheet" href="css.css">
  <title>Dashboard</title>
</head>

<body style="background-color:#16a085">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="card card-body bg-light mt-5">
          <h2> Bem vindo(a) <?= $user['nome'] ?></h2>

          <form class="data-update" method="get" action="update.php">
            <div class='row'>
              <div class="col-md-12">
                <label for="name">Novo nome:</label> <br>
                <input type="text" name="nome" id="nome" value="<?=$user['nome'] ?>" />
              </div>
            </div>

            <div class='row'>
              <div class="col-md-12">
                <label for="name">Novo email:</label> <br>
                <input type="text" name="email" id="email" value="<?= $user['email']?>" />
              </div>
            </div>

            <div class='row'>
              <div class="col-md-12">
                <label for="name">Nova senha:</label> <br>
                <input type="password" name="senha" id="senha" />
              </div>
            </div>

            <div class='row'>
              <div class="col-md-12">
                <input type="hidden" name="csrf" value="<?= $token ?>"/>
                <button type="submit">Enviar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>