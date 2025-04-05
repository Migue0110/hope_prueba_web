    <main>
        <h1 id="calendar-title">Mi Calendario de Ánimo</h1>
        <div class="calendar" id="calendar"></div>
        <div id="reflection-container">
            <center>
                <h2>Reflexión del Día</h2>
                <div class="state-buttons">
                    <button class="Bueno" onclick="setMood('Bueno')">😄</button>
                    <button class="Normal" onclick="setMood('Normal')">😐</button>
                    <button class="Malo" onclick="setMood('Malo')">😢</button>
                </div>
                <textarea id="reflection" placeholder="Escribe tu reflexión aquí..."></textarea>
                <button class="save-btn" onclick="saveData()">Guardar</button>
        </div>
        </center>
    </main>

    <script>
        const calendar = document.getElementById('calendar');
        const reflectionContainer = document.getElementById('reflection-container');
        const currentDate = new Date();
        const year = currentDate.getFullYear();
        const month = currentDate.getMonth();
        const monthNames = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        let selectedDay = null;
        let selectedMood = null;

        document.getElementById('calendar-title').textContent = `Mi Calendario de Ánimo - ${monthNames[month]} ${year}`;

        var estados = <?php echo json_encode($estados); ?>;

        for (let i = 1; i <= daysInMonth; i++) {
            const dayElement = document.createElement('div');
            dayElement.classList.add('day');
            dayElement.textContent = i;
            dayElement.setAttribute('data-day', i);
            dayElement.setAttribute('id', 'day' + i);
            dayElement.onclick = () => selectDay(dayElement, i);
            calendar.appendChild(dayElement);
        }

        //? Cargar los estados emocionales del usuario en el calendario
        var descripcion = '';
        var dia_actual = new Date().getDate();

        estados.forEach(estado => {
            const dia = parseInt(estado['dia']);
            const estadoEmocional = estado['estado_emocional'];
            const diaElement = document.getElementById('day' + dia);

            if (diaElement) {
                diaElement.setAttribute('data-id', estado['id_registro']);
                diaElement.classList.add(estadoEmocional);
                diaElement.onclick = () => selectDay(diaElement, dia);

                // Si el día es el actual, guardamos la descripción
                if (dia === dia_actual) {
                    descripcion = estado['descripcion'];
                }
            }
        });

        function selectDay(element, day) {
            const today = currentDate.getDate();
            if (day != today) {
                Swal.fire({
                    icon: "warning",
                    title: "Advertencia",
                    text: "Solo puedes seleccionar el día actual."
                });
                return;
            }
            if (selectedDay) {
                calendar.children[selectedDay - 1].classList.remove('selected-day');
            }
            selectedDay = day;
            element.classList.add('selected-day');
            reflectionContainer.style.display = 'block';
            document.getElementById('reflection').value = descripcion || '';
        }

        function setMood(mood) {
            const selectedElement = calendar.children[selectedDay - 1];
            selectedElement.className = 'day ' + mood;
            selectedMood = mood;
        }

        //? Funcion para guardar el estado de animo y la reflexion del usuario
        function saveData() {
            const reflection = document.getElementById('reflection').value;
            const date = year + "-" + (month + 1) + "-" + selectedDay;
            const mood = selectedMood;
            var id = document.getElementById('day' + selectedDay).getAttribute('data-id');
            $.ajax({
                type: 'POST',
                url: RUTA_PUBLICA + 'calendario/guardar_reflexion',
                dataType: 'json',
                data: {
                    fecha: date,
                    emocion: mood,
                    reflexion: reflection,
                    id_registro: id
                },
                success: function(data) {
                    if (data['resp'] == 1) {
                        Swal.fire({
                            icon: "success",
                            title: "Exito",
                            text: data['msg']
                        });
                        if (result.isConfirmed) {
                            window.location.href = RUTA_PUBLICA + 'pagina_principal';
                        }
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: data['error']
                        });
                    }
                }
            });
        }
    </script>