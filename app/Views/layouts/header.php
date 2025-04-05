<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>H.O.P.E</title>
    <link rel="icon" href="<?php echo RUTA_BASE; ?>assets/imagenes/hope_icon.png">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo RUTA_BASE; ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?php echo RUTA_BASE; ?>assets/css/fontawesome.css">
    <link rel="stylesheet" href="<?php echo RUTA_BASE; ?>assets/css/templatemo-woox-travel.css">
    <link rel="stylesheet" href="<?php echo RUTA_BASE; ?>assets/css/owl.css">
    <link rel="stylesheet" href="<?php echo RUTA_BASE; ?>assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<script>
var RUTA_PUBLICA = "<?php echo RUTA_PUBLICA; ?>";
</script>

<style>
.ajusteheader {
    min-height: calc(100vh - 120px);
    padding-top: 7rem;
}
</style>

<?php $usuario = session()->get('usuario'); ?>
<header class="header-area header-sticky">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="<?php echo RUTA_BASE; ?>public/pagina_principal" class="lo
                    go">
                        <img src="<?php echo RUTA_BASE; ?>assets/imagenes/HOPE_pp.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <?php              
                        if (!$usuario): 
                        ?>
                            <li><a href="<?php echo RUTA_PUBLICA; ?>">Login</a></li>
                        <?php else: ?>
                            <li><a href="<?php echo RUTA_BASE; ?>public/pagina_principal" class="active">Home</a></li>
                            <li><a href="<?php echo RUTA_BASE; ?>public/calendario" class="active">Calendario</a></li>
                            <li><a href="<?php echo RUTA_BASE; ?>public/analizador_textos" class="active">Analizador</a></li>
                            <li><a href="<?php echo RUTA_BASE; ?>public/test/seleccion_test" class="active">Tests</a></li>
                            <li><a href="<?php echo RUTA_BASE; ?>public/auto_ayuda" class="active">Autoayuda</a></li>
                            <li>
                                <div class="dropdown perfil">
                                    <button class="btn btn-light dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-person-circle"></i> 
                                        <?php echo htmlspecialchars($usuario->nombre); // Mostrar el nombre del usuario ?>
                                    </button>
                                    <ul class="dropdown-menu text-dark">
                                        <li><a class="text-dark" href="<?php echo RUTA_PUBLICA; ?>login/salir">Cerrar sesión</a></li>
                                    </ul>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>

<div class="container-fluid ajusteheader">