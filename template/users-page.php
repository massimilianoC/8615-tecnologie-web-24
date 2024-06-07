<section>
    <h2>Utenti</h2>
    <ul class="list-group">
        <?php foreach($template_data["users"] as $utente): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center user list item">
                <a href="index.php?page=userprofile&iduser=<?php echo $utente["idUSER"]; ?>">
                <?php if($utente["imageUrl"]!="") $userImg = UPLOAD_DIR.$utente["imageUrl"]; else  $userImg=DEFAULT_IMG_PROFILE ?>
                <span><img class="user profile" src="<?php echo $userImg; ?>" alt=""></span>
                <?php echo $utente["nome"]; ?> <?php echo $utente["cognome"]; ?></a>
                <?php $mySelf = $_SESSION['user']['idUSER'] ==  $utente["idUSER"] ? 1:0; ?>
                <?php if($mySelf ==0) : ?>
                    <?php $amIFollowing = 0; ?>
                    <?php foreach($template_data["following"] as $followed): ?>
                        <?php if($utente["idUSER"]==$followed["idUSER"]) $amIFollowing = 1 ?>
                    <?php endforeach; ?>
                        <form id="form-follow-<?php echo $utente["idUSER"]?>" action="#" method="POST">
                            <input id="fkFollower-<?php echo $utente["idUSER"]?>" class="hidden" type="number" name="fkFollower" value=<?php echo $_SESSION['user']['idUSER'] ?>>
                            <input id="fkFollowed-<?php echo $utente["idUSER"]?>" class="hidden" type="number" name="fkFollowed" value=<?php echo $utente["idUSER"]  ?> >
                            <input id="doAction-<?php echo $utente["idUSER"]?>" class="hidden" type="number" name="doFollow" value=<?php if($amIFollowing==1) echo 0; else echo 1 ?>  >
                            <button id="user<?php echo $utente["idUSER"]?>" class="follow-button btn-sm btn btn-<?php if($amIFollowing==1) echo 'outline-secondary'; else echo 'primary' ?>"  type="button">
                                <?php if($amIFollowing==1) echo '<i class="bi bi-x-circle"></i> Unfollow'; else echo '<i class="bi bi-plus-circle"></i> Follow' ?>
                            </button>
                        </form>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</section>