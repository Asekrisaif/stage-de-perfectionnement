<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Line Charts</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
</head>
<body>
    <h1 style="text-align:center;color:red;">Graphique des compteurs</h1>
    <div style="width: 900px; margin:auto;">
        <canvas id="chart"></canvas>
    </div>
    
    <script>
        var ctx = document.getElementById('chart').getContext('2d');
        var userchart = new Chart(ctx, {
            type: 'bar', // Correction du type de graphique en 'line'
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: {!! json_encode($datasets) !!}
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        position: 'left', // Déplacer la légende vers la gauche
                        align: 'start' // Aligner la légende sur le début (gauche)
                    }
                }
            }
        });
    </script>
    
</body>
</html>
