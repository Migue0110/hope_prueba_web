<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>H.O.P.E.</title>
    <!-- Icono de la pestaña -->
    <link rel="icon" href="<?php echo RUTA_BASE; ?>assets/imagenes/hope_icon.png">
    <link rel="stylesheet" href="<?php echo RUTA_BASE; ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo RUTA_BASE; ?>assets/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<script>
    var RUTA_PUBLICA = "<?php echo RUTA_PUBLICA; ?>";
</script>


<body>
    <div class="container" id="container">
        <div class="form-container">
            <form id="recuperar">
                <h1>Recuperar Contraseña</h1>
                <span>Ingresa tu correo para recibir un enlace de recuperación</span>
                <input name="correo" type="email" placeholder="Correo" required />
                <button class="mt-3" type="submit">Enviar Enlace</button>
                <a href="<?php echo RUTA_PUBLICA; ?>login">Volver al inicio de sesión</a>
            </form>
        </div>
    </div>
</body>


</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo RUTA_BASE; ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?php echo RUTA_BASE; ?>assets/js/login.js"></script>