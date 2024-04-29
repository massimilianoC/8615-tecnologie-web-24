<aside>
        <section>
            <h2>Tutti i Post</h2>
            <ul>
            <?php foreach($_SESSION['template']["posts"] as $post): ?>
                <li>
                    <img src="<?php echo UPLOAD_DIR.$post["mediaUrl"]; ?>" alt="" />
                    <a href="post.php?id=<?php echo $post["idPOST"]; ?>"><?php echo $post["text"]; ?></a>
                </li>
            <?php endforeach; ?>
            </ul>
        </section>
        <section>
            <h2>Utenti</h2>
            <ul>
            <?php foreach($_SESSION['template']["users"] as $utente): ?>
                <li><a href="userProfile.php?id=<?php echo $utente["idUSER"]; ?>"><?php echo $utente["nome"]; ?> <?php echo $utente["cognome"]; ?></a></li>
            <?php endforeach; ?>
            </ul>
        </section>
</aside>