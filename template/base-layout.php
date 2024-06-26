<!DOCTYPE html>
<html lang="it">
<head>
    <!-- Bootstrap CSS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <title><?php echo $template_data["titolo"]; ?></title>
    <script src="javascript/functions.js"></script> 
</head>
<body>
    <header class="sticky-top shadow">
    <?php
        require("template/navigation.php"); 
    ?>
    </header>
    <main>
    <?php if(isUserLoggedIn()){
        require("template/notifications.php"); 
    }else{
        require("template/alerts.php"); 
    }
    if(isset($template_data['nome'])){
        require($template_data['nome']);
    }
    ?>
    </main>
    <aside class="d-none d-lg-block">
        
    </aside>
    <footer class="fixed-bottom">
        <?php
            require("template/footer.php"); 
        ?>
    </footer>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>