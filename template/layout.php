<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $templateParams["titolo"]; ?></title>
    <link rel="stylesheet" type="text/css" href="./css/main.css" />
    <script src=".javascript/functions.js"></script> 
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
    if(isset($templateParams["nome"])){
        require($templateParams["nome"]);
    }
    ?>
    </main>
    <footer>
        <p>Tecnologie Web - A.A. 2022/2023</p>
    </footer>
</body>
</html>