<section>
    <h2>Utenti</h2>
    <ul>
    <?php foreach($templateParams["users"] as $utente): ?>
        <li><a href="userProfile.php?id=<?php echo $utente["idUSER"]; ?>"><?php echo $utente["nome"]; ?> <?php echo $utente["cognome"]; ?></a></li>
    <?php endforeach; ?>
    </ul>
</section>