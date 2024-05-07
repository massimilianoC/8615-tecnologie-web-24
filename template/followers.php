<section class="followers d-flex">
<div class="dropdown flex-fill">
  <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
  Followers
  </button>
  <ul class="dropdown-menu">
        <?php foreach($_SESSION['template']["followers"] as $utente): ?>
            <li class="user list item ">
                <a class="dropdown-item" href="index.php?page=userprofile&iduser=<?php echo $utente["idUSER"]; ?>">
                <?php if($utente["imageUrl"]!="") $userImg = UPLOAD_DIR.$utente["imageUrl"]; else  $userImg=DEFAULT_IMG_PROFILE ?>
                <span><img class="user profile" src="<?php echo $userImg; ?>" alt="" /></span>
                <?php echo $utente["nome"]; ?> <?php echo $utente["cognome"]; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<div class="dropdown flex-fill">
<button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
  Following
  </button>
    <ul class="dropdown-menu">
        <?php foreach($_SESSION['template']["following"] as $utente): ?>
            <li class="user list item">
                <a class="dropdown-item" href="index.php?page=userprofile&iduser=<?php echo $utente["idUSER"]; ?>">
                <?php if($utente["imageUrl"]!="") $userImg = UPLOAD_DIR.$utente["imageUrl"]; else  $userImg=DEFAULT_IMG_PROFILE ?>
                <span><img class="user profile" src="<?php echo $userImg; ?>" alt="" /></span>
                <?php echo $utente["nome"]; ?> <?php echo $utente["cognome"]; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
</section>