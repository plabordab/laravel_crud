<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;
use App\Models\Alumno;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::all();

        // AYUDA PARA VER INFO EN CODIGO
        $campos = $alumnos[0]->getAttributes();
        $campos = array_keys($campos);

        //info($campos);

        // Y PASARLA A JSON
        $campos = json_encode($campos);
        $alumnos = json_encode($alumnos);



        // dd= var_dump
        //dd($alumnos);
        //invocamos una vista llamada alumnos a la que le pasamos un array (mysql_result) con tods los alumnos
        //return view("crud_alumnos/alumnos", ["alumnos"=> $alumnos]);

        return view("crud_alumnos/alumnos", ["alumnos"=> $alumnos, "campos"=> $campos,"nombre"=> "Alumnos"]);


    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("crud_alumnos/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAlumnoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlumnoRequest $request)
    {
        // Creamos un alumno a partir d los datos del formulario
        $alumno = new Alumno ($request->input());
        // Guardamos
        $alumno->saveOrFail();

        //Redirigimos a alumnos
        return redirect(route("alumnos.index"));

        // volvemos a cargar la vista con todos los alumnos y volvemos al index
        //$alumnos = Alumno::all();
        //return view("crud_alumnos/alumnos", ["alumnos"=> $alumnos]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        return view("crud_alumnos/edit", ["alumno"=> $alumno]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAlumnoRequest  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlumnoRequest $request, Alumno $alumno)
    {
        //valores del nuevo alumno
        $valores = $request->input();
        //actualizamos el alumno con los nuevos valores
        $alumno->update($valores);

        //Redirigimos a alumnos para que vuelva a cargar todos los alumnos con todos los campos
        return redirect(route("alumnos.index"));

        //$alumnos = Alumno::all();
        //return view("crud_alumnos/alumnos", ["alumnos"=> $alumnos]);

        // actualizamos el alumno con los datos del formulario
        //$alumno->update($request->input());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        $alumnos = Alumno::all();
        //return view("crud_alumnos/alumnos", ["alumnos"=> $alumnos]);
        // ahora solo necesito actualizar los datos del alumno actualizados
        return ["alumnos"=> $alumnos];
    }
}
