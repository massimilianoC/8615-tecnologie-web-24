<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $sessionParams["titolo"]; ?></title>
    <link rel="stylesheet" type="text/css" href="./css/main.css" />
</head>
<body>
    <header>
        <h1>Blog di Tecnologie Web</h1>
    </header>
    <nav>
        <ul>
            <li>Home</li>
        </ul>
    </nav>
    <main>
    <?php
    if(isset($sessionParams["nome"])){
        require($sessionParams["nome"]);
    }
    ?>
    </main><aside>
        <section>
            <h2>Tutti i Post</h2>
            <ul>
            <?php foreach($sessionParams["posts"] as $post): ?>
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
            <?php foreach($sessionParams["users"] as $utente): ?>
                <li><a href="userProfile.php?id=<?php echo $utente["idUSER"]; ?>"><?php echo $utente["nome"]; ?> <?php echo $utente["cognome"]; ?></a></li>
            <?php endforeach; ?>
            </ul>
        </section>
    </aside>
    <footer>
        <p>Tecnologie Web - A.A. 2022/2023</p>
    </footer>
</body>
</html>