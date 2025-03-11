<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Recursos Financieros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .header {
            text-align: center;
        }
        .logo {
            width: 100px;
            height: auto;
        }
        .firma {
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>

    <!-- Encabezado con Logo -->
    <div class="header">
        <img src="{{ public_path('images/logo.png') }}" class="logo">
        <h2>UNIVERSIDAD POLITÉCNICA DE FRANCISCO I. MADERO</h2>
        <h3>SOLICITUD DE RECURSOS FINANCIEROS</h3>
    </div>

    <!-- Tabla con los datos -->
    <table>
        <tr>
            <th>Solicitante</th>
            <td>{{ $solicitante }}</td>
        </tr>
        <tr>
            <th>Puesto</th>
            <td>{{ $puesto }}</td>
        </tr>
        <tr>
            <th>Dependencia</th>
            <td>{{ $dependencia }}</td>
        </tr>
        <tr>
            <th>Importe Solicitado</th>
            <td>${{ number_format($importe, 2) }} ({{ $importe_letras }})</td>
        </tr>
        <tr>
            <th>Concepto del Gasto</th>
            <td>{{ $concepto }}</td>
        </tr>
        <tr>
            <th>No. de Cuenta</th>
            <td>{{ $cuenta }}</td>
        </tr>
        <tr>
            <th>CLABE</th>
            <td>{{ $clabe }}</td>
        </tr>
        <tr>
            <th>Presupuesto a Afectar</th>
            <td>{{ $presupuesto }}</td>
        </tr>
        <tr>
            <th>Proyecto</th>
            <td>{{ $proyecto }}</td>
        </tr>
        <tr>
            <th>Beneficiario</th>
            <td>{{ $beneficiario }}</td>
        </tr>
        <tr>
            <th>No. de Documento</th>
            <td>{{ $documento }}</td>
        </tr>
        <tr>
            <th>Fecha</th>
            <td>{{ $fecha }}</td>
        </tr>
        <tr>
            <th>Monto</th>
            <td>${{ number_format($monto, 2) }}</td>
        </tr>
    </table>

    <!-- Espacio para firma y sello -->
    <div class="firma">
        <p>_________________________________________</p>
        <p>Firma del Solicitante</p>
        <img src="{{ public_path('images/sello.png') }}" class="logo">
    </div>

</body>
</html>
