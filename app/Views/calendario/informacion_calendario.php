<!-- Página Informativa: Calendario - Optimizada -->
<section class="informacion-calendario">
    <div class="container py-5">
        <div class="row gy-4">
            <!-- Primer Cajón: Información Principal -->
            <div class="col-lg-6">
                <div class="cajon p-4 bg-light rounded shadow-sm h-100">
                    <h2 class="titulo-seccion text-center mb-4">Seguimiento de tu Ánimo</h2>
                    <p class="descripcion-principal text-center mb-4">
                        Registra tu estado de ánimo diario y lleva un control de tus emociones a lo largo del tiempo.
                        Con nuestro intuitivo módulo de calendario, podrás identificar patrones emocionales y comprender
                        mejor tu bienestar emocional.
                    </p>
                    <div>
                        <img src="<?php echo RUTA_BASE; ?>assets/imagenes/module-01.jpg" alt="Análisis de Pensamientos" class="img-calendario">
                    </div>
                    <div class="cta-box text-center py-3">
                        <a href="<?php echo RUTA_PUBLICA; ?>" class="btn btn-primary btn-lg px-5 py-3 rounded-pill shadow-sm">
                        🌟 Quiero unirme 🌟
                        </a>
                    </div>
                </div>
            </div>

            <!-- Segundo Cajón: Beneficios -->
            <div class="col-lg-6">
                <div class="cajon p-4 bg-light rounded shadow-sm h-100">
                    <h3 class="subtitulo-beneficios text-center mb-4">¿Qué beneficios obtendrás?</h3>
                    <ul class="lista-beneficios">
                        <li><i class="fas fa-check-circle texto-primario"></i> Registro diario de tus emociones.</li>
                        <li><i class="fas fa-chart-line texto-primario"></i> Visualización de tu progreso emocional.</li>
                        <li><i class="fas fa-lightbulb texto-primario"></i> Identificación de factores emocionales.</li>
                        <li><i class="fas fa-heart texto-primario"></i> Sugerencias personalizadas.</li>
                        <li><i class="fas fa-comments texto-primario"></i> Compartir tu progreso con profesionales.</li>
                    </ul>
                </div>
            </div>

            <!-- Módulos Relacionados -->
            <div class="col-12">
                <div class="modulos-relacionados p-4 bg-light rounded shadow-sm">
                    <h3 class="text-center mb-4">Complementa tu experiencia con:</h3>
                    <div class="row gy-3">
                        <div class="col-md-4">
                            <div class="modulo-item p-3 bg-white rounded h-100 text-center">
                                <i class="fas fa-book fs-1 mb-3 texto-primario"></i>
                                <h4>Diario de Reflexiones</h4>
                                <p>Complementa tu registro emocional con pensamientos y reflexiones diarias.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="modulo-item p-3 bg-white rounded h-100 text-center">
                                <i class="fas fa-tasks fs-1 mb-3 texto-primario"></i>
                                <h4>Actividades de Bienestar</h4>
                                <p>Actividades recomendadas según tu estado emocional actual.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="modulo-item p-3 bg-white rounded h-100 text-center">
                                <i class="fas fa-users fs-1 mb-3 texto-primario"></i>
                                <h4>Comunidad de Apoyo</h4>
                                <p>Conecta con personas que comparten experiencias similares.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Estilos Adicionales -->
    <style>
        .informacion-calendario {
            font-family: 'Nunito', sans-serif;
            color: #333;
        }

        .titulo-seccion {
            font-weight: 700;
            color: #4a6bff;
            border-bottom: 3px solid #4a6bff;
            display: inline-block;
            padding-bottom: 10px;
        }

        .texto-primario {
            color: #4a6bff;
        }

        .descripcion-principal {
            font-size: 1.1rem;
            line-height: 1.7;
        }

        .cajon {
            background: #fff;
            transition: all 0.3s ease;
        }

        .cajon:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .lista-beneficios {
            list-style: none;
            padding-left: 0;
        }

        .lista-beneficios li {
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            font-size: 1rem;
        }

        .lista-beneficios i {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .btn-primary {
            background-color: #4a6bff;
            border-color: #4a6bff;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #3a5ae8;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(74, 107, 255, 0.4);
        }

        .modulo-item {
            background: #f8f9fa;
            transition: all 0.3s ease;
        }

        .modulo-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .img-calendario {
            width: 100%;
            border-radius: 12px;
            display: block;
            margin: 0 auto 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            max-height: 400px;
            object-fit: cover;

        }

        /* Diseño Responsivo */
        @media (max-width: 992px) {
            .row {
                flex-direction: column;
            }
        }
    </style>
</section>