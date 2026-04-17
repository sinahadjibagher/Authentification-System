<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute(["$email"]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user["password"])){
        $_SESSION["user_id"] = $user["id"];
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid credentials";
    }
}
?>

<form method="POST">
    <input type="email" name="email" required>
    <input type="password" name="password" required>
    <button type="submit">Login</button>
</form>