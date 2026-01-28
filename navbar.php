<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="navbar">
    <div class="nav-left">
        <span class="logo">Resto Cloud</span>
        <a href="home.php" class="nav-link">Home</a>
        <a href="info.php" class="nav-link">Info</a>
    </div>

    <div class="nav-right">
        <button class="hamburger" id="menuBtn">
            <i class="fa fa-bars"></i>
        </button>

        <div class="dropdown" id="menuDropdown">
            <div class="dropdown-header">
                <i class="fa fa-user-circle"></i>
                <span><?php echo $_SESSION['username'] ?? 'User'; ?></span>
            </div>

            <a href="profile.php" class="dropdown-item">
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
