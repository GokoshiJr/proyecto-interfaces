<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;


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

        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //
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
            'name'     =>'required|string|max:100',
            'type'     =>'required|string|max:100',
            /* 'photo_1'  =>'required|mimes:jpeg,png,jpg',
            'photo_2'  =>'required|mimes:jpeg,png,jpg',
            'photo_3'  =>'required|mimes:jpeg,png,jpg', */
            'language' =>'required|string|max:100',
            'library'  =>'required|string|max:100',
            'plugin'   =>'required|string|max:100',
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        if ($request->photo_1) {
            $name_photo = time().'.'.explode('/', explode(':', substr($request->photo_1,0,strpos($request->photo_1, ';')))[1])[1];
            Image::make($request->photo_1)->save(public_path('./img/test/').$name_photo);
        }

        if ($request->photo_2) {
            $name_photo_2 = time().'.'.explode('/', explode(':', substr($request->photo_2,0,strpos($request->photo_2, ';')))[1])[1];
            Image::make($request->photo_2)->save(public_path('./img/test/').$name_photo_2);
        }

        if ($request->photo_3) {
            $name_photo_3 = time().'.'.explode('/', explode(':', substr($request->photo_3,0,strpos($request->photo_3, ';')))[1])[1];
            Image::make($request->photo_3)->save(public_path('./img/test/').$name_photo_3);
        }

        // $datosEmpleado = request()->all(); trae todos los datos       
        $datosEmpleado = request()->except('_token'); // Traemos todos los datos menos la llave csrf
        // return response()->json($datosEmpleado);
        $datosEmpleado['photo_1'] = $name_photo;
        $datosEmpleado['photo_2'] = $name_photo_2;
        $datosEmpleado['photo_3'] = $name_photo_3;
        Programa::insert($datosEmpleado); // inserta la info en la base de datos
        // return response()->json($datosEmpleado);
        return redirect('/dashboard');
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
        //
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
        $programa = Programa::findOrFail($id);
        
        if ($programa->photo_1 != $request->photo_1) 
        {
            $name_photo = time().'.'.explode('/', explode(':', substr($request->photo_1,0,strpos($request->photo_1, ';')))[1])[1];
            Image::make($request->photo_1)->save(public_path('./img/test/').$name_photo);
            $data = request()->all();
            $data['photo_1'] = $name_photo;
            
        } else {
            $data = request()->all();
        }

        if ($programa->photo_2 != $request->photo_2) 
        {   
            $name_photo_2 = time().'.'.explode('/', explode(':', substr($request->photo_2,0,strpos($request->photo_2, ';')))[1])[1];
            Image::make($request->photo_2)->save(public_path('./img/test/').$name_photo_2);
            $data = request()->all();
            $data['photo_2'] = $name_photo_2;
            
        } else {
            $data = request()->all();
        }

        if ($programa->photo_3 != $request->photo_3) 
        {   
            $name_photo_3 = time().'.'.explode('/', explode(':', substr($request->photo_3,0,strpos($request->photo_3, ';')))[1])[1];
            Image::make($request->photo_3)->save(public_path('./img/test/').$name_photo_3);
            $data = request()->all();
            $data['photo_3'] = $name_photo_3;
        } else {
            $data = request()->all();
        }
        
        
        Programa::where('id', '=', $id)->update($data);
        return "Actualizado";
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

        return "Eliminado";
    }
}
