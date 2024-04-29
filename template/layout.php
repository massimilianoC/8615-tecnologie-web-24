<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $_SESSION['template']["titolo"]; ?></title>
    <link rel="stylesheet" type="text/css" href="./css/main.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="javascript/functions.js"></script> 
</head>
<body>
    <header>
        <h1>My Social Network</h1>
    </header>
        <?php
        require("template/navigation.php"); 
        ?>
    <main>
    <?php
    if(isset($_SESSION['template']["nome"])){
        require($_SESSION['template']["nome"]);
    }
    ?>
    </main>
    <footer>
        <p>Tecnologie Web - A.A. 2022/2023</p>
    </footer>
</body>
</html>