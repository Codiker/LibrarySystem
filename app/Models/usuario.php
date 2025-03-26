<?php

class Usuario {
    private $nombre;
    private $email;

    public function __construct($nombre, $email) {
        $this->nombre = $nombre;
        $this->email = $email;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getEmail() {
        return $this->email;
    }

    public function guardar() {
        $usuarios = self::cargarUsuarios();
        $usuarios[] = $this;
        file_put_contents(STORAGE_PATH . 'usuarios.txt', serialize($usuarios));
    }

    public static function cargarUsuarios() {
        if (file_exists(STORAGE_PATH . 'usuarios.txt')) {
            return unserialize(file_get_contents(STORAGE_PATH . 'usuarios.txt'));
        }
        return [];
    }
}