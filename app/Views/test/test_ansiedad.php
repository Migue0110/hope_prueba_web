<title>Test de Ansiedad</title>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
    }

    .instructions {
        margin-bottom: 20px;
    }
</style>

<h1>Test de Ansiedad</h1>
<div class="instructions">
    <p>
        La siguiente es una lista de síntomas que las personas suelen experimentar.
        En el espacio a la derecha de la tabla, califique (con el puntaje indicado abajo)
        cuánto le ha molestado ese síntoma o problema durante la última semana:
    </p>
    <p>
        <strong>0 = De ningún modo</strong>,
        <strong>1 = Un poco</strong>,
        <strong>2 = Moderadamente</strong>,
        <strong>3 = Mucho</strong>.
    </p>
</div>
<div>
    <form id="test_ansiedad">
        <table>
            <thead>
                <tr>
                    <th>Síntoma</th>
                    <th>0 - De ningún modo</th>
                    <th>1 - Un poco</th>
                    <th>2 - Moderadamente</th>
                    <th>3 - Mucho</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($preguntas as $pregunta): ?>
                    <tr data-id="<?= $pregunta->id ?>">
                        <td><?= $pregunta->pregunta ?></td>
                        <td><input type="radio" name="respuesta_<?= $pregunta->id ?>" value="0" class="form-check-input">
                        </td>
                        <td><input type="radio" name="respuesta_<?= $pregunta->id ?>" value="1" class="form-check-input">
                        </td>
                        <td><input type="radio" name="respuesta_<?= $pregunta->id ?>" value="2" class="form-check-input">
                        </td>
                        <td><input type="radio" name="respuesta_<?= $pregunta->id ?>" value="3" class="form-check-input">
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <button type="submit" class="submit-btn">Enviar Respuestas</button>
    </form>
</div>
<script>
    /**
     * ? Funcion para enviar las respuestas del test al controlador
     * @return void
     */
    $(document).ready(function() {
        $('#test_ansiedad').submit(function(e) {
            e.preventDefault();

            let respuestas = [];

            $('#test_ansiedad tbody tr').each(function() {
                let id = $(this).data('id');
                let respuesta = $(this).find('input:checked').val();

                respuestas.push({
                    id_pregunta: id,
                    puntaje: parseInt(respuesta)
                });
            });
            
            //? Enviar las respuestas al controlador
            $.ajax({
                type: 'POST',
                url: RUTA_PUBLICA + 'test/encuesta_ansiedad',
                dataType: 'json',
                data: {
                    respuestas: respuestas
                },

                success: function(data) {
                    
                    if (data['resp'] == 1) {
                        Swal.fire({
                            icon: "success",
                            title: "Exito",
                            html: data.msg
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