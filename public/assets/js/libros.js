// Eliminar libro
document.querySelectorAll('.btn-eliminar').forEach(button => {
    button.addEventListener('click', function() {
        const titulo = this.getAttribute('data-titulo');

        Swal.fire({
            title: '¿Estás seguro?',
            text: `¿Quieres eliminar el libro "${titulo}"?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/biblioteca/public/index.php?action=eliminarLibro&titulo=${encodeURIComponent(titulo)}`, {
                    method: 'GET'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById(`libro-${titulo}`).remove();
                        Swal.fire(
                            '¡Eliminado!',
                            'El libro ha sido eliminado.',
                            'success'
                        );
                    } else {
                        Swal.fire(
                            'Error',
                            'No se pudo eliminar el libro.',
                            'error'
                        );
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire(
                        'Error',
                        'Hubo un problema al eliminar el libro.',
                        'error'
                    );
                });
            }
        });
    });
});

// Editar libro
document.querySelectorAll('.btn-editar').forEach(button => {
    button.addEventListener('click', function() {
        const titulo = this.getAttribute('data-titulo');
        fetch(`/biblioteca/public/index.php?action=obtenerLibro&titulo=${encodeURIComponent(titulo)}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('tituloOriginal').value = data.titulo;
                document.getElementById('titulo').value = data.titulo;
                document.getElementById('autor').value = data.autor;
                document.getElementById('materia').value = data.materia;
                new bootstrap.Modal(document.getElementById('modalEditar')).show();
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire(
                    'Error',
                    'No se pudo cargar la información del libro.',
                    'error'
                );
            });
    });
});

// Guardar cambios al editar
document.getElementById('formEditar').addEventListener('submit', function(event) {
    event.preventDefault();
    const formData = new FormData(this);
    fetch('/biblioteca/public/index.php?action=editarLibro', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire(
                '¡Guardado!',
                'El libro ha sido actualizado.',
                'success'
            ).then(() => {
                location.reload(); 
            });
        } else {
            Swal.fire(
                'Error',
                'No se pudo actualizar el libro.',
                'error'
            );
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire(
            'Error',
            'Hubo un problema al actualizar el libro.',
            'error'
        );
    });
});