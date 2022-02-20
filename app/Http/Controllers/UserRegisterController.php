<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

class UserRegisterController extends Controller
{   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if ($request->photo != 'default') {
            $name_photo = time().'.'.explode('/', explode(':', substr($request->photo,0,strpos($request->photo, ';')))[1])[1];
            Image::make($request->photo)->save(public_path('./img/users/').$name_photo);
        } else {
            $name_photo = 'default.png';
        }

        $campos = [
            'name'      => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'id_card'   => ['required', 'integer'],
            'birth_date'=> ['required', 'date'],
            'photo'     => ['string'],
            'direction' => ['required', 'string', 'max:255'],
            'state'     => ['required', 'string', 'max:255'],
            'city'      => ['required', 'string', 'max:255'],            
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
        ];

        $mensaje = [
            'required'=>'Se requiere :attribute'
        ];

        $this->validate($request, $campos, $mensaje);

        $request = request()->except(["password_confirmation"]);

        $request['photo'] = $name_photo;

        return User::create([
            'name'       => $request['name'],
            'last_name'  => $request['last_name'],
            'id_card'    => $request['id_card'],
            'birth_date' => $request['birth_date'],
            'photo'      => $request['photo'],
            'direction'  => $request['direction'],
            'state'      => $request['state'],
            'city'       => $request['city'],            
            'email'      => $request['email'],
            'password'   => Hash::make($request['password']),
        ]);

        return 'Usuario creado con exito';
    }
    
}