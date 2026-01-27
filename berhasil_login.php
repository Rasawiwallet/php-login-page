<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit(); // Terminate script execution after the redirect
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Login berhasil!</title>
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <div class="nav-left">
        <span class="logo">MyApp</span>
        <a href="#" class="nav-link">Home</a>
        <a href="#" class="nav-link">Info</a>
    </div>

    <div class="nav-right">
        <button class="hamburger" onclick="toggleMenu()">
            <i class="fa fa-bars"></i>
        </button>

        <div class="dropdown" id="menuDropdown">
            <div class="dropdown-header">
                <i class="fa fa-user-circle"></i>
                <span><?php echo $_SESSION['username']; ?></span>
            </div>

            <a href="#" class="dropdown-item">
                <i class="fa fa-user"></i> Profil
            </a>

            <form action="logout.php" method="POST">
                <button type="submit" class="dropdown-item logout">
                    <i class="fa fa-sign-out"></i> Logout
                </button>
            </form>
        </div>
    </div>
</nav>

<!-- Content -->
<div class="container-logout">
    <h1>Selamat datang, <?php echo $_SESSION['username']; ?>!</h1>
    <p>Anda berhasil login ke sistem.</p>
</div>

<script>
function toggleMenu() {
    document.getElementById("menuDropdown").classList.toggle("show");
}
</script>

</body>
</html>
