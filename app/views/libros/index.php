<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="container mt-5">
    <h1 class="mb-4">Listado de Libros</h1>
    <a href="/biblioteca/public/index.php?action=agregarLibro" class="btn btn-success mb-3">Agregar Libro</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Materia</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($libros)): ?>
                <?php foreach ($libros as $libro): ?>
                    <tr id="libro-<?php echo $libro->getTitulo(); ?>">
                        <td><?php echo htmlspecialchars($libro->getTitulo()); ?></td>
                        <td><?php echo htmlspecialchars($libro->getAutor()); ?></td>
                        <td><?php echo htmlspecialchars($libro->getMateria()); ?></td>
                        <td>
                            <button class="btn btn-warning btn-sm btn-editar" data-titulo="<?php echo htmlspecialchars($libro->getTitulo()); ?>">Editar</button>
                            <button class="btn btn-danger btn-sm btn-eliminar" data-titulo="<?php echo htmlspecialchars($libro->getTitulo()); ?>">Eliminar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">No hay libros registrados.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarLabel">Editar Libro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditar">
                    <input type="hidden" id="tituloOriginal" name="tituloOriginal">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título:</label>
                        <input type="text" id="titulo" name="titulo" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="autor" class="form-label">Autor:</label>
                        <input type="text" id="autor" name="autor" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="materia" class="form-label">Materia:</label>
                        <input type="text" id="materia" name="materia" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>