<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h1>Buscar Libro</h1>
<form method="POST" action="/biblioteca/public/index.php?action=buscarLibro">
    <label for="criterio">Criterio:</label>
    <select name="criterio">
        <option value="titulo">Título</option>
        <option value="autor">Autor</option>
        <option value="materia">Materia</option>
    </select>
    <br>
    <label for="valor">Valor:</label>
    <input type="text" name="valor" required>
    <br>
    <button type="submit">Buscar</button>
</form>

<?php if (!empty($resultados)): ?>
<h2>Resultados</h2>
<table>
    <tr>
        <th>Título</th>
        <th>Autor</th>
        <th>Materia</th>
        <th>Acciones</th> 
    </tr>
    <?php foreach ($resultados as $libro): ?>
    <tr>
        <td><?php echo $libro->getTitulo(); ?></td>
        <td><?php echo $libro->getAutor(); ?></td>
        <td><?php echo $libro->getMateria(); ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>