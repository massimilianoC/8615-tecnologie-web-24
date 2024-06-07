<ul class="collection posts">
<!-- POSTS COLLECTION --> 
<?php if(count($template_data["posts"])>0) : ?>
    <?php foreach($template_data["posts"] as $post) : ?>
        <?php $postOwner = $dbh->getUserByUserId($post["fkUser"]);?>
        <?php $postComments = $dbh->getCommentsByPostId($post["idPOST"]);?>
<!-- POST SINGLE ITEM TEMPLATE -->
                <li class="post post-single-item shadow" id="post<?php echo $post["idPOST"]; ?>">
                    <ul class="collection posts detail">
                        <?php if($postOwner["imageUrl"]!="") $userImg = UPLOAD_DIR.$postOwner["imageUrl"]; else  $userImg=DEFAULT_IMG_PROFILE ?>
                        <li class="post-element header">
                        <a href="index.php?page=userprofile&iduser=<?php echo $postOwner["idUSER"]; ?>"><span><img class="user profile" src="<?php echo $userImg; ?>" alt=""></span>
                        <span class="user name"><?php echo $postOwner["nome"]." ".$postOwner["cognome"]; ?></span></a>
                        </li>
                        <li class="post-element text"><?php echo $post["text"]; ?></li>
                        <?php if($post["mediaUrl"]!="") : ?>
                            <li class="post-element media">
                                <img class="post-element image source" src="<?php echo UPLOAD_DIR.$post["mediaUrl"]; ?>" alt="" >
                                <div class="post-element image-background" style="background-image: url('<?php echo UPLOAD_DIR.$post["mediaUrl"]; ?>')" ></div>
                            </li>
                        <?php endif; ?>
                        <li class="post-element function buttons">
                            <button id="show-comments-<?php echo $post["idPOST"]; ?>" name=<?php echo $post["idPOST"]; ?> class="btn btn-secondary show-comment button toggle <?php if(count($postComments)==0){ echo " hidden";} ?>">Commenti <span class="badge rounded-pill text-bg-primary"><?php if(count($postComments)>0){ echo count($postComments);} ?></span></button>
                            <button id="add-comments-<?php echo $post["idPOST"]; ?>" name=<?php echo $post["idPOST"]; ?> class="btn btn-primary add-comment button">Commenta...</button></li>
                        <li class="post-element timestamp"><i class="bi bi-info-circle-fill" data-bs-toggle="tooltip" data-bs-title="post del: <?php echo $post["dataInserimento"]; ?>"></i></li>
                    </ul>
<!-- COMMENTS SECTION -->
                        <section class="comments hidden" id="comment-section-<?php echo $post["idPOST"]; ?>">
                        <h6>Commenti</h6>
                        <form name="post-form" class="comment-post" id="comment-form-<?php echo $post["idPOST"]; ?>" method="post" action="new-post.php" enctype="multipart/form-data">
                            <ul class="collection posts">
<!-- ADD COMMENT FORM -->                                
                            <li class="post comment-form hidden" id="add-comment-form-<?php echo $post["idPOST"]; ?>">
                                <ul class="collection posts detail">
                                  
                                        <?php if($_SESSION["user"]["imageUrl"]!="") $userImg = UPLOAD_DIR.$_SESSION["user"]["imageUrl"]; else  $userImg=DEFAULT_IMG_PROFILE ?>
                                        <li class="post-element header">
                                            <a href="index.php?page=userprofile&iduser=<?php echo $_SESSION["user"]["idUSER"]; ?>"><span><img class="user profile" src="<?php echo $userImg; ?>" alt="" ></span>
                                            <span class="user name"><?php echo $_SESSION["user"]["nome"]." ".$_SESSION["user"]["cognome"]; ?></span></a>
                                        </li>
                                        <li class="post-element input text"><textarea required placeholder="Inserisci il tuo commento ..." name="text" cols="40" rows="2"></textarea></li>
                                        <li class="hidden form input"><input type="text" id="idUSER<?php echo $post["idPOST"]; ?>" name="idUSER" value="<?php echo $_SESSION["user"]["idUSER"]; ?>" ></li>
                                        <li class="hidden form input"><input type="number" id="isComment<?php echo $post["idPOST"]; ?>" name="isComment" value=1 ></li>
                                        <li class="hidden form input"><input type="number" id="fkParent<?php echo $post["idPOST"]; ?>" name="fkParent" value=<?php echo $post["idPOST"]; ?> ></li>
                                        <li class="post-element save function buttons"><input type="submit" value="Pubblica" class="btn btn-primary save post button"></li>
                                   
                                </ul>
                            </li>
<!-- COMMENTS COLLECTION -->    
                            <?php if(count($postComments)>0) : ?>
                            <?php foreach($postComments as $comment) : ?>
                                    <?php $commentOwner = $dbh->getUserByUserId($comment["fkUser"]);?>
                                        <li class="post">
                                            <ul class="collection posts detail">
                                            <?php if($commentOwner["imageUrl"]!="") $cmmImg = UPLOAD_DIR.$commentOwner["imageUrl"]; else $cmmImg=DEFAULT_IMG_PROFILE ?>
                                                <li class="post-element header">
                                                    <a href="index.php?page=userprofile&iduser=<?php echo $commentOwner["idUSER"]; ?>"><span><img class="user profile" src="<?php echo $cmmImg; ?>" alt="" ></span>
                                                    <span class="user name"><?php echo $commentOwner["nome"]." ".$commentOwner["cognome"]; ?></span></a>
                                                </li>
                                                <li class="post-element text"><?php echo $comment["text"]; ?></li>
                                                <?php if($comment["mediaUrl"]!="") : ?>
                                                    <li class="post-element media">
                                                        <img class="post-element image source" src="<?php echo UPLOAD_DIR.$comment["mediaUrl"]; ?>" alt="">
                                                        <div class="post-element image-background" style="background-image: url('<?php echo UPLOAD_DIR.$comment["mediaUrl"]; ?>')"></div>
                                                    </li>
                                                <?php endif; ?>
                                                <li class="post-element timestamp"><i class="bi bi-info-circle-fill" data-bs-toggle="tooltip" data-bs-title="commento del: <?php echo $comment["dataInserimento"]; ?>"></i></li>
                                            </ul>
                                        </li>       
                            <?php endforeach; ?>
                            <?php endif; ?>  
                            </ul>
                        </form>
                        </section>       
                </li>     
    <?php endforeach; ?>
<?php else: ?>
    <?php if(isset($template_data["userProfile"])) : ?>
        <li><span><em><span class="user name"><?php echo $template_data["userProfile"]["nome"]." ".$template_data["userProfile"]["cognome"]; ?></span></em> non ha ancora pubblicato alcun post.</span></li>
    <?php elseif(count($template_data["posts"])==0) : ?>
        <li><span><em>Inizia a <a href="index.php?page=users">seguire un Utente</a> oppure pubblica il tuo primo post.</em></li>
    <?php endif; ?>  
<?php endif; ?>  
</ul>