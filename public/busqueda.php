<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../app/Controllers/Control_Libro.php';

$controller = new LibroController();
$controller->buscar();