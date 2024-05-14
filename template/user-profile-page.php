<section class="user-profile">
    <section class="identity">
            <?php if($template_data["userProfile"]["imageUrl"]!="") $userImg = UPLOAD_DIR.$template_data["userProfile"]["imageUrl"]; else  $userImg=DEFAULT_IMG_PROFILE ?>
            <div class="user image main-profile d-flex justify-content-center"><img class="user main-profile" src="<?php echo $userImg; ?>" alt="" /></div>
            <h1 class="user name d-flex justify-content-center"><?php echo $template_data["userProfile"]["nome"]." ".$template_data["userProfile"]["cognome"]; ?></h1>
    </section>
    <?php
        require("template/followers.php"); 
    ?>
    <hr/>
    <section class="posts collection">
        <?php
            if($_SESSION["user"]["idUSER"]==$template_data["userProfile"]["idUSER"])
            {
            require("template/post-form.php"); 
            }
        ?>
        <?php
            require("template/posts.php"); 
        ?>
    </section>
</section>