<form method="post" enctype="multipart/form-data">
<ul class="form post">
    <li class="post post-single-item">
        <ul class="collection posts detail">
            <?php if($_SESSION["user"]["imageUrl"]!="") $userImg = UPLOAD_DIR.$_SESSION["user"]["imageUrl"]; else  $userImg=DEFAULT_IMG_PROFILE ?>
            <li class="post-element header">
                <a href="userProfile.php?id=<?php echo $_SESSION["user"]["idUSER"]; ?>"><span><img class="user profile" src="<?php echo $userImg; ?>" alt="" /></span>
                <span class="user name"><?php echo $_SESSION["user"]["nome"]." ".$_SESSION["user"]["cognome"]; ?></span></a>
            </li>
            <li class="post-element input text"><textarea placeholder="A cosa stai pensando? ..." name="text" cols="40" rows="5"></textarea></li>
            <li class="post-element preview input media"><div class="post-element"  alt="" /></li>
            <li class="post-element input function buttons"><input class="upload post media button" type="file" id="mediaUpload" name="media" accept="image/png, image/jpeg, image/jpg, video/mp4" capture/></li>
            <li class="post-element save function buttons"><button class="save post button">Pubblica</button></li>
        </ul>
    </li>
</ul>
</form>