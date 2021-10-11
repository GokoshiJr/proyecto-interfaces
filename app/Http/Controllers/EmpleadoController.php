<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $datos['empleados'] = Empleado::paginate(5); // Consulta la informacion del modelo en la bd, y se lo pasamos a index.blade
        // $datos['users'] = User::paginate(5);
        // session(['mensaje'=>'bienvenido']);
        $datos['user'] = Auth::user();
        return view('empleado.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos['user'] = Auth::user();
        return view('empleado.create', $datos);        
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
        // Empleado::update()
        // ya no mostramos un json, sino que redireccionamos y mostramos un mensaje
        return redirect('empleado')->with('mensaje', 'Empleado agregado con exito');
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
        // $empleado = User::findOrFail($id);
        
        $empleado = Auth::user();
        return view('empleado.edit', compact('empleado'));
        

        
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
        $campos = [
            'name'=>'required|string|max:100',
            'last_name'=>'required|string|max:100',
            'id_card'=>'required|integer',
            'birth_date'=>'required|date',
            'direction'=>'required|string|max:200',
            'state'=>'required|string|max:100',
            'city'=>'required|string|max:100',
            'email'=>'required|email',
            'password'=>'required|string|max:100',
            
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        // Traemos todos los datos menos la llave csrf y el method
        $datosEmpleado = request()->except(['_token', '_method', 'password_confirmation']);
        // donde el id coincida en la bd actualizamos el empleado        
        /* Empleado::where('id', '=', $id)->update($datosEmpleado); */
        // Auth::user()->update($datosEmpleado);
        $datosEmpleado['password'] = bcrypt($datosEmpleado['password']);
        User::where('id', '=', $id)->update($datosEmpleado);
        
        

        // recuperamos el id y nos regresamos a edit
        // $empleado = Empleado::findOrFail($id);
        // return view('empleado.edit', compact('empleado'));
        return redirect('empleado')->with('mensaje', 'Empleado editado con exito');
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
        /* Empleado::destroy($id);
        return redirect('empleado')->with('mensaje', 'Empleado borrado'); */
    }
}
