<form action="login.php" method="POST">
    <h2>Login</h2>
    <?php if(isset($templateParams["errorelogin"])): ?>
    <p><?php echo $templateParams["errorelogin"]; ?></p>
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
<hr />
<form action="register.php" method="GET">
    <li>
        <input type="button" name="register" value="Registrati" />
    </li>
</form>