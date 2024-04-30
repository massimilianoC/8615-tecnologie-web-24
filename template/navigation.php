<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">My social network</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link <?php isActive("home") ?>" href="index.php?page=home">Home</a></li>
        <?php if(isUserLoggedIn()) : ?>
        <li class="nav-item"><a aria-current="page" class="nav-link <?php isActive("userprofile") ?>" href="index.php?page=userprofile&iduser=<?php echo $_SESSION["user"]["idUSER"] ?>">My Profile</a></li>
        <li class="nav-item"><a aria-current="page" class="nav-link <?php isActive("userprofile") ?>" href="index.php?page=users">Users</a></li>
        <li class="nav-item"><a aria-current="page" class="nav-link <?php isActive("userprofile") ?>" href="index.php?page=logout">Log Out</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>