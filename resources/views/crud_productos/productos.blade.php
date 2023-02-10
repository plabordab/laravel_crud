@extends("layout")
@section('contenido')

    <a href="{{route("productos.create")}}">Crear nuevo producto</a>
    <table>
        <caption>Listado de productos</caption>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Nombre Corto</th>
            <th>Descripción</th>
            <th>PVP</th>
            <th>Familia</th>
        </tr>

        @foreach($productos as $producto)
            <tr>
                <th>{{$productos->cod}}</th>
                <th>{{$productos->nombre}}</th>
                <th>{{$productos->nombre_corto}}</th>
                <th>{{$productos->descripcion}}</th>
                <th>{{$productos->PVP}}</th>
                <th>{{$productos->familia}}</th>
                <th>

                    <form action="/$productos/{{$alumno->cod}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <input type="submit" value="Borrar">
                    </form>
                </th>
                <th>
                    <a href="{{route("$productos.edit", $alumno->cod)}}">Editar</a>
                </th>

            </tr>

        @endforeach

    </table>

@endsection
