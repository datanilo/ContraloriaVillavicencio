<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Ausencias</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Listado de Ausencias</h2>

    <table>
        <thead>
            <tr>
                <th>Nombre del Usuario</th>
                <th>Fecha de Ausencia</th>
                <th>Motivo</th>
                <th>Horas de Ausencia</th>
                <th>Cantidad de Días</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ausencias as $ausencia)
                <tr>
                    <td>{{ $ausencia->nombre_usuario }}</td>
                    <td>{{ $ausencia->fecha }}</td>
                    <td>{{ $ausencia->motivo }}</td>
                    <td>{{ $ausencia->horas }}</td>
                    <td>{{ $ausencia->cantidad_dias }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
