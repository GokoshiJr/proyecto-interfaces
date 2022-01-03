<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::where('is_admin', '=', 0)->paginate(5);
    }

    public function getUserIdProfile()
    {
        $data['user_id'] = Auth::user()->id;
        return $data;
    }
    
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user->photo != $request->photo)
        {
            if ($request->photo) 
            {
                $name_photo = time().'.'.explode('/', explode(':', substr($request->photo,0,strpos($request->photo, ';')))[1])[1];
                Image::make($request->photo)->save(public_path('./img/users/').$name_photo);
                $data = request()->all();
                $data['photo'] = $name_photo;
            }
        } else {
            $data = request()->all();
        }
        User::where('id', '=', $id)->update($data);
        return "Datos editados con exito";
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user['access'] === 1) {
            User::where('id', '=', $id)->update(['access' => 0]);
        } else {
            User::where('id', '=', $id)->update(['access' => 1]);
        }
        return "Acceso editado con exito.";
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return 'Usuario eliminado con exito.';
    }
}
