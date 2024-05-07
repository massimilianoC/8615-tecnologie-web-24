<section class="user-profile">
    <section class="identity">
            <?php if($_SESSION["template"]["userProfile"]["imageUrl"]!="") $userImg = UPLOAD_DIR.$_SESSION['template']["userProfile"]["imageUrl"]; else  $userImg=DEFAULT_IMG_PROFILE ?>
            <div class="user image main-profile d-flex justify-content-center"><img class="user main-profile" src="<?php echo $userImg; ?>" alt="" /></div>
            <h1 class="user name d-flex justify-content-center"><?php echo $_SESSION['template']["userProfile"]["nome"]." ".$_SESSION['template']["userProfile"]["cognome"]; ?></h1>
    </section>
    <?php
        require("template/followers.php"); 
    ?>
    <hr/>
    <section class="posts collection">
    <h4>Bacheca</h4>
        <?php
            if($_SESSION["user"]["idUSER"]==$_SESSION['template']["userProfile"]["idUSER"])
            {
            require("template/post-form.php"); 
            }
        ?>
        <?php
            require("template/posts.php"); 
        ?>
    </section>
</section>