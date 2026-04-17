<?php
require 'config.php';

if (!isset($_SESSION["user_id"])){
    header("Location: login.php");
    exit;
}
?>

<h1>Welcome! You are now logged in.</h1>
<a href="logout.php">Logout</a>