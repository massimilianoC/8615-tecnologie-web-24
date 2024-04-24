<ul class="collection posts">
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
                        <?php $postComments = $dbh->getCommentsByPostId($post["idPOST"]);?>
                        <?php if(count($postComments)>0) : ?>
                            <section class="comments">
                                <ul class="collection posts">
                                <?php foreach($postComments as $comment) : ?>
                                        <?php $commentOwner = $dbh->getUserByUserId($comment["fkUser"]);?>
                                            <li>
                                                <ul>
                                                    <li>
                                                        <span><img src="<?php echo UPLOAD_DIR.$commentOwner["imageUrl"]; ?>" alt="" /></span>
                                                        <span><a href="userProfile.php?id=<?php echo $commentOwner["idUSER"]; ?>"><?php echo $commentOwner["nome"]." ".$commentOwner["cognome"]; ?></a></span>
                                                    </li>
                                                    <?php if($comment["mediaUrl"]!="") : ?>
                                                        <li><img class="post image" src="<?php echo UPLOAD_DIR.$comment["mediaUrl"]; ?>" alt="" /></li>
                                                    <?php endif; ?>
                                                    <li><a href="post.php?id=<?php echo $comment["idPOST"]; ?>"><?php echo $comment["text"]; ?></a></li>
                                                </ul>
                                            </li>       
                                <?php endforeach; ?>
                                </ul>
                            </section>
                        <?php endif; ?>     
                    </li>
        <?php endif; ?>        
    <?php endforeach; ?>
</ul>