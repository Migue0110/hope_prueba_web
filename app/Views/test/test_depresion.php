<title>Test de Depresión</title>
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

<h1>Test de Depresión</h1>
<div class="instructions">
    <p>
        La siguiente es una lista de síntomas que las personas suelen experimentar.
        En el espacio a la derecha de la tabla, califique (con el puntaje indicado abajo)
        cuánto le ha molestado ese síntoma o problema durante la última semana:
    </p>
    <p>
        <strong>0 = Para nada</strong>,
        <strong>1 = Algo así</strong>,
        <strong>2 = Moderadamente</strong>,
        <strong>3 = Mucho</strong>,
        <strong>4 = Extremadamente</strong>.
    </p>
</div>

<form id="test_depresion">
    <table>
        <thead>
            <tr>
                <th>Síntoma</th>
                <th>0 - Para nada</th>
                <th>1 - Algo así</th>
                <th>2 - Moderadamente</th>
                <th>3 - Mucho</th>
                <th>4 - Extremadamente</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($preguntas as $pregunta): ?>
                <tr>
                    <td><?= $pregunta->pregunta ?></td>
                    <td>
                        <input class="form-check-input" type="radio" name="respuesta_<?= $pregunta->id ?>" value="0"
                            id="opcion0_<?= $pregunta->id ?>">
                    </td>
                    <td>
                        <input class="form-check-input" type="radio" name="respuesta_<?= $pregunta->id ?>" value="1"
                            id="opcion1_<?= $pregunta->id ?>">
                    </td>
                    <td>
                        <input class="form-check-input" type="radio" name="respuesta_<?= $pregunta->id ?>" value="2"
                            id="opcion2_<?= $pregunta->id ?>">
                    </td>
                    <td>
                        <input class="form-check-input" type="radio" name="respuesta_<?= $pregunta->id ?>" value="3"
                            id="opcion3_<?= $pregunta->id ?>">
                    </td>
                    <td>
                        <input class="form-check-input" type="radio" name="respuesta_<?= $pregunta->id ?>" value="4"
                            id="opcion4_<?= $pregunta->id ?>">
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <button class="submit-btn">Enviar Respuestas</button>
</form>

<script>
    /**
     * ? Funcion para enviar las respuestas del test al controlador
     * @return void
     */
    $(document).ready(function() {
        $('#test_depresion').submit(function(e) {
            e.preventDefault();

            let respuestas = [];

            $('#test_depresion tbody tr').each(function() {
                let id = $(this).data('id');
                let respuesta = $(this).find('input:checked').val();

                respuestas.push({
                    id_pregunta: id,
                    puntaje: parseInt(respuesta) // Asegurar que sea un número
                });
            });

            //? Enviar las respuestas al controlador
            $.ajax({
                type: 'POST',
                url: RUTA_PUBLICA + 'test/encuesta_depresion',
                dataType: 'json',
                data: {
                    respuestas: respuestas
                },
                success: function(data) {
                    if (data['resp'] == 1) {
                        Swal.fire({
                            icon: "success",
                            title: "Exito",
                            html: data.msg,
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