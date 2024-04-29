<section class="user-profile">
    <section class="identity">
            <?php if($_SESSION["template"]["userProfile"]["imageUrl"]!="") $userImg = UPLOAD_DIR.$_SESSION['template']["userProfile"]["imageUrl"]; else  $userImg=DEFAULT_IMG_PROFILE ?>
            <div class="user image profile"><img class="user profile" src="<?php echo $userImg; ?>" alt="" /></div>
            <div class="user name"><?php echo $_SESSION['template']["userProfile"]["nome"]." ".$_SESSION['template']["userProfile"]["cognome"]; ?></div>
    </section>
    <section class="followers">
    </section>
    <section class="following">
    </section>
    <section class="posts collection">
        <?php
            if($_SESSION["user"]["idUSER"]==$_SESSION['template']["userProfile"]["idUser"])
            {
            require("template/post-form.php"); 
            }
        ?>
        <?php
            require("template/posts.php"); 
        ?>
    </section>
</section>