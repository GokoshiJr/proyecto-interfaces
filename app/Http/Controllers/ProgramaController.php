<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

// Actualiza la foto guardada, elimina la anterior
function update_photo($old_photo, $new_photo, $data, $n) 
{
    if ($old_photo != $new_photo)
    {
        $name_photo = time().'.'.explode('/', explode(':', substr($new_photo,0,strpos($new_photo, ';')))[1])[1];
        Image::make($new_photo)->save(public_path('./img/programs/').$name_photo);
        
        $data['photo_'.$n] = $name_photo;
        $old_programa = public_path('img/programs/').$old_photo;
        
        if (file_exists($old_programa)) {
            @unlink($old_programa);
        }
    }
    return $data;
}

// guardamos la foto en primer lugar
function register_photo($photo_name, $n) 
{
    
    $name_photo = $n.time().'.'.explode('/', explode(':', substr($photo_name,0,strpos($photo_name, ';')))[1])[1];
    Image::make($photo_name)->save(public_path('./img/programs/').$name_photo);
    
    return $name_photo;
}

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
            'photo_1'  =>'required|string',
            'photo_2'  =>'required|string',
            'photo_3'  =>'required|string',
            'language' =>'required|string|max:100',
            'library'  =>'required|string|max:100',
            'plugin'   =>'required|string|max:100',
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        $data = request()->all();
        
        $data['photo_1'] = register_photo($request->photo_1,1);
        $data['photo_2'] = register_photo($request->photo_2,2);
        $data['photo_3'] = register_photo($request->photo_3,3);
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        
        Programa::insert($data); // inserta la info en la base de datos
        
        return 'Creado con exito';
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
        $data = request()->all();
        
        $data = update_photo($programa->photo_1, $request->photo_1, $data, 1);
        $data = update_photo($programa->photo_2, $request->photo_2, $data, 2);
        $data = update_photo($programa->photo_3, $request->photo_3, $data, 3);
        
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
        $programa = Programa::findOrFail($id);
        $d1 = public_path('img/programs/').$programa['photo_1'];
        $d2 = public_path('img/programs/').$programa['photo_2'];
        $d3 = public_path('img/programs/').$programa['photo_3'];
        
        if (file_exists($d1)) {
            @unlink($d1);
        }
        if (file_exists($d2)) {
            @unlink($d2);
        }
        if (file_exists($d3)) {
            @unlink($d3);
        }

        Programa::destroy($id);
        return "Eliminado";
    }
}
