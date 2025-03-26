<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h1>Editar Préstamo</h1>
<form method="POST" action="/biblioteca/public/index.php?action=editarPrestamo&id=<?php echo $prestamo->getId(); ?>">
    <label for="libro">Libro:</label>
    <select name="libro" required>
        <?php foreach ($libros as $libro): ?>
            <option value="<?php echo htmlspecialchars($libro->getTitulo()); ?>" <?php echo ($libro->getTitulo() === $prestamo->getLibro()) ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($libro->getTitulo()); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br>
    <label for="usuario">Usuario:</label>
    <select name="usuario" required>
        <?php foreach ($usuarios as $usuario): ?>
            <option value="<?php echo htmlspecialchars($usuario->getNombre()); ?>" <?php echo ($usuario->getNombre() === $prestamo->getUsuario()) ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($usuario->getNombre()); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br>
    <label for="fechaPrestamo">Fecha de Préstamo:</label>
    <input type="date" name="fechaPrestamo" value="<?php echo htmlspecialchars($prestamo->getFechaPrestamo()); ?>" required>
    <br>
    <button type="submit">Guardar Cambios</button>
</form>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>