<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importar Préstamos</title>
</head>
<body>

    <h2>Importar Préstamos desde Excel</h2>

    <form action="{{ route('prestamos.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="archivo">Seleccionar archivo Excel:</label>
        <input type="file" name="archivo" id="archivo" accept=".xlsx, .xls" required>
        <button type="submit">Importar</button>
    </form>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

</body>
</html>
