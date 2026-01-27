<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include 'config.php';
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']); // Hash the input password using SHA-256
    $cpassword = hash('sha256', $_POST['cpassword']); // Hash the input confirm password using SHA-256
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (username, email, password)
                    VALUES ('$username', '$email', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Selamat, pendaftaran berhasil!')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Maaf, terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Ups, email Sudah Terdaftar.')</script>";
        }
    } else {
        echo "<script>alert('Password tidak sesuai.')</script>";
    }
}else{
    $username = "";
    $email = "";
    $_POST['password'] = "";
    $_POST['cpassword'] = "";
}
?>
 
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | RestoCloud</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS Lokal -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-wrapper">
    <div class="login-card">

        <div class="login-header">
            <h1>RestoCloud</h1>
            <p>Admin Registration</p>
        </div>

        <form action="" method="POST" class="login-form">

            <div class="input-group">
                <i class="fa fa-user"></i>
                <input type="text"
                       name="username"
                       placeholder="Username"
                       value="<?php echo $username; ?>"
                       required>
            </div>

            <div class="input-group">
                <i class="fa fa-envelope"></i>
                <input type="email"
                       name="email"
                       placeholder="Email Address"
                       value="<?php echo $email; ?>"
                       required>
            </div>

            <div class="input-group">
                <i class="fa fa-lock"></i>
                <input type="password"
                       name="password"
                       placeholder="Password"
                       value="<?php echo $_POST['password']; ?>"
                       required>
            </div>

            <div class="input-group">
                <i class="fa fa-lock"></i>
                <input type="password"
                       name="cpassword"
                       placeholder="Confirm Password"
                       value="<?php echo $_POST['cpassword']; ?>"
                       required>
            </div>

            <button type="submit" name="submit" class="btn-login">
                <i class="fa fa-user-plus"></i> Daftar
            </button>

            <p class="login-register-text">
                Sudah punya akun?
                <a href="index.php">Login di sini</a>
            </p>

        </form>
    </div>
</div>

</body>
</html>
