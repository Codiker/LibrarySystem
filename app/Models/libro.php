<?php

class Libro {
    private $titulo;
    private $autor;
    private $materia;

    public function __construct($titulo, $autor, $materia) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->materia = $materia;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function getMateria() {
        return $this->materia;
    }

    public function guardar() {
        $libros = self::cargarLibros(); 
        $libros[] = $this; 
        file_put_contents(STORAGE_PATH . 'libros.txt', serialize($libros)); 
    }

    public static function cargarLibros() {
        if (file_exists(STORAGE_PATH . 'libros.txt')) {
            return unserialize(file_get_contents(STORAGE_PATH . 'libros.txt'));
        }
        return [];
    }

    public static function buscarPorTitulo($titulo) {
        $libros = self::cargarLibros();
        return array_filter($libros, function($libro) use ($titulo) {
            return stripos($libro->getTitulo(), $titulo) !== false;
        });
    }

    public static function buscarPorAutor($autor) {
        $libros = self::cargarLibros();
        return array_filter($libros, function($libro) use ($autor) {
            return stripos($libro->getAutor(), $autor) !== false;
        });
    }

    public static function buscarPorMateria($materia) {
        $libros = self::cargarLibros();
        return array_filter($libros, function($libro) use ($materia) {
            return stripos($libro->getMateria(), $materia) !== false;
        });
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
    
    public function setAutor($autor) {
        $this->autor = $autor;
    }
    
    public function setMateria($materia) {
        $this->materia = $materia;
    }
}