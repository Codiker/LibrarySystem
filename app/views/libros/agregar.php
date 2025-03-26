<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h1>Agregar Libro</h1>
<form method="POST">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" required>
    <br>
    <label for="autor">Autor:</label>
    <input type="text" name="autor" required>
    <br>
    <label for="materia">Materia:</label>
    <input type="text" name="materia" required>
    <br>
    <button type="submit">Agregar</button>
</form>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>