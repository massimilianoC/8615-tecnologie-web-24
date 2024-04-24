<ul class="collection posts">
    <?php foreach($templateParams["posts"] as $post) : ?>
        <?php $postOwner = $dbh->getUserByUserId($post["fkUser"]);?>
                <li>
                    <ul>
                        <?php if($postOwner["imageUrl"]!="") $userImg = UPLOAD_DIR.$postOwner["imageUrl"]; else  $userImg="./media/img/default-user-profile.jpg" ?>
                        <li class="post-element header">
                            <span><img class="user profile" src="<?php echo $userImg; ?>" alt="" /></span>
                            <span><a href="userProfile.php?id=<?php echo $postOwner["idUSER"]; ?>"><?php echo $postOwner["nome"]." ".$postOwner["cognome"]; ?></a></span>
                        </li>
                        <?php if($post["mediaUrl"]!="") : ?>
                            <li class="post-element media"><img class="post-element image" src="<?php echo UPLOAD_DIR.$post["mediaUrl"]; ?>" alt="" /></li>
                        <?php endif; ?>
                        <li class="post-element text"><?php echo $post["text"]; ?></li>
                        <li class="post-element function buttons"><button class="show-comment button toggle">Show comments</button></li>
                    </ul>
                    <?php $postComments = $dbh->getCommentsByPostId($post["idPOST"]);?>
                    <?php if(count($postComments)>0) : ?>
                        <section class="comments">
                            <ul class="collection posts">
                            <?php foreach($postComments as $comment) : ?>
                                    <?php $commentOwner = $dbh->getUserByUserId($comment["fkUser"]);?>
                                        <li class="post">
                                            <ul>
                                            <?php if($commentOwner["imageUrl"]!="") $cmmImg = UPLOAD_DIR.$commentOwner["imageUrl"]; else $cmmImg="./media/img/default-user-profile.jpg" ?>
                                                <li class="post-element header">
                                                    <span><img class="user profile" src="<?php echo $cmmImg; ?>" alt="" /></span>
                                                    <span><a href="userProfile.php?id=<?php echo $commentOwner["idUSER"]; ?>"><?php echo $commentOwner["nome"]." ".$commentOwner["cognome"]; ?></a></span>
                                                </li>
                                                <?php if($comment["mediaUrl"]!="") : ?>
                                                    <li class="post-element media"><img class="post-element image" src="<?php echo UPLOAD_DIR.$comment["mediaUrl"]; ?>" alt="" /></li>
                                                <?php endif; ?>
                                                <li class="post-element text"><?php echo $comment["text"]; ?></li>
                                            </ul>
                                        </li>       
                            <?php endforeach; ?>
                            <li class="function add-comment"><button class="add-comment button">Add comment...</button></li>
                            </ul>
                        </section>
                    <?php endif; ?>     
                </li>     
    <?php endforeach; ?>
</ul>