<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul class="navbar-nav mr-auto">
            <li lass="nav-item <?php isActive("home") ?>"><a href="index.php?page=home">Home</a></li>
            <?php if(isUserLoggedIn()) : ?>
            <li class="nav-item <?php isActive("userprofile") ?>"><a href="index.php?page=userprofile&iduser=<?php echo $_SESSION["user"]["idUSER"] ?>">My Profile</a></li>
            <li class="nav-item <?php isActive("users") ?>"><a href="index.php?page=users">Users</a></li>
            <li class="nav-item <?php isActive("logout") ?>"><a href="index.php?page=logout">Log Out</a></li>
            <?php endif; ?>
        </ul>
</nav>