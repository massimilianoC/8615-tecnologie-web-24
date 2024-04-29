<nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <?php if(isUserLoggedIn()) : ?>
            <li><a href="index.php?page=userprofile&iduser=<?php echo $_SESSION["user"]["idUSER"] ?>">My Profile</a></li>
            <li><a href="index.php?page=users">Users</a></li>
            <li><a href="index.php?page=logout">Log Out</a></li>
            <?php endif; ?>
        </ul>
</nav>