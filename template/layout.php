<!DOCTYPE html>
<html lang="it">
<head>
    <!-- Bootstrap CSS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="./css/main.css" />
    <title><?php echo $_SESSION['template']["titolo"]; ?></title>
    <script src="javascript/functions.js"></script> 
</head>
<body>
    <header>
    <?php
        require("template/navigation.php"); 
        ?>
    </header>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>