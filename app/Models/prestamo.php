<?php

class Prestamo {
    private $libro;
    private $usuario;
    private $fechaPrestamo;

    public function __construct($libro, $usuario, $fechaPrestamo) {
        $this->libro = $libro;
        $this->usuario = $usuario;
        $this->fechaPrestamo = $fechaPrestamo;
    }

    public function getLibro() {
        return $this->libro;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getFechaPrestamo() {
        return $this->fechaPrestamo;
    }

    public function guardar() {
        $prestamos = self::cargarPrestamos();
        $prestamos[] = $this;
        file_put_contents(STORAGE_PATH . 'prestamos.txt', serialize($prestamos));
    }

    public static function cargarPrestamos() {
        if (file_exists(STORAGE_PATH . 'prestamos.txt')) {
            return unserialize(file_get_contents(STORAGE_PATH . 'prestamos.txt'));
        }
        return [];
    }
}