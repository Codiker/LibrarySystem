<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h1>Listado de Usuarios</h1>
<a href="/biblioteca/public/index.php?action=agregarUsuario">Agregar Usuario</a>

<table border="1">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($usuarios)): ?>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?php echo htmlspecialchars($usuario->getNombre()); ?></td>
                    <td><?php echo htmlspecialchars($usuario->getEmail()); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="2">No hay usuarios registrados.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>