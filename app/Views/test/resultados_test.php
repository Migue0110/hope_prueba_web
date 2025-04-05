<div class="result-container">
    <h2 class="result-title">Resultados del Test</h2>
    <div class="result-details">
        <p><span class="result-label">Puntaje Total:</span> <span class="result-value"><?php echo $puntaje; ?></span></p>
        <p><span class="result-label">Valoración:</span> <span class="result-value"><?php echo $valoracion; ?></span></p>
    </div>
    
    <!-- Botón condicional si el puntaje es mayor a 30 -->
    <?php if ($puntaje > 30): ?>
        <button onclick="window.location.href='<?php echo RUTA_PUBLICA; ?>auto_ayuda';" class="return-btn">Recursos de Autoayuda
        </button>
    <?php endif; ?>

    <button onclick="window.location.href='<?php echo RUTA_PUBLICA; ?>pagina_principal';" class="return-btn">Volver a la página principal</button>
</div>
