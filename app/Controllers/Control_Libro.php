<?php
require_once __DIR__ . '/../Models/biblioteca.php';
require_once __DIR__ . '/../Models/libro.php';

class LibroController {
    public function index() {
        $libros = Libro::cargarLibros();
        require_once __DIR__ . '/../views/libros/index.php';
    }
// cuando se llama a la funcion agregar no sirve esa vaina ARREGLAR!!!
    public function agregar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'];
            $autor = $_POST['autor'];
            $materia = $_POST['materia'];
            Biblioteca::agregarLibro($titulo, $autor, $materia);
            header('Location: /biblioteca/public/index.php?action=libros');
        }
        require_once __DIR__ . '/../views/libros/agregar.php';
    }
    public function buscar() {
        $resultados = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $criterio = $_POST['criterio'];
            $valor = $_POST['valor'];
    
            switch ($criterio) {
                case 'titulo':
                    $resultados = Libro::buscarPorTitulo($valor);
                    break;
                case 'autor':
                    $resultados = Libro::buscarPorAutor($valor);
                    break;
                case 'materia':
                    $resultados = Libro::buscarPorMateria($valor);
                    break;
            }
        }
        require_once __DIR__ . '/../views/libros/buscar.php';
    }
    public function eliminarLibro() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['titulo'])) {
            $titulo = $_GET['titulo'];
            $libros = Libro::cargarLibros();
            $libros = array_filter($libros, function($libro) use ($titulo) {
                return $libro->getTitulo() !== $titulo;
            });
            file_put_contents(STORAGE_PATH . 'libros.txt', serialize($libros));
            echo json_encode(['success' => true]);
            exit();
        }
        echo json_encode(['success' => false]);
        exit();
    }
    
    public function obtenerLibro() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['titulo'])) {
            $titulo = $_GET['titulo'];
            $libros = Libro::cargarLibros();
            foreach ($libros as $libro) {
                if ($libro->getTitulo() === $titulo) {
                    echo json_encode([
                        'titulo' => $libro->getTitulo(),
                        'autor' => $libro->getAutor(),
                        'materia' => $libro->getMateria()
                    ]);
                    exit();
                }
            }
        }
        echo json_encode([]);
        exit();
    }
    
    public function editarLibro() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tituloOriginal = $_POST['tituloOriginal'];
            $titulo = $_POST['titulo'];
            $autor = $_POST['autor'];
            $materia = $_POST['materia'];
    
            $libros = Libro::cargarLibros();
            foreach ($libros as $libro) {
                if ($libro->getTitulo() === $tituloOriginal) {
                    $libro->setTitulo($titulo);
                    $libro->setAutor($autor);
                    $libro->setMateria($materia);
                    break;
                }
            }
            file_put_contents(STORAGE_PATH . 'libros.txt', serialize($libros));
            echo json_encode(['success' => true]);
            exit();
        }
        echo json_encode(['success' => false]);
        exit();
    }
}
