<ul>
    <?php foreach($templateParams["posts"] as $post): ?>
    <?php
        $postOwner = $dbh->getUserByUserId($post["fkUser"]);
    ?>
            <li>
                <ul>
                    <li>
                        <span><img src="<?php echo UPLOAD_DIR.$postOwner["imageUrl"]; ?>" alt="" /></span>
                        <span><a href="userProfile.php?id=<?php echo $postOwner["idUSER"]; ?>"><?php echo $postOwner["nome"]." ".$postOwner["cognome"]; ?></a></span>
                    </li>
                    <li><img src="<?php echo UPLOAD_DIR.$post["mediaUrl"]; ?>" alt="" /></li>
                    <li><a href="post.php?id=<?php echo $post["idPOST"]; ?>"><?php echo $post["text"]; ?></a></li>
                </ul>
                
            </li>
    <?php endforeach; ?>
</ul>