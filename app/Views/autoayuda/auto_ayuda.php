<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recursos de Autoayuda</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f0f8ff;
            color: #333;
        }
        main {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            background: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        h2, h3 {
            color: #007bff;
            text-align: center;
        }
        .resources {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 20px;
        }
        .resource-item {
            background: #e9f5ff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
        iframe {
            border-radius: 12px;
            width: 100%;
            max-width: 100%;
        }
        @media (max-width: 600px) {
            .resources {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<main>
    <section>
        <h2>Encuentra herramientas para mejorar tu bienestar</h2>
        <p style="text-align: center;">Accede a libros, música y otros recursos especialmente seleccionados para ti.</p>

        <div class="resources">
            <div class="resource-item">
                <h3>Libros</h3>
                <p><a href="https://www.gutenberg.org/" target="_blank">Explora libros gratuitos aquí.</a></p>
            </div>

            <div class="resource-item">
                <h3>Música Relajante</h3>
                <iframe src="https://open.spotify.com/embed/playlist/37i9dQZF1DWZd79rJ6a7lp" height="380" frameborder="0" allow="encrypted-media"></iframe>
            </div>

            <div class="resource-item">
                <h3>Ejercicios de Relajación</h3>
                <p>Próximamente disponibles...</p>
            </div>

            <div class="resource-item">
                <h3>Playlist Adicional</h3>
                <iframe src="https://open.spotify.com/embed/playlist/5ObtcKzW5VzdE3S8tQ7ge1?utm_source=generator&theme=0" height="352" frameborder="0" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>
            </div>
        </div>
    </section>
</main>