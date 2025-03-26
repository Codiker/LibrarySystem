<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h1>Listado de Préstamos</h1>
<a href="/biblioteca/public/index.php?action=agregarPrestamo">Agregar Préstamo</a>

<table border="1">
    <thead>
        <tr>
            <th>Libro</th>
            <th>Usuario</th>
            <th>Fecha de Préstamo</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($prestamos)): ?>
            <?php foreach ($prestamos as $prestamo): ?>
                <tr>
                    <td><?php echo htmlspecialchars($prestamo->getLibro()); ?></td>
                    <td><?php echo htmlspecialchars($prestamo->getUsuario()); ?></td>
                    <td><?php echo htmlspecialchars($prestamo->getFechaPrestamo()); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">No hay préstamos registrados.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>