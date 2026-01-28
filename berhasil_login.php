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
    <title>Resto Cloud</title>
</head>
<body>

<?php if (isset($_SESSION['login_success'])): ?>
<div class="alert-success">
    <i class="fa fa-check-circle"></i>
    Login berhasil. Selamat datang, <?php echo $_SESSION['username']; ?>!
</div>
<?php unset($_SESSION['login_success']); endif; ?>

<!-- Navbar -->
<nav class="navbar">
    <div class="nav-left">
        <span class="logo">Resto Cloud</span>
        <a href="home.php" class="nav-link">Home</a>
        <a href="info.php" class="nav-link">Info</a>
    </div>

    <div class="nav-right">
        <button class="hamburger" id="menuBtn" onclick="toggleMenu()">
            <i class="fa fa-bars"></i>
        </button>

        <div class="dropdown" id="menuDropdown">
            <div class="dropdown-header">
                <i class="fa fa-user-circle"></i>
                <span><?php echo $_SESSION['username']; ?></span>
            </div>

            <a href="profile.php" class="dropdown-item">
                <i class="fa fa-user"></i> 
                <span>Profil</span>
            </a>

            <form action="logout.php" method="POST">
                <button type="submit" class="dropdown-item logout">
                    <i class="fa fa-sign-out"></i> 
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </div>
</nav>

<!-- Content -->
<div class="container-logout">
    <h1>Selamat datang, <?php echo $_SESSION['username']; ?>!</h1>
</div>

<script>
function toggleMenu() {
    document.getElementById("menuDropdown").classList.toggle("show");
}
</script>

</body>
</html>
