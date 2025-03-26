<?php

require_once __DIR__ . '/../Models/usuario.php';
require_once __DIR__ . '/../Models/biblioteca.php';

class UsuarioController {
    public function index() {
        $usuarios = Usuario::cargarUsuarios();
        require_once __DIR__ . '/../views/usuarios/index.php';
    }
    public function agregar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            Biblioteca::agregarUsuario($nombre, $email);
            header('Location: /biblioteca/public/index.php?action=usuarios');
        }
        require_once __DIR__ . '/../views/usuarios/agregar.php';
    }
}