<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php?page=home"><i class="bi bi-chat-left-quote-fill"></i> Social Share</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if(isUserLoggedIn()) : ?>
        <li><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Notifiche <span class="badge text-bg-secondary">4</span></button></li>
        <li class="nav-item"><a class="nav-link <?php isActive("home") ?>" href="index.php?page=home"><i class="bi bi-house"></i> Home</a></li>
        <li class="nav-item"><a aria-current="page" class="nav-link <?php isActive("userprofile") ?>" href="index.php?page=userprofile&iduser=<?php echo $_SESSION["user"]["idUSER"] ?>"><i class="bi bi-person-circle"></i> Profilo</a></li>
        <li class="nav-item"><a aria-current="page" class="nav-link <?php isActive("users") ?>" href="index.php?page=users"><i class="bi bi-people"></i> Utenti</a></li>
        </ul>
        <div class="nav-item d-flex justify-content-end"><a aria-current="page" class="nav-link <?php isActive("login") ?>" href="index.php?page=logout"><button type="button" class="btn btn-primary"><i class="bi bi-power"></i> Log Out</button></a></div>
        <?php else: ?>
        <li class="nav-item"><a aria-current="page" class="nav-link <?php isActive("login") ?>" href="index.php?page=login"><i class="bi bi-key"></i> Log In</a></li>
        <li class="nav-item"><a aria-current="page" class="nav-link <?php isActive("register") ?>" href="index.php?page=register"><i class="bi bi-door-open"></i> Register</a></li>
        </ul>
        <?php endif; ?>
    </div>
  </div>
</nav>