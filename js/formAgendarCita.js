document.addEventListener('DOMContentLoaded', function () {
    const dateInput = document.getElementById('cita');
    const timeInput = document.getElementById('hora');

    // Establecer límites de fecha
    const today = new Date();
    const dayOfWeek = today.getDay(); // día de la semana (0-6)
    const startOfWeek = new Date(today);
    startOfWeek.setDate(today.getDate() - dayOfWeek);
    const endOfWeek = new Date(today);
    endOfWeek.setDate(today.getDate() + (6 - dayOfWeek));

    // Formatear fechas a YYYY-MM-DD
    const formatDate = (date) => date.toISOString().split('T')[0];
    dateInput.min = formatDate(startOfWeek);
    dateInput.max = formatDate(endOfWeek);

    // Limitar el tiempo entre 08:00 AM y 08:00 PM
    timeInput.min = '08:00';
    timeInput.max = '20:00';
    timeInput.step = 3600; // Intervalo de 1 hora en segundos

    // Validar la hora seleccionada
    timeInput.addEventListener('input', function () {
        const selectedTime = timeInput.value;
        const hours = parseInt(selectedTime.split(':')[0]);
        const minutes = parseInt(selectedTime.split(':')[1]);

        // Si los minutos no son cero, ajustarlos a cero
        if (minutes !== 0) {
            timeInput.value = selectedTime.split(':')[0] + ':00';
        }

        // Validar que la hora esté en el rango permitido
        if (hours < 8 || hours > 20) {
            timeInput.setCustomValidity('Por favor seleccione una hora entre las 08:00 AM y las 08:00 PM.');
        } else {
            timeInput.setCustomValidity('');
        }
    });
});