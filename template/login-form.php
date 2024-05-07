<section class="form" id="login-form">
    <form action="login.php" method="POST">
        <h2>Login</h2>
        <ul class="list-group">
            <li class="list-group-item" >
                <label for="email" class="form-label">Email:</label><input type="text" id="email" name="email" class="form-control" aria-describedby="emailHelp"/>
            </li>
            <li class="list-group-item">
                <label for="password" class="form-label">Password:</label><input type="password" class="form-control" id="password" name="password" />
            </li>
            <li class="list-group-item">
                <button type="submit" class="btn btn-primary float-end" name="submit">Invia</button>
            </li>
        </ul>
    </form>
</section>
<hr />
<section>
<ul class="list-group">
    <li class="list-group-item" >
    <label for="register" class="form-label">Non sei ancora iscritto/a?</label>
        <a href="index.php?page=register"><button class="btn btn-secondary" name="register">Registrati</button></a>
    </li>
</ul>
</section>