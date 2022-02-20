<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Programa;
use Illuminate\Http\Request;

class GalleryController extends Controller
{

    public function dev_program($id) 
    {
        // return Programa::where('user_id', '=', $id);
        return Programa::where('user_id', '=', $id)->get();
    }

    public function dev($id)
    {
        return User::findOrFail($id);
    }

    public function index()
    {
        return User::all();
    }
    
}
