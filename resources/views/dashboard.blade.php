@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Bienvenido al Dashboard</h1>
        <!-- Agrega el contenido del dashboard aquí -->
        <p>Contenido personalizado del dashboard</p>
        
        <!-- Formulario de Cerrar Sesión -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Cerrar sesión</button>
        </form>
    </div>
@endsection
