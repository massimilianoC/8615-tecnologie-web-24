<section class="followers">
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
  Followers
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
  </ul>
</div>
    <h4></h4>
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
</section>
<section class="following">
<button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
</section>