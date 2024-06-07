<section class="form" id="login-form">
<h2>Login</h2>
    <form action="login.php" method="POST">
        <ul class="list-group">
            <li class="list-group-item" >
                <label for="email" class="form-label">Email:</label>
                <input type="text" id="email" name="email" class="form-control" aria-describedby="email">
            </li>
            <li class="list-group-item">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
            </li>
            <li class="list-group-item">
                <label for="submit" class="form-label hidden">Accedi</label>
                <button type="submit" class="btn btn-primary float-end"  id="submit" name="submit">Accedi</button>
            </li>
        </ul>
    </form>
</section>
<hr>
<section>
<h2>Registrazione</h2>
<ul class="list-group">
    <li class="list-group-item" >
        <form action="index.php?page=register">
            <label for="register" class="form-label">Non sei ancora iscritto/a?</label>
            <input class="btn btn-secondary" type="submit" id="register" name="register" value="Registrati">
        </form>
    </li>
</ul>
</section>