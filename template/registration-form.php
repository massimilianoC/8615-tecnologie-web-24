<section>
    <form action="register.php" method="POST">
        <h2>Registration</h2>
        <ul class="list-group">
            <li class="list-group-item">
                <label class="form-label" for="nome">Nome:</label><input class="form-control"  type="text" id="nome" name="nome" />
            </li>
            <li class="list-group-item">
                <label class="form-label"  for="cognome">Cognome:</label><input class="form-control" type="text" id="cognome" name="cognome" />
            </li>
            <li class="list-group-item">
                <label class="form-label"  for="email">Email:</label><input class="form-control" type="text" id="email" name="email" aria-describedby="emailHelp" />
            </li>
            <li class="list-group-item">
                <label class="form-label"  for="password">Password:</label><inputclass="form-control"  type="password" id="password" name="password" />
            </li>
            <li class="list-group-item">
                <button  type="submit" name="submit" class="btn btn-primary">Registrati</button>
            </li>
        </ul>
    </form>
</section>