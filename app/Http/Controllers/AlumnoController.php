<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Models\Alumno;
use Illuminate\Http\Request;


class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::all();
        return view('tabla', compact('alumnos'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */


     public function store(Request $request)
     {
         $data = $request->validate([
             'matricula' => 'required|string',
             'nombre' => 'required|string',
             'fecha_nacimiento' => 'required',
             'telefono' => 'required|string',
             'email' => 'nullable|email',
             'nivel_id' => 'required|integer',
         ]);
         Alumno::create($data);
         return redirect()->route('alumnos.index');
     }
    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */




    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->delete();
        return redirect()->route('alumnos.index');
    }
}
