<nav class="navbar">
    <div class="nav-left">
        <span class="logo">MyApp</span>
        <a href="home.php">Home</a>
        <a href="info.php">Info</a>
    </div>

    <div class="nav-right">
        <button onclick="toggleMenu()">☰</button>

        <div class="dropdown" id="menuDropdown">
            <p><?php echo $_SESSION['username']; ?></p>

            <a href="#">Profil</a>

            <form action="logout.php" method="POST">
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>
</nav>
