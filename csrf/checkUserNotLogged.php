<?php

if(!isset($_SESSION['user'])) {
  header("Location: index.php");
  return;
}

$user = $_SESSION['user'];