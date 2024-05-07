<section class="followers">
    <h4>Followers</h4>
    <ul class="list-group">
        <?php foreach($_SESSION['template']["followers"] as $utente): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center user list item">
                <a href="index.php?page=userprofile&iduser=<?php echo $utente["idUSER"]; ?>">
                <?php if($utente["imageUrl"]!="") $userImg = UPLOAD_DIR.$utente["imageUrl"]; else  $userImg=DEFAULT_IMG_PROFILE ?>
                <span><img class="user profile" src="<?php echo $userImg; ?>" alt="" /></span>
                <?php echo $utente["nome"]; ?> <?php echo $utente["cognome"]; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
<section class="following">
    <h4>Following</h4>
    <ul class="list-group">
        <?php foreach($_SESSION['template']["following"] as $utente): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center user list item">
                <a href="index.php?page=userprofile&iduser=<?php echo $utente["idUSER"]; ?>">
                <?php if($utente["imageUrl"]!="") $userImg = UPLOAD_DIR.$utente["imageUrl"]; else  $userImg=DEFAULT_IMG_PROFILE ?>
                <span><img class="user profile" src="<?php echo $userImg; ?>" alt="" /></span>
                <?php echo $utente["nome"]; ?> <?php echo $utente["cognome"]; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</section>