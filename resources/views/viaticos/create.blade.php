@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/formulario.css') }}">

    <div class="container">
        <h1>Solicitud de Viáticos</h1>
        <form method="POST" action="{{ route('viaticos.store') }}" id="formularioViaticos">
            @csrf
            <h2>Datos Generales</h2>
            <div class="form-group">
                <label for="solicitante">Solicitante</label>
                <input type="text" id="solicitante" name="solicitante" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="puesto">Puesto</label>
                <input type="text" id="puesto" name="puesto" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="dependencia">Dependencia</label>
                <input type="text" id="dependencia" name="dependencia" class="form-control" required>
            </div>

            <h2>Datos Específicos</h2>
            <div class="form-group">
                <label for="importe">Importe solicitado</label>
                <input type="number" id="importe" name="importe" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="concepto">Concepto del gasto</label>
                <input type="text" id="concepto" name="concepto" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="cuenta">No. de cuenta</label>
                <input type="text" id="cuenta" name="cuenta" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="clabe">CLABE</label>
                <input type="text" id="clabe" name="clabe" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="presupuesto">Presupuesto a afectar</label>
                <input type="text" id="presupuesto" name="presupuesto" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="proyecto">Proyecto</label>
                <input type="text" id="proyecto" name="proyecto" class="form-control" required>
            </div>

            <h2>Detalles del Beneficiario</h2>
            <div class="form-group">
                <label for="beneficiario">Nombre del beneficiario</label>
                <input type="text" id="beneficiario" name="beneficiario" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="documento">No. de documento</label>
                <input type="text" id="documento" name="documento" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" id="fecha" name="fecha" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="monto">Monto</label>
                <input type="number" id="monto" name="monto" class="form-control" required>
            </div>

            <!-- Botón con opciones para Guardar y Generar PDF -->
            <button type="submit" class="btn btn-primary btn-block" id="btnEnviarGuardar">Enviar Solicitud</button>
            
            <select id="opcionEnvio" class="form-control mt-2">
                <option value="guardar">Guardar en Base de Datos</option>
                <option value="pdf">Generar PDF</option>
            </select>
        </form>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        let numericFields = ['importe', 'cuenta', 'clabe', 'presupuesto', 'monto'];

        numericFields.forEach(function (id) {
            let input = document.getElementById(id);
            if (input) {
                input.addEventListener("input", function () {
                    this.value = this.value.replace(/[^0-9]/g, '');
                });
            }
        });

        document.getElementById("clabe").addEventListener("input", function () {
            if (this.value.length > 18) {
                this.value = this.value.slice(0, 18);
            }
        });

        document.getElementById("cuenta").addEventListener("input", function () {
            if (this.value.length > 18) {
                this.value = this.value.slice(0, 18);
            }
        });

        document.getElementById("btnEnviarGuardar").addEventListener("click", function (event) {
            let form = document.getElementById("formularioViaticos");
            let opcion = document.getElementById("opcionEnvio").value;

            if (opcion === "pdf") {
                event.preventDefault(); // Evitar que guarde en la base de datos
                form.action = "{{ route('solicitud.pdf') }}";
                form.method = "POST";
                form.target = "_blank"; // Abre el PDF en nueva pestaña
                form.submit();
            } else {
                form.action = "{{ route('viaticos.store') }}"; // Guardar en la base de datos
                form.method = "POST";
                form.submit();
            }
        });
    });
    </script>
@endsection
