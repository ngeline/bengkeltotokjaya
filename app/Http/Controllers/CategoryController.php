<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Sparepart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function cari(Request $request){
        $name = $request->name;
        $spareparts = Sparepart::where('name','like',"%".$name."%")->paginate(3);
        return view('spareparts', [
            'spareparts' => $spareparts,
            'categories' => Category::all(),
            'title' => 'List Spareparts'
        ]);

    }

    public function render($category)
    {
        // $service = Service::all()->load('payments', 'user')->dd();
        // $spareparts = Sparepart::all()->load('category')->dd();
        $spareparts = Sparepart::where('category_id', $category)->get()->load('category');
        // $spareparts = DB::table('spareparts')->where('category_id', $category)->get();
        return view('spareparts', [
            'spareparts' => $spareparts,
            'categories' => Category::all(),
            'title' => 'Category Soareparts '.$category
        ]);
       
    }
}
