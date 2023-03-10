<?php

namespace App\Http\Controllers;

use App\Models\Sparepart;
use App\Models\Category;
use Illuminate\Http\Request;


class SparepartController extends Controller
{
    public function cari(Request $request){
        $name = $request->name;
        $spareparts = Sparepart::where('nameS','like',"%".$name."%")->paginate(3);
        return view('spareparts', [
            'spareparts' => $spareparts,
            'categories' => Category::all()
        ]);

    }
    public function render()
    {
        // $spareparts = Sparepart::all()->load('category')->dd();
        $spareparts = Sparepart::all();
        $category = Category::all();
        return view('spareparts', [
            'spareparts' => $spareparts,
            'categories' => $category
        ]);
    }

    public function rendersukucadanglandingpage()
    {
        // $spareparts = Sparepart::all()->load('category')->dd();
        $spareparts = Sparepart::all();
        $category = Category::all();
        return view('sukucadanglandingpage', [
            'spareparts' => $spareparts,
            'categories' => $category
        ]);
    }

    public function carisukucadanglandingpage(Request $request){
        $name = $request->name;
        $spareparts = Sparepart::where('nameS','like',"%".$name."%")->paginate(3);
        return view('sukucadanglandingpage', [
            'spareparts' => $spareparts,
            'categories' => Category::all()
        ]);

    }
    
    
}
