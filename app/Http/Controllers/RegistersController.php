<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\OwnedCars;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistersController extends Controller
{
    public function index()
    {
        return view('auth.register', ['categories' => Category::all()]);
    }

    public function store(Request $request)
    {
        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $owned_cars = new OwnedCars();
        $owned_cars->user_id = $data->id;
        $owned_cars->name_stnk = $request->name_stnk;
        $owned_cars->number_plat = $request->number_plat;
        $owned_cars->nama_mobil = $request->nama_mobil;
        $owned_cars->jenis_mobil = $request->jenis_mobil;
        $owned_cars->save();

        return redirect()->to(route('login'));
        
    }
}
