<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include 'config.php';
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: berhasil_login.php");
    exit();
}
 
if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = hash('sha256', $_POST['password']); // Hash the input password using SHA-256
 
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
 
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: berhasil_login.php");
        exit();
    } else {
        echo "<script>alert('Email atau password Anda salah. Silakan coba lagi!')</script>";
    }
}
?>
 
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- STIKER ANIMASI -->
<div class="sticker star">⭐</div>
<div class="sticker star1">⭐</div>
<div class="sticker lock">🔒</div>
<div class="sticker cloud">☁️</div>

<div class="login-wrapper">
    <div class="login-card">
        <h2>Login</h2>
        <p class="subtitle">Silakan masuk ke akun Anda</p>

        <form method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="submit">Masuk</button>
        </form>

        <p class="register-text">
            Belum punya akun? <a href="register.php">Daftar</a>
        </p>
    </div>
</div>

</body>
</html>
