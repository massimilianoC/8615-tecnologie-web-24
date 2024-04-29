<section>
    <h2>Utenti</h2>
    <ul class="list-group">
        <?php foreach($_SESSION['template']["users"] as $utente): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="index.php?page=userprofile&iduser=<?php echo $utente["idUSER"]; ?>"><?php echo $utente["nome"]; ?> <?php echo $utente["cognome"]; ?></a>
                <?php $mySelf = $_SESSION['user']['idUSER'] ==  $utente["idUSER"] ? 1:0; ?>
                <?php if($mySelf ==0) : ?>
                    <?php $amIFollowing = 0; ?>
                    <?php foreach($_SESSION['template']["following"] as $followed): ?>
                        <?php if($utente["idUSER"]==$followed["idUSER"]) $amIFollowing = 1 ?>
                    <?php endforeach; ?>
                    <span class="badge badge-<?php if($amIFollowing==1) echo 'secondary'; else echo 'primary' ?> badge-pill">
                        <a><?php if($amIFollowing==1) echo 'Unfollow'; else echo 'Follow' ?></a>
                    </span>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</section>