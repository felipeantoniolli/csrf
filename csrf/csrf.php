<?php

$number =  mt_rand();
$token = base64_encode($number);
$_SESSION['csrf'] = $token;