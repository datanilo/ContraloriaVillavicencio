<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitudes de Soporte</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Solicitudes de Soporte Técnico</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Solicitante</th>
                <th>Placa del Equipo</th>
                <th>Mensaje</th>
                <th>Estado</th>
                <th>Fecha de Creación</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($solicitudes as $solicitud)
                <tr>
                    <td>{{ $solicitud->id }}</td>
                    <td>{{ $solicitud->nombre_solicitante }}</td>
                    <td>{{ $solicitud->placa_equipo }}</td>
                    <td>{{ $solicitud->mensaje }}</td>
                    <td>{{ $solicitud->estado }}</td>
                    <td>{{ $solicitud->created_at->format('d-m-Y H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
