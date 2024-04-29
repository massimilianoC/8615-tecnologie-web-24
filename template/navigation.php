<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="#">My social network</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li lass="nav-item <?php isActive("home") ?>"><a class="nav-link" href="index.php?page=home">Home</a></li>
            <?php if(isUserLoggedIn()) : ?>
            <li class="nav-item <?php isActive("userprofile") ?>"><a class="nav-link" href="index.php?page=userprofile&iduser=<?php echo $_SESSION["user"]["idUSER"] ?>">My Profile</a></li>
            <li class="nav-item <?php isActive("users") ?>"><a class="nav-link" href="index.php?page=users">Users</a></li>
            <li class="nav-item <?php isActive("logout") ?>"><a class="nav-link" href="index.php?page=logout">Log Out</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>