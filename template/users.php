<section>
    <h2>Utenti</h2>
    <ul class="list-group">
        <?php foreach($_SESSION['template']["users"] as $utente): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="index.php?page=userprofile&iduser=<?php echo $utente["idUSER"]; ?>"><?php echo $utente["nome"]; ?> <?php echo $utente["cognome"]; ?></a>
                <span class="badge badge-primary badge-pill">+</span>
            </li>
        <?php endforeach; ?>
    </ul>
</section>