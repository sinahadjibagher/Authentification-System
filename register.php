<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
    $stmt->execute([$email, $password]);

    echo "User registered!";
}
?>

<form method="POST">
    <input type="email" name="email" required>
    <input type="password" name="password" required>
    <button type="submit">Register</button>
</form>