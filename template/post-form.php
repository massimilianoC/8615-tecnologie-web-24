<form id="form-post" method="post" action="new-post.php" name="post-form" enctype="multipart/form-data">
<ul class="form post">
    <li class="post post-single-item shadow">
        <ul class="collection posts detail">
            <?php if($_SESSION["user"]["imageUrl"]!="") $userImg = UPLOAD_DIR.$_SESSION["user"]["imageUrl"]; else  $userImg=DEFAULT_IMG_PROFILE ?>
            <li class="post-element header">
                <a href="index.php?page=userprofile&iduser=<?php echo $_SESSION["user"]["idUSER"]; ?>"><span><img class="user profile" src="<?php echo $userImg; ?>" alt="" ></span>
                <span class="user name"><?php echo $_SESSION["user"]["nome"]." ".$_SESSION["user"]["cognome"]; ?></span></a>
            </li>
            <li class="post-element input text"><textarea class="form-control" placeholder="A cosa stai pensando? ..." name="text" cols="45" rows="2" required ></textarea></li>
            <li class="post-element preview input media"><div class="post-element"></div></li>
            <li class="hidden form input"><input type="text" id="idUSER" name="idUSER" value="<?php echo $_SESSION["user"]["idUSER"]; ?>" ></li>
            <li class="hidden form input"><input type="number" id="isComment" name="isComment" value=0 ></li>
            <li class="hidden form input"><input type="number" id="fkParent" name="fkParent" value=0 ></li>
            <li class="post-element input function buttons"><input class="form-control upload post media button" type="file" id="mediaUpload" name="media" accept="image/png, image/jpeg, image/jpg, video/mp4" capture="environment" ></li>
            <li class="post-element save function buttons"><button class="btn btn-primary save post button">Pubblica</button></li>
        </ul>
    </li>
</ul>
</form>