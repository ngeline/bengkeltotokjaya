<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisService;
use App\Models\Category;

class LayananController extends Controller
{
    function index2()
    {
        return view('pelanggan.layanan');
    }
    public function index()
    {
        return view('pelanggan.layanan', [
            'jenis_services' =>JenisService::all(),
            'categories' => Category::all()
        ]);
    }
}
