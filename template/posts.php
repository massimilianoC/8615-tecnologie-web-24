<ul class="collection posts">
    <?php foreach($templateParams["posts"] as $post) : ?>
        <?php $postOwner = $dbh->getUserByUserId($post["fkUser"]);?>
                <li class="post post-single-item">
                    <ul class="collection posts detail">
                        <?php if($postOwner["imageUrl"]!="") $userImg = UPLOAD_DIR.$postOwner["imageUrl"]; else  $userImg=DEFAULT_IMG_PROFILE ?>
                        <li class="post-element header">
                        <a href="userProfile.php?id=<?php echo $postOwner["idUSER"]; ?>"><span><img class="user profile" src="<?php echo $userImg; ?>" alt="" /></span>
                        <span class="user name"><?php echo $postOwner["nome"]." ".$postOwner["cognome"]; ?></span></a>
                        </li>
                        <li class="post-element text"><?php echo $post["text"]; ?></li>
                        <?php if($post["mediaUrl"]!="") : ?>
                            <li class="post-element media"><img class="post-element image" src="<?php echo UPLOAD_DIR.$post["mediaUrl"]; ?>" alt="" /></li>
                        <?php endif; ?>
                        <li class="post-element function buttons"><button class="show-comment button toggle">Show comments</button><button class="add-comment button">Add comment...</button></li>
                        <li class="post-element timestamp"><?php echo $post["dataInserimento"]; ?></li>
                    </ul>
                    <?php $postComments = $dbh->getCommentsByPostId($post["idPOST"]);?>
                    <?php if(count($postComments)>0) : ?>
                        <section class="comments">
                            <ul class="collection posts">
                            <?php foreach($postComments as $comment) : ?>
                                    <?php $commentOwner = $dbh->getUserByUserId($comment["fkUser"]);?>
                                        <li class="post">
                                            <ul class="collection posts detail">
                                            <?php if($commentOwner["imageUrl"]!="") $cmmImg = UPLOAD_DIR.$commentOwner["imageUrl"]; else $cmmImg=DEFAULT_IMG_PROFILE ?>
                                                <li class="post-element header">
                                                    <a href="userProfile.php?id=<?php echo $commentOwner["idUSER"]; ?>"><span><img class="user profile" src="<?php echo $cmmImg; ?>" alt="" /></span>
                                                    <span class="user name"><?php echo $commentOwner["nome"]." ".$commentOwner["cognome"]; ?></span></a>
                                                </li>
                                                <li class="post-element text"><?php echo $comment["text"]; ?></li>
                                                <?php if($comment["mediaUrl"]!="") : ?>
                                                    <li class="post-element media">
                                                        <img class="post-element image source" src="<?php echo UPLOAD_DIR.$comment["mediaUrl"]; ?>" alt="" />
                                                        <span class="post-element image-background" style="background-image: <?php echo UPLOAD_DIR.$comment["mediaUrl"]; ?>" alt="" />
                                                    </li>
                                                <?php endif; ?>
                                                <li class="post-element timestamp"><?php echo $comment["dataInserimento"]; ?></li>
                                            </ul>
                                        </li>       
                            <?php endforeach; ?>
                            </ul>
                        </section>
                    <?php endif; ?>     
                </li>     
    <?php endforeach; ?>
</ul>