<?php
require_once "./app/config/dependencias.php";
session_start();
require_once "./app/config/rutas.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= CSS . 'b5.css' ?>">
    <link rel="stylesheet" href="<?= CSS . 'main.css' ?>">
    <link rel="stylesheet" href="<?= CSS . 'font_awesome/all.css' ?>">
    <link rel="stylesheet" href="<?= CSS . 'dt.css' ?>">
    <link rel="stylesheet" href="./public/css/home.css">
    <link rel="stylesheet" href="./public/css/registro.css">
    <script src="<?= JS . "font_awesome/all.js" ?>"></script>
    <script src="<?= JS . "jquery.js" ?>"></script>
    <script src="<?= JS . "sweetAlert.js" ?>"></script>
    <script src="<?= JS . "b5.js" ?>"></script>
    <script src="<?= JS . "dt.js" ?>"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Swiper.js CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php
    require_once './views/navbar.php';
    ?>
    <?php require_once './app/config/router.php'; ?>
    <script src="./public/js/cerrar_sesion.js"></script>
    <script src="./public/js/main.js"></script>
</body>

</html>