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
        // dd= var_dump
        //dd($alumnos);
        //invocamos una vista llamada alumnos a la que le pasamos un array (mysql_result) con tods los alumnos
        return view("crud/alumnos", ["alumnos"=> $alumnos]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("crud/create");
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

        // volvemos a cargar la vista con todos los alumnos y volvemos al index
        $alumnos = Alumno::all();
        return view("crud/alumnos", ["alumnos"=> $alumnos]);

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
        return view("crud/edit", ["alumno"=> $alumno]);
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
        $alumnos = Alumno::all();
        return view("crud/alumnos", ["alumnos"=> $alumnos]);

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
        return view("crud/alumnos", ["alumnos"=> $alumnos]);
    }
}
