<ul>
    <?php foreach($templateParams["posts"] as $post) : ?>
    <?php if($post["isComment"]==0) : ?>
    <?php $postOwner = $dbh->getUserByUserId($post["fkUser"]);?>
            <li>
                <ul>
                    <li>
                        <span><img src="<?php echo UPLOAD_DIR.$postOwner["imageUrl"]; ?>" alt="" /></span>
                        <span><a href="userProfile.php?id=<?php echo $postOwner["idUSER"]; ?>"><?php echo $postOwner["nome"]." ".$postOwner["cognome"]; ?></a></span>
                    </li>
                    <?php if($post["mediaUrl"]!="") : ?>
                         <li><img class="post image" src="<?php echo UPLOAD_DIR.$post["mediaUrl"]; ?>" alt="" /></li>
                    <?php endif; ?>
                    <li><a href="post.php?id=<?php echo $post["idPOST"]; ?>"><?php echo $post["text"]; ?></a></li>
                </ul>
            </li>
    <?php endif; ?>        
    <?php endforeach; ?>
</ul>