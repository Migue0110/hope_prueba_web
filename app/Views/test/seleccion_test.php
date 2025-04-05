<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Test</title>
    <style>
        /* Estilos aplicados solo al contenido de la página */
        .content {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 50px;
            flex-wrap: wrap;
        }
        .test-option {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.1);
            max-width: 350px;
            text-align: center;
            transition: transform 0.3s ease;
        }
        .test-option:hover {
            transform: scale(1.05);
        }
        .test-option img {
            width: 100%;
            border-radius: 8px;
        }
        .test-option h2 {
            font-size: 22px;
            margin: 15px 0;
            color: #004AAD;
        }
        .test-option p {
            font-size: 15px;
            color: #555;
        }

    </style>
</head>
<body>
    <div class="content">
        <h1>Selecciona el Test</h1>

        <div class="container">
            <div class="test-option">
                <img src="<?php echo RUTA_BASE; ?>assets/imagenes/test_ansiedad.jpeg" alt="Test de Ansiedad">
                <h2>Test de Ansiedad</h2>
                <p>Evalúa tus niveles de ansiedad basándose en el test de Burns.</p>
                <br>
                <a href="<?php echo RUTA_PUBLICA; ?>test/test_ansiedad" class="btn btn-primary">Realizar Test</a>
            </div>

            <div class="test-option">
                <img src="<?php echo RUTA_BASE; ?>assets/imagenes/test_depresion.jpeg" alt="Test de Depresión">
                <h2>Test de Depresión</h2>
                <p>Determina el nivel de síntomas depresivos con el test de Burns.</p>
                <br>
                <a href="<?php echo RUTA_PUBLICA; ?>test/test_depresion" class="btn btn-primary">Realizar Test</a>
            </div>
        </div>
    </div>
</body>
</html>
