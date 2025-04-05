<!-- Inicio Carrusel -->

<section id="section-1">
    <div class="content-slider">
        <input type="radio" id="banner1" class="sec-1-input" name="banner" checked>
        <input type="radio" id="banner2" class="sec-1-input" name="banner">
        <input type="radio" id="banner3" class="sec-1-input" name="banner">
        <input type="radio" id="banner4" class="sec-1-input" name="banner">
        <div class="slider">
            <div id="top-banner-1" class="banner">
            </div>
            <div id="top-banner-2" class="banner">
            </div>
            <div id="top-banner-3" class="banner">
            </div>
            <div id="top-banner-4" class="banner">
            </div>
        </div>
        <nav>
            <div class="controls">
                <label for="banner1"><span class="progressbar"><span class="progressbar-fill"></span></span><span
                        class="text">1</span></label>
                <label for="banner2"><span class="progressbar"><span class="progressbar-fill"></span></span><span
                        class="text">2</span></label>
                <label for="banner3"><span class="progressbar"><span class="progressbar-fill"></span></span><span
                        class="text">3</span></label>
                <label for="banner4"><span class="progressbar"><span class="progressbar-fill"></span></span><span
                        class="text">4</span></label>
            </div>
        </nav>
    </div>
</section>

<!-- Fin Carrusel -->


<!-- Que es HOPE? -->

<section class="que-es-hope">
    <h2>¿Qué es HOPE?</h2>
    <p>HOPE es una plataforma diseñada para apoyar el autocuidado emocional, ayudándote a combatir la depresión y la
        ansiedad con herramientas personalizadas.</p>
    <div class="features">
        <div class="feature">
            <img src="<?php echo RUTA_BASE; ?>assets/imagenes/seguimiento del bienestar.jpg"
                alt="Seguimiento del bienestar">
            <h3>Seguimiento de tu bienestar</h3>
            <p>Registra y analiza tu estado de ánimo para comprender tus emociones.</p>
        </div>
        <div class="feature">
            <img src="<?php echo RUTA_BASE; ?>assets/imagenes/recursos personalizados.png"
                alt="Recursos personalizados">
            <h3>Recursos personalizados</h3>
            <p>Accede a música y libros para combatir tus necesidades emocionales.</p>
        </div>
        <div class="feature">
            <img src="<?php echo RUTA_BASE; ?>assets/imagenes/tests y contactos.png" alt="tests y contactos">
            <h3>Test y contactos</h3>
            <p>Conecta con tus personas de confianza y realiza test que pueden ayudarte en tu camino hacia el bienestar.
            </p>
        </div>
    </div>
</section>

<!-- Fin de Que es HOPE? -->

<!-- Inicio Sección de Módulos -->

<div class="modules-section">
    <div class="container">
        <div class="section-heading text-center">
            <h2>Explora los Módulos de HOPE</h2>
            <p>Descubre las herramientas que HOPE ofrece para el cuidado emocional y bienestar personal.</p>
        </div>
        <div class="row">
            <!-- Módulo 1 -->
            <div class="col-lg-3 col-md-6">
                <div class="module-card">
                    <div class="image">
                        <img src="<?php echo RUTA_BASE; ?>assets/imagenes/module-01.jpg" alt="Módulo 1">
                    </div>
                    <div class="content">
                        <h4>Seguimiento de Ánimo</h4>
                        <p>Registra tus emociones diarias y obtén un análisis de tus patrones emocionales.</p>
                        <a href="<?php echo RUTA_PUBLICA; ?>calendario/informacion_calendario" class="btn btn-primary">Explorar</a>
                    </div>
                </div>
            </div>
            <!-- Módulo 2 -->
            <div class="col-lg-3 col-md-6">
                <div class="module-card">
                    <div class="image">
                        <img src="<?php echo RUTA_BASE; ?>assets/imagenes/module-02.jpg" alt="Módulo 2">
                    </div>
                    <div class="content">
                        <h4>Análisis de pensamientos</h4>
                        <p>Reflexiona sobre tus pensamientos y analiza lo que transmiten</p>
                        <a href="<?php echo RUTA_PUBLICA; ?>analizadortextos/informacion_analizador" class="btn btn-primary">Explorar</a>
                    </div>
                </div>
            </div>
            <!-- Módulo 3 -->
            <div class="col-lg-3 col-md-6">
                <div class="module-card">
                    <div class="image">
                        <img src="<?php echo RUTA_BASE; ?>assets/imagenes/module-03.jpg" alt="Módulo 3">
                    </div>
                    <div class="content">
                        <h4>Test de Ansiedad y Depresión de Burns</h4>
                        <p>Accede y realiza los test para conocer tu situación actual</p>
                        <a href="<?php echo RUTA_PUBLICA; ?>test/informacion_tests" class="btn btn-primary">Explorar</a>
                    </div>
                </div>
            </div>
            <!-- Módulo 4 -->
            <div class="col-lg-3 col-md-6">
                <div class="module-card">
                    <div class="image">
                        <img src="<?php echo RUTA_BASE; ?>assets/imagenes/module-04.jpg" alt="Módulo 4">
                    </div>
                    <div class="content">
                        <h4>Recursos de Autoayuda</h4>
                        <p>Accede a libros, música y recursos para mejorar tu bienestar emocional.</p>
                        <a href="<?php echo RUTA_PUBLICA; ?>autoayuda/informacion_auto_ayuda" class="btn btn-primary">Explorar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Fin Sección de Módulos -->

<!-- Inicio invitacion registro -->

<section class="registro-invitacion">
    <div class="registro-contenedor">
        <h2> Únete a HOPE 💙 </h2>
        <p>Regístrate y da el primer paso hacia un espacio seguro y lleno de esperanza. Juntos, podemos encontrar las
            herramientas que te ayuden a recuperar tu luz.</p>
        <a href="<?php echo RUTA_PUBLICA;?>" class="btn btn-primary">🌟 Unirme a HOPE 🌟</a>
        <p class="nota">💌 *Tu información estará segura y solo se usará para brindarte apoyo.</p>
    </div>
</section>

<!-- Fin invitacion registro -->