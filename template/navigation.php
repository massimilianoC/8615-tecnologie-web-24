<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><i class="bi bi-chat-left-quote-fill"></i> My social network</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link <?php isActive("home") ?>" href="index.php?page=home"><i class="bi bi-house"></i> Home</a></li>
        <?php if(isUserLoggedIn()) : ?>
        <li class="nav-item"><a aria-current="page" class="nav-link <?php isActive("userprofile") ?>" href="index.php?page=userprofile&iduser=<?php echo $_SESSION["user"]["idUSER"] ?>"><i class="bi bi-person-circle"></i> My Profile</a></li>
        <li class="nav-item"><a aria-current="page" class="nav-link <?php isActive("userprofile") ?>" href="index.php?page=users"><i class="bi bi-people"></i> Users</a></li>
        <li class="nav-item"><a aria-current="page" class="nav-link <?php isActive("userprofile") ?>" href="index.php?page=logout"><i class="bi bi-power"></i> Log Out</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>