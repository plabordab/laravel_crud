@extends("layout")
@section('contenido')

    <a href="{{route("alumnos.create")}}">Crear nuevo alumno</a>
    <table>
        <caption>Listado de alumnos</caption>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dirección</th>
            <th>DNI</th>
        </tr>

        @foreach($alumnos as $alumno)
            <tr>
                <th>{{$alumno->nombre}}</th>
                <th>{{$alumno->apellido}}</th>
                <th>{{$alumno->direccion}}</th>
                <th>{{$alumno->dni}}</th>
                <th>
                    {{--<form action="{{route("alumnos.destroy", $alumno->id)}}" method="POST">--}}
                    <form action="/alumnos/{{$alumno->id}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <input type="submit" value="Borrar">
                    </form>
                </th>
                <th>
                    <a href="{{route("alumnos.edit", $alumno->id)}}">Editar</a>
                </th>
            </tr>

        @endforeach

    </table>

@endsection
