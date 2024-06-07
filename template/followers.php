<section class="followers d-flex">
    <h6>Amici</h6>
<div class="dropdown flex-fill d-flex justify-content-center">
  <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" <?php if(count($template_data["followers"])==0) echo 'disabled' ?>>
  <i class="bi bi-people-fill"></i> Followers <span class="badge rounded-pill text-bg-secondary"><?php echo count($template_data["followers"]) ?></span>
  </button>
  <ul class="dropdown-menu">
        <?php foreach($template_data["followers"] as $utente): ?>
            <li class="user list item ">
                <a class="dropdown-item" href="index.php?page=userprofile&iduser=<?php echo $utente["idUSER"]; ?>">
                <?php if($utente["imageUrl"]!="") $userImg = UPLOAD_DIR.$utente["imageUrl"]; else  $userImg=DEFAULT_IMG_PROFILE ?>
                <span><img class="user profile" src="<?php echo $userImg; ?>" alt="" ></span>
                <?php echo $utente["nome"]; ?> <?php echo $utente["cognome"]; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<div class="dropdown flex-fill d-flex justify-content-center">
<button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" <?php if(count($template_data["following"])==0) echo 'disabled' ?> >
<i class="bi bi-person-fill-add"></i> Following <span class="badge rounded-pill text-bg-secondary"><?php echo count($template_data["following"]) ?></span>
  </button>
    <ul class="dropdown-menu">
        <?php foreach($template_data["following"] as $utente): ?>
            <li class="user list item">
                <a class="dropdown-item" href="index.php?page=userprofile&iduser=<?php echo $utente["idUSER"]; ?>">
                <?php if($utente["imageUrl"]!="") $userImg = UPLOAD_DIR.$utente["imageUrl"]; else  $userImg=DEFAULT_IMG_PROFILE ?>
                <span><img class="user profile" src="<?php echo $userImg; ?>" alt="" ></span>
                <?php echo $utente["nome"]; ?> <?php echo $utente["cognome"]; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
</section>