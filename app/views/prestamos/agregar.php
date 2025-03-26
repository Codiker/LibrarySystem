<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h1>Agregar Préstamo</h1>
<form method="POST" action="/biblioteca/public/index.php?action=agregarPrestamo">
    <label for="libro">Libro:</label>
    <select name="libro" required>
        <?php foreach ($libros as $libro): ?>
            <option value="<?php echo htmlspecialchars($libro->getTitulo()); ?>">
                <?php echo htmlspecialchars($libro->getTitulo()); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br>
    <label for="usuario">Usuario:</label>
    <select name="usuario" required>
        <?php foreach ($usuarios as $usuario): ?>
            <option value="<?php echo htmlspecialchars($usuario->getNombre()); ?>">
                <?php echo htmlspecialchars($usuario->getNombre()); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br>
    <label for="fechaPrestamo">Fecha de Préstamo:</label>
    <input type="date" name="fechaPrestamo" required>
    <br>
    <button type="submit">Agregar</button>
</form>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>