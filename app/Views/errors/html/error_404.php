<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= lang('Errors.pageNotFound') ?></title>
    <link rel="icon" href="<?php echo RUTA_BASE; ?>assets/imagenes/hope_icon.png">
    <link rel="stylesheet" href="<?php echo RUTA_BASE; ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo RUTA_BASE; ?>assets/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            height: 100%;
            background:rgb(246, 232, 232);
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            color: #777;
            font-weight: 300;
        }

        h1 {
            font-weight: lighter;
            letter-spacing: normal;
            font-size: 3rem;
            margin-top: 0;
            margin-bottom: 0;
            color: #222;
        }

        .container {
            max-width: 1024px;
            margin: auto;
            padding: 2rem;
            text-align: center;
            position: relative;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        /* Animación de gota */
        .drop-animation {
            width: 150px;
            animation: drop 2s infinite ease-in-out;
        }

        @keyframes drop {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(15px);
            }
        }
    </style>
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="text-center">
            <!-- Imagen con animación -->
            <img src="<?php echo RUTA_BASE; ?>assets/imagenes/404_icon.png" alt="404 Icon" class="drop-animation">
            <br>
            <br>
            <br>
            <h1 class="mt-3">¡Ups! Página no encontrada</h1>
            <p class="text-muted">Lo sentimos, no pudimos encontrar la página que estás buscando.</p>
            <p>¿Quizás te gustaría regresar a la página principal?</p>
            <a href="<?php echo RUTA_BASE; ?>public/pagina_principal" class="btn btn-primary mt-3">
                <i class="bi bi-house-door"></i> Ir a Inicio
            </a>
        </div>
    </div>
</body>
</html>

