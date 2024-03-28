<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles for PDF */
        body {
            font-family: Arial, sans-serif; /* Use a standard font for better compatibility */
            font-size: 12px; /* Adjust font size as needed */
        }
        h2 {
            font-size: 18px; /* Increase header size */
            margin-bottom: 10px; /* Add some space between headers and table */
        }
        table {
            width: 100%;
            border-collapse: collapse; /* Ensure table borders collapse properly */
            margin-bottom: 20px; /* Add space below the table */
        }
        th, td {
            border: 1px solid #000; /* Add borders to table cells */
            padding: 8px; /* Add padding to table cells */
            text-align: left; /* Align text to the left */
        }
        th {
            background-color: #f2f2f2; /* Add background color to table header */
            font-weight: bold; /* Make table headers bold */
        }
    </style>
</head>
<body>
    <h2>Title: {{$title}}</h2>
    <h2>Date: {{$date}}</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>moyConsommation	</th>
                <th>numSerie</th>
                <th>modele</th>
                <th>dateInstallation</th>
                <th>marque</th>
                <th>typecompteur_id</th>
                <th>local_id</th>
                
              
            </tr>
        </thead>
        <tbody>
            @foreach($compteur as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->moyConsommation}}</td>
                <td>{{$item->numSerie}}</td>
                <td>{{$item->modele}}</td>
                <td>{{$item->dateInstallation}}</td>
                <td>{{$item->marque}}</td>
                <td>{{$item->typecompteur_id}}</td>
                <td>{{$item->local_id}}</td>
                

            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
