<form action="register.php" method="POST">
            <h2>Registration</h2>
            <?php if(isset($templateParams["erroreRegistrazione"])): ?>
            <p><?php echo $templateParams["erroreRegistrazione"]; ?></p>
            <?php endif; ?>
            <ul>
                <li>
                    <label for="nome">Nome:</label><input type="text" id="nome" name="nome" />
                </li>
                <li>
                    <label for="cognome">Cognome:</label><input type="text" id="cognome" name="cognome" />
                </li>
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