<form action="register.php" method="POST">
    <h2>Registration</h2>
    <ul class="list-group">
        <li class="list-group-item">
            <label class="form-label" class="form-control" for="nome">Nome:</label><input type="text" id="nome" name="nome" />
        </li>
        <li class="list-group-item">
            <label class="form-label" class="form-control" for="cognome">Cognome:</label><input type="text" id="cognome" name="cognome" />
        </li>
        <li class="list-group-item">
            <label class="form-label" class="form-control" for="email">Email:</label><input type="text" id="email" name="email" aria-describedby="emailHelp" />
        </li>
        <li class="list-group-item">
            <label class="form-label" class="form-control" for="password">Password:</label><input type="password" id="password" name="password" />
        </li>
        <li class="list-group-item">
            <button  type="submit" name="submit" class="btn btn-primary">Registrati</button>
        </li>
    </ul>
</form>