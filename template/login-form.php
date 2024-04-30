<section>
    <form action="login.php" method="POST">
        <h2>Login</h2>
        <?php if(isset($_SESSION['template']["errorelogin"])): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert" >
                <?php echo $_SESSION['template']["errorelogin"]; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <ul class="list-group">
            <li class="list-group-item" >
                <label for="email">Email:</label><input type="text" id="email" name="email" />
            </li>
            <li class="list-group-item">
                <label for="password">Password:</label><input type="password" id="password" name="password" />
            </li>
            <li class="list-group-item">
                <button type="submit" class="btn btn-primary" name="submit">Invia</button>
            </li>
        </ul>
    </form>
</section>
<hr />
<section>
    <a href="index.php?page=register"><button class="btn btn-secondary">Registrati</button></a>
</section>