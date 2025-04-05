<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOPE - Análisis de Pensamientos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card-custom {
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s;
            align-items: stretch;
        }

        .card-custom:hover {
            transform: translateY(-5px);
        }

        .card-header-custom {
            background: #358AC7;
            color: white;
            padding: 1.5rem;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            align-items: stretch;
        }

        .btn-primary {
            background-color: #358AC7;
            border: none;
            border-radius: 30px;
            padding: 10px 30px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #2B6F9E;
        }

        .h3,
        .p {
            color: rgb(255, 255, 255);
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <h2 class="text-center mb-4">Reflexiona sobre tus pensamientos</h2>
        <p class="text-center lead">Ingresa tus reflexiones y deja que nuestra tecnología avanzada analice las emociones y sentimientos que transmiten tus palabras.</p>

        <div class="row">
            <!-- Panel Izquierdo -->
            <div class="col-md-6">
                <div class="card card-custom">
                    <div class="card-header-custom">
                        <h3 class="h3"><i class="fas fa-pen-nib"></i> Expresa tus pensamientos</h3>
                        <p class="p">Todo lo que escribas se analizará de forma privada y segura</p>
                    </div>
                    <div class="card-body">
                        <textarea id="thought-input" class="form-control mb-4" placeholder="Escribe aquí..." rows="6"></textarea>
                        <button id="analyze-btn" class="btn btn-primary btn-block">Analizar</button>
                    </div>
                </div>
            </div>

            <!-- Panel Derecho -->
            <div class="col-md-6">
                <div id="analysis-result">
                    <div class="card card-custom">
                        <div class="card-header-custom">
                            <h3 class="h3"><i class="fas fa-clipboard-list"></i> Resultados del análisis</h3>
                        </div>
                        <div class="card-body text-center text-muted" id="default-message">
                            <i class="fas fa-search" style="font-size: 3rem;"></i>
                            <p class="mt-3">Tu análisis aparecerá aquí después de procesar tu texto...</p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="#" class="btn btn-primary">Test Ansiedad</a>
                            <a href="#" class="btn btn-primary">Test Depresión</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features -->
        <div class="row mt-5">
            <div class="col-md-4 mb-4">
                <div class="card card-custom text-center p-4">
                    <i class="fas fa-shield-alt fa-3x mb-3" style="color: #358AC7;"></i>
                    <h4>Privacidad Total</h4>
                    <p>Tus pensamientos permanecen privados y seguros en todo momento.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card card-custom text-center p-4">
                    <i class="fas fa-chart-line fa-3x mb-3" style="color: #358AC7;"></i>
                    <h4>Análisis Profundo</h4>
                    <p>Tecnología avanzada que identifica patrones emocionales sutiles.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card card-custom text-center p-4">
                    <i class="fas fa-lightbulb fa-3x mb-3" style="color: #358AC7;"></i>
                    <h4>Insights Personalizados</h4>
                    <p>Recibe recomendaciones adaptadas a tus patrones emocionales.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("analyze-btn").addEventListener("click", function() {
            const inputText = document.getElementById("thought-input").value.trim();
            const resultContainer = document.getElementById("analysis-result");

            if (inputText === "") {
                alert("Por favor, ingresa un texto antes de analizar.");
                return;
            }

            resultContainer.innerHTML = `
                <div class="card-header-custom">
                    <h3 class="h3"><i class="fas fa-clipboard-list"></i> Resultados del análisis</h3>
                </div>
                <div class="card-body">
                    <p>Se ha realizado el análisis de tus pensamientos. Aquí están los resultados:</p>
                    <ul>
                        <li><strong>Emoción predominante:</strong> Tristeza</li>
                        <li><strong>Porcentaje de depresión:</strong> 65%</li>
                    </ul>
                    <p>Recuerda que siempre hay ayuda y que tus emociones son válidas. No estás solo/a.</p>
                </div>
                <div class="card-footer text-center">
                    <a href="#" class="btn btn-primary">Test Ansiedad</a>
                    <a href="#" class="btn btn-primary">Test Depresión</a>
                </div>
            `;
        });
    </script>
</body>

</html>