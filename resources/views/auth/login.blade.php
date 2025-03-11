
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Viáticos</title>
    
    <!-- Primero cargamos Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Luego cargamos tu archivo de estilos personalizado -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    
</head>
<body>
    <!-- Sección de bienvenida -->
    <section class="welcome-section">
        <div class="container">
            <h1>Bienvenido al Sistema de Viáticos UPFIM</h1>
            <p>Aquí podrás gestionar tus solicitudes de viáticos y realizar todas las acciones necesarias de forma eficiente.</p>
        </div>
    </section>

    <!-- Título del sistema -->
    <div class="system-title">
        Sistema de Viáticos
    </div>

    <!-- Formulario de inicio de sesión -->
    <div class="container">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Usuario</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su correo">
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña">
            </div>
            <button type="submit" class="btn btn-success mt-3">Acceder</button>
        </form>
    </div>

    <!-- Pie de página -->
    <div class="footer">
        <p>&copy; 2025 Universidad Politécnica de Francisco I. Madero (UPFIM). Todos los derechos reservados.</p>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
