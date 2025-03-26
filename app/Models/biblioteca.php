<?php
require_once __DIR__ . '/libro.php';
require_once __DIR__ . '/usuario.php';
require_once __DIR__ . '/prestamo.php';
class Biblioteca {
    public static function agregarLibro($titulo, $autor, $materia) {
        $libro = new Libro($titulo, $autor, $materia);
        $libro->guardar();
    }

    public static function agregarUsuario($nombre, $email) {
        $usuario = new Usuario($nombre, $email);
        $usuario->guardar();
    }

    public static function agregarPrestamo($libro, $usuario, $fechaPrestamo) {
        $prestamo = new Prestamo($libro, $usuario, $fechaPrestamo);
        $prestamo->guardar();
    }
}