<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h1>Agregar Usuario</h1>
<form method="POST" action="/biblioteca/public/index.php?action=agregarUsuario">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <br>
    <button type="submit">Agregar</button>
</form>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>