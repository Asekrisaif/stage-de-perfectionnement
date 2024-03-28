<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bar Charts</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
</head>
<body>
    <h1 style="text-align:center;color:red;">Bar de compteur</h1>
    <div style="width: 900px; margin:auto;">
        <canvas id="chart"></canvas>
    </div>
    
    <script>
        var ctx = document.getElementById('chart').getContext('2d');
        var userchart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: {!! json_encode($datasets) !!}
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
     

    </script>
    
</body>
</html>
