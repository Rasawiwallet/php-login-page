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
    <title>Admin Login | Resto Cloud</title>

    <!-- Font Awesome (aman di cloud & VM) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS Lokal -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-wrapper">
    <div class="login-card">

        <div class="login-header">
            <h1>RestoCloud</h1>
            <p>Admin Reservation System</p>
        </div>

        <form action="" method="POST" class="login-form">

            <div class="input-group">
                <i class="fa fa-envelope"></i>
                <input type="email" name="email" placeholder="Email Address" required>
            </div>

            <div class="input-group">
                <i class="fa fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit" name="submit" class="btn-login">
                <i class="fa fa-sign-in"></i> Login
            </button>

            <p class="login-register-text">
                Belum punya akun?
                <a href="register.php">Daftar di sini</a>
            </p>

        </form>
    </div>
</div>

</body>
</html>
