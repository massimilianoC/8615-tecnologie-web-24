<section>
    <h2>Utenti</h2>
    <ul>
    <?php foreach($_SESSION['template']["users"] as $utente): ?>
        <li><a href="index.php?page=userprofile&iduser=<?php echo $utente["idUSER"]; ?>"><?php echo $utente["nome"]; ?> <?php echo $utente["cognome"]; ?></a></li>
    <?php endforeach; ?>
    </ul>
</section>