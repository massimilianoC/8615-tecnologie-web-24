<section>
    <form action="login.php" method="POST">
        <h2>Login</h2>
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