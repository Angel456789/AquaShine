document.addEventListener('DOMContentLoaded', function() {
    const deleteLinks = document.querySelectorAll('.fa-trash');

    deleteLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const confirmation = confirm('¿Estás seguro de que deseas eliminar esta registro?');
            if (confirmation) {
                // Aquí puedes añadir el código para eliminar la cita
                alert('Eliminado');
            } else {
                // Si se cancela, no hacer nada
                alert('Cancelado');
            }
        });
    });
});
