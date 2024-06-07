<section class="user-profile">
    <h2>Profilo</h2>
    <section class="identity">
            <?php if($template_data["userProfile"]["imageUrl"]!="") $userImg = UPLOAD_DIR.$template_data["userProfile"]["imageUrl"]; else  $userImg=DEFAULT_IMG_PROFILE ?>
            <div class="user image main-profile d-flex justify-content-center"><img class="user main-profile" src="<?php echo $userImg; ?>" alt=""></div>
            <h2 class="user name d-flex justify-content-center"><?php echo $template_data["userProfile"]["nome"]." ".$template_data["userProfile"]["cognome"]; ?></h2>
    </section>
    <?php
        require("template/followers.php"); 
    ?>
    <hr>
    <section class="posts collection">
        <h3>Pubblicazioni</h3>
        <?php
            if($_SESSION["user"]["idUSER"]==$template_data["userProfile"]["idUSER"])
            {
            require("template/post-form.php"); 
            }
        ?>
        <?php
            require("template/posts-archive.php"); 
        ?>
    </section>
</section>