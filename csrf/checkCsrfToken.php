<?php

if ($_SESSION['csrf'] != $_GET['csrf']) {
    header("Location: 404.html");
    return;
}