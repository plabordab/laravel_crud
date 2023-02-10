@extends("layout")
@section('contenido')

    <fielset>

        <legend>Datos alumno</legend>
        <form action="{{route("alumnos.store")}}" method="post">

            @method('post')
            <!--si el metodo es get o put no es necesario incluirlo -->
            <!--si el metodo es put o delete es obligatorio ponerlo -->
            @csrf
            <!--REQUISITO: los name tienen que tener el nombre igual que los campos de la bd-->
            Nombre <input type="text" name="nombre" id=""><br/>
            Apellido <input type="text" name="apellido" id=""><br/>
            Dirección <input type="text" name="direccion" id=""><br/>
            DNI <input type="text" name="dni" id=""><br/>
            <input type="submit" value="Guardar">
        </form>

    </fielset>

@endsection
