<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user_id'] = Auth::user()->id;        
        $data['programas'] = Programa::where('user_id', '=', $data['user_id'])->paginate(5);
        return view('programa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data['user'] = Auth::user();
        $data['programa'] = "";
        
        return view('programa.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validacion de campos en el formulario
        $campos = [
            'name'=>'required|string|max:100',
            'type'=>'required|string|max:100',
            'photo_1'=>'required|string|max:100',
            'photo_2'=>'required|string|max:100',
            'photo_3'=>'required|string|max:100',
            'language'=>'required|string|max:100',
            'library'=>'required|string|max:100',
            'plugin'=>'required|string|max:100',
            
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        // $datosEmpleado = request()->all(); trae todos los datos       
        $datosEmpleado = request()->except('_token'); // Traemos todos los datos menos la llave csrf
        // return response()->json($datosEmpleado);
        Programa::insert($datosEmpleado); // inserta la info en la base de datos
        // return response()->json($datosEmpleado);

        // ya no mostramos un json, sino que redireccionamos y mostramos un mensaje
        return redirect('/programa')->with('mensaje', 'Programa agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function show(Programa $programa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $programa = Programa::findOrFail($id);
        if ($programa->user_id != Auth::user()->id) {
            return redirect('/programa');
        }
        return view('programa.edit', compact('programa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validacion de campos en el formulario
        $campos = [
            'name'=>'required|string|max:100',
            'type'=>'required|string|max:100',
            'photo_1'=>'required|string|max:100',
            'photo_2'=>'required|string|max:100',
            'photo_3'=>'required|string|max:100',
            'language'=>'required|string|max:100',
            'library'=>'required|string|max:100',
            'plugin'=>'required|string|max:100',
            
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        // $datosEmpleado = request()->all(); trae todos los datos       
        $datosEmpleado = request()->except('_token', '_method'); // Traemos todos los datos menos la llave csrf
        // return response()->json($datosEmpleado);
        Programa::where('id', '=', $id)->update($datosEmpleado);
        // inserta la info en la base de datos
        // return response()->json($datosEmpleado);

        // ya no mostramos un json, sino que redireccionamos y mostramos un mensaje
        return redirect('/programa')->with('mensaje', 'Programa actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Programa::destroy($id);
        return redirect('/programa')->with('mensaje', 'Programa eliminado con exito');
    }
}
