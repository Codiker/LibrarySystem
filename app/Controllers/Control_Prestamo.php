<?php

require_once __DIR__ . '/../Models/prestamo.php';
require_once __DIR__ . '/../Models/libro.php';
require_once __DIR__ . '/../Models/usuario.php';

class PrestamoController {
    public function index() {
        $prestamos = Prestamo::cargarPrestamos();
        require_once __DIR__ . '/../views/prestamos/index.php';
    }
    public function agregar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $libro = $_POST['libro'];
            $usuario = $_POST['usuario'];
            $fechaPrestamo = $_POST['fechaPrestamo'];
            if (empty($libro) && empty($usuario) && empty($fechaPrestamo)) {
                echo "Datos recibidos: ";
                print_r($_POST);
            } else {

                Biblioteca::agregarPrestamo($libro, $usuario, $fechaPrestamo);
            }
            
            header('Location: /biblioteca/public/index.php?action=prestamos');
        }
        $libros = Libro::cargarLibros();
        $usuarios = Usuario::cargarUsuarios();
        require_once __DIR__ . '/../views/prestamos/agregar.php';
    }
    
}