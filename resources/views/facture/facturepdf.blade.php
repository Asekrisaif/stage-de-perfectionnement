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
                <th>montantFacture</th>
                <th>periode</th>
                <th>adresse</th>
                <th>nomClient</th>
                <th>adresseClient</th>
                <th>dateFacture</th>
                <th>dateDebutConsommation</th>
                <th>dateFinConsommation</th>
                <th>prixUnitaire</th>
                <th>montantHorsTaxes</th>
                <th>totaleTaxes</th>
                <th>	montantTotale</th>
                <th>dateLimitePaiement</th>
                <th>compteur_id </th>
              
            </tr>
        </thead>
        <tbody>
            @foreach($facture as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->montantFacture}}</td>
                <td>{{$item->periode}}</td>
                <td>{{$item->adresse}}</td>
                <td>{{$item->nomClient}}</td>
                <td>{{$item->adresseClient}}</td>
                <td>{{$item->dateFacture}}</td>
                <td>{{$item->dateDebutConsommation}}</td>
                <td>{{$item->dateFinConsommation}}</td>
                <td>{{$item->prixUnitaire}}</td>
                <td>{{$item->montantHorsTaxes}}</td>
                <td>{{$item->totaleTaxes}}</td>
                <td>{{$item->montantTotale}}</td>
                <td>{{$item->dateLimitePaiement}}</td>
                <td>{{$item->compteur_id }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
