<?php
$getPagina = filter_input(INPUT_GET, 'pag', FILTER_DEFAULT);
?>

<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="vendor/jquery/jquery.min.js"></script>
    <title>Hello, world!</title>
</head>

<body>
    <!-- container principal -->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

            <a class="navbar-brand" href="index.php">
            <img src="img/foto1.png" alt="" width="30" height="24" class="d-inline-block align-text-top">      
                Home
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?pag=vendedores/vendedor.php">Vendedor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?pag=make/make.php">Makes</a>
                    </li>
                </ul>
            </div>
        </nav>

        
        <?php
        if (!empty($getPagina)) {
            require_once __DIR__ . "/paginas/" . strip_tags(trim($getPagina));
        } else {
            require_once __DIR__ . "/paginas/" . "home/home.php";
        }
        ?>


    </div>
    <!-- fim container principal -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
            
     <!-- Custom scripts for all pages-->
    
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

    <script src="js/ajax.js"></script>
</body>

</html>