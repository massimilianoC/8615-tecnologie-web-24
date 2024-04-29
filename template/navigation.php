<nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <?php if(isUserLoggedIn()) : ?>
            <li><a href="index.php?page=userprofile&idUSER="<?php echo $_SESSION["user"]["idUSER"] ?>>My Profile</a></li>
            <li><a href="index.php?page=logout</a></li>
            <?php endif; ?>
        </ul>
</nav>