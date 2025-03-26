<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../app/Controllers/Control_Libro.php';
require_once __DIR__ . '/../app/Controllers/Control_Usuario.php';
require_once __DIR__ . '/../app/Controllers/Control_Prestamo.php';

$action = $_GET['action'] ?? 'libros';

switch ($action) {
    case 'libros':
        $controller = new LibroController();
        $controller->index();
        break;
    case 'agregarLibro':
        $controller = new LibroController();
        $controller->agregar();
        break;
    case 'eliminarLibro':
        $controller = new LibroController();
        $controller->eliminarLibro();
        break;
    case 'obtenerLibro':
        $controller = new LibroController();
        $controller->obtenerLibro();
        break;
    case 'editarLibro':
        $controller = new LibroController();
        $controller->editarLibro();
        break;
    case 'buscarLibro':
        $controller = new LibroController();
        $controller->buscar();
        break;
    case 'usuarios':
        $controller = new UsuarioController();
        $controller->index();
        break;
    case 'agregarUsuario':
        $controller = new UsuarioController();
        $controller->agregar();
        break;
    case 'prestamos':
        $controller = new PrestamoController();
        $controller->index();
        break;
    case 'agregarPrestamo':
        $controller = new PrestamoController();
        $controller->agregar();
        break;

    default:
        echo "Página no encontrada";
        break;
}
