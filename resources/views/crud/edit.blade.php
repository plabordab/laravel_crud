@extends("layout")
@section('contenido')

    <fielset>

        <legend>Datos alumno</legend>
        <form action="{{route("alumnos.update", $alumno->id)}}" method="POST">

            @csrf
            @method('PUT')
            Nombre <input type="text" name="nombre" value="{{$alumno->nombre}}" id=""><br/>
            Apellido <input type="text" name="apellido" value="{{$alumno->apellido}}" id=""><br/>
            Dirección <input type="text" name="direccion" value="{{$alumno->direccion}}"  id=""><br/>
            DNI <input type="text" name="dni" value="{{$alumno->dni}}" id=""><br/>
            <input type="submit" value="Guardar">
        </form>

    </fielset>

@endsection
