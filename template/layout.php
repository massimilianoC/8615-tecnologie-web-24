<!DOCTYPE html>
<html lang="it">
<head>
    <!-- Bootstrap CSS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
</body>
</html>