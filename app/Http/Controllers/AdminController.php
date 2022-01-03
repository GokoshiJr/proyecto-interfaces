<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $datos['empleados'] = Empleado::paginate(5); */ // Consulta la informacion del modelo en la bd, y se lo pasamos a index.blade
        $data['users'] = User::paginate(5);
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');        
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
            'nombre'=>'required|string|max:100',
            'apellido'=>'required|string|max:100',
            'cedula'=>'required|integer',
            'fecha_nacimiento'=>'required|date',
            'direccion'=>'required|string|max:200',
            'estado'=>'required|string|max:100',
            'ciudad'=>'required|string|max:100',
            'correo'=>'required|email',
            'clave'=>'required|string|max:100'
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        // $datosEmpleado = request()->all(); trae todos los datos       
        $datosEmpleado = request()->except('_token'); // Traemos todos los datos menos la llave csrf
        Empleado::insert($datosEmpleado); // inserta la info en la base de datos
        // return response()->json($datosEmpleado);

        // ya no mostramos un json, sino que redireccionamos y mostramos un mensaje
        return redirect('admin')->with('mensaje', 'Empleado agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validacion de campos en el formulario
        /* $campos = [
            'nombre'=>'required|string|max:100',
            'apellido'=>'required|string|max:100',
            'cedula'=>'required|integer',
            'fecha_nacimiento'=>'required|date',
            'direccion'=>'required|string|max:200',
            'estado'=>'required|string|max:100',
            'ciudad'=>'required|string|max:100',
            'correo'=>'required|email',
            'clave'=>'required|string|max:100'
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje); */

        // Traemos todos los datos menos la llave csrf y el method
        // $datosEmpleado = request()->except(['_token', '_method']);
        // donde el id coincida en la bd actualizamos el empleado        
        User::where('id', '=', $id)->update(['access' => 1]);

        // recuperamos el id y nos regresamos a edit
        // $empleado = Empleado::findOrFail($id);
        // return view('empleado.edit', compact('empleado'));
        return redirect('admin')->with('mensaje', 'Empleado editado con exito');
        // return redirect('empleado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // Empleado::destroy($id);
        User::where('id', '=', $id)->update(['access' => 0]);
        return redirect('admin')->with('mensaje', 'Empleado borrado');
    }
}
