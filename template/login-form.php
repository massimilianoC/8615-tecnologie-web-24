<section>
    <form action="login.php" method="POST">
        <h2>Login</h2>
        <?php if(isset($_SESSION['template']["errorelogin"])): ?>
        <p><?php echo $_SESSION['template']["errorelogin"]; ?></p>
        <?php endif; ?>
        <ul>
            <li>
                <label for="email">Email:</label><input type="text" id="email" name="email" />
            </li>
            <li>
                <label for="password">Password:</label><input type="password" id="password" name="password" />
            </li>
            <li>
                <input type="submit" name="submit" value="Invia" />
            </li>
        </ul>
    </form>
</section>
<hr />
<section>
    <a href="index.php?page=register"><button class="btn btn-primary">Registrati</button></a>
</section>