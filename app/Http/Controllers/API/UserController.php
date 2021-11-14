<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::paginate(5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $campos = [
            'name'      => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'id_card'   => ['required', 'integer'],
            'birth_date'=> ['required', 'date'],
            'photo'     => ['required', 'string', 'max:10000'/* ,'mimes:jpeg,png,jpg' */],
            'direction' => ['required', 'string', 'max:255'],
            'state'     => ['required', 'string', 'max:255'],
            'city'      => ['required', 'string', 'max:255'],            
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
        ];
        

        $mensaje = [
            'required'=>'The :attribute is required.'
        ];

        $this->validate($request, $campos, $mensaje);

        $request = request()->except(["password_confirmation"]);

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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
