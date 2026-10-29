document.addEventListener('DOMContentLoaded', () => {
    // [PHP/BD]: Estos datos (semanas y porcentajes) se inyectarán desde el controlador de Laravel
    // Ejemplo: const datosEvolucion = @json($progresoSemanas);
    
    const etiquetasSemanas = ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4', 'Sem 5', 'Sem 6'];
    const datosRendimiento = [0, 60, 72, 68, 80, 85]; // Porcentajes

    // Inicializar gráfica con Chart.js
    const ctx = document.getElementById('rendimientoChart').getContext('2d');

    // Crear un gradiente azul para rellenar debajo de la línea
    const gradientFill = ctx.createLinearGradient(0, 0, 0, 300);
    gradientFill.addColorStop(0, 'rgba(37, 99, 235, 0.2)'); // Azul claro transparente
    gradientFill.addColorStop(1, 'rgba(37, 99, 235, 0)');   // Transparente al fondo

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: etiquetasSemanas,
            datasets: [{
                label: 'Puntaje promedio (%)',
                data: datosRendimiento,
                borderColor: '#1d4ed8', // Color azul fuerte de la línea
                borderWidth: 2,
                backgroundColor: gradientFill,
                fill: true, // Rellena el área bajo la curva
                tension: 0.4, // Curvatura suave de la línea
                pointBackgroundColor: '#ffffff',
                pointBorderColor: '#1d4ed8',
                pointBorderWidth: 2,
                pointRadius: 4,
                pointHoverRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false // Oculta la leyenda superior para igualar el diseño
                },
                tooltip: {
                    backgroundColor: '#1e293b',
                    padding: 10,
                    titleFont: { size: 13, family: 'Inter' },
                    bodyFont: { size: 13, family: 'Inter' },
                    displayColors: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100, // Máximo 100%
                    ticks: {
                        stepSize: 25, // Marcas en 0, 25, 50, 75, 100
                        color: '#94a3b8',
                        font: { size: 11, family: 'Inter' }
                    },
                    grid: {
                        color: '#f1f5f9', // Líneas sutiles horizontales
                        drawBorder: false
                    }
                },
                x: {
                    ticks: {
                        color: '#94a3b8',
                        font: { size: 11, family: 'Inter' }
                    },
                    grid: {
                        display: false, // Oculta las líneas verticales de la cuadrícula
                        drawBorder: true,
                        borderColor: '#e2e8f0'
                    }
                }
            }
        }
    });
});