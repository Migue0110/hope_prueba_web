<h1>Recuperar Contraseña</h1>
<form method="POST" action="<?= base_url('login/sendResetLink') ?>">
    <label for="email">Correo Electrónico:</label>
    <input type="email" name="email" required>
    <button type="submit">Enviar Enlace</button>
</form>