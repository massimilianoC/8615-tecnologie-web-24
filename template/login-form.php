<section class="form" id="login-form">
<h1>Login</h1>
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
<h1>Registrazione</h1>
<ul class="list-group">
    <li class="list-group-item" >
      <span>Non sei ancora iscritto/a? </span><a class="btn btn-secondary" href="index.php?page=register">Registrati</a>
    </li>
</ul>
</section>