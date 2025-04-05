<div class="welcome-container">
    <h2>¡Bienvenido a HOPE!</h2>
    <p>
        Nos alegra que hayas dado el primer paso. Como es tu primera vez con nosotros,
        queremos conocer tu estado de ánimo actualmente.
        Este pequeño test solo te tomará unos minutos y nos ayudará a entender cómo te sientes.
        En caso de que no quieras realizarlo ahora, puedes posponerlo para el siguiente inicio de sesión.
        ¡Gracias por confiar en nosotros!
    </p>
    <div>
        <button class="btn btn-primary" onclick="startTest()"style="margin-right: 10px;">Comenzar</button><a href="<?php echo RUTA_BASE; ?>public/pagina_principal" class="btn btn-primary">Página Principal</a>
    </div>
    <br>
    <div class="image">
        <img src="<?php echo RUTA_BASE; ?>assets/imagenes/estados_animo.png" alt="estadosAnimo">
    </div>
</div>

<div id="test-container" style="display: none;">
    <h2>TEST INICIAL</h2>
    <form id="encuesta_inicial">
        <div>
            <?php foreach ($preguntas as $pregunta): ?>
                <div class="question-container">
                    <h3 class="question-title"><?= $pregunta->pregunta ?></h3>
                    <div class="custom-radio" data-id="<?php echo $pregunta->id; ?>">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="respuesta_<?= $pregunta->id ?>" value="0"
                                id="opcion0_<?= $pregunta->id ?>">
                            <label class="form-check-label" for="opcion0_<?= $pregunta->id ?>">
                                0 - Casi nunca
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="respuesta_<?= $pregunta->id ?>" value="1"
                                id="opcion1_<?= $pregunta->id ?>">
                            <label class="form-check-label" for="opcion1_<?= $pregunta->id ?>">
                                1 - A veces
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="respuesta_<?= $pregunta->id ?>" value="2"
                                id="opcion2_<?= $pregunta->id ?>">
                            <label class="form-check-label" for="opcion2_<?= $pregunta->id ?>">
                                2 - Bastante
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="respuesta_<?= $pregunta->id ?>" value="3"
                                id="opcion3_<?= $pregunta->id ?>">
                            <label class="form-check-label" for="opcion3_<?= $pregunta->id ?>">
                                3 - Muchas veces
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="respuesta_<?= $pregunta->id ?>" value="4"
                                id="opcion4_<?= $pregunta->id ?>">
                            <label class="form-check-label" for="opcion4_<?= $pregunta->id ?>">
                                4 - Siempre
                            </label>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <button class="submit-btn">Enviar Respuestas</button>
    </form>
</div>

<script>
    /**
     * ? Funcion para ocultar el contenedor de bienvenida y mostrar el contenedor del test
     *  @return void
     */
    function startTest() {
        document.querySelector('.welcome-container').style.display = 'none';
        document.querySelector('#test-container').style.display = 'block';
    }

    /**
     * ? Funcion para enviar las respuestas del test al controlador
     * @return void
     */
    $(document).ready(function() {
        $('#encuesta_inicial').submit(function(e) {
            e.preventDefault();

            //? Recoger el div custom-radio y obtener el valor de la respuesta seleccionada
            let respuestas = [];
            $('.custom-radio').each(function() {
                let respuesta = $(this).find('input:checked').val();
                id = $(this).data('id');
                respuestas.push({
                    id_pregunta: id,
                    puntaje: respuesta
                });
            });

            //? enviar las respuestas al controlador
            $.ajax({
                type: 'POST',
                url: RUTA_PUBLICA + 'test/encuesta_inicial',
                dataType: 'json',
                data: {
                    respuestas: respuestas
                },
                success: function(data) {
                    if (data['resp'] == 1) {
                        Swal.fire({
                            icon: "success",
                            title: "Exito",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = RUTA_PUBLICA + 'test/resultados_test' + '?puntaje=' + data['puntaje'] + '&valoracion=' + data['valoracion'];
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: 'Hay preguntas sin responder',
                        });
                    }
                }
            });
        });
    });
</script>