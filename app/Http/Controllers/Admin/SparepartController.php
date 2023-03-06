<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sparepart;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class SparepartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Sparepart::latest()->get()->load('category');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return '<button type="button" class="btn btn-warning btn-sm" id="getEditArticleData" data-id="' . $data->id . '">Ubah</button>
                    <button type="button" data-id="' . $data->id . '" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId">Hapus</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $categories = Category::all();
        return view("admin.sparepart", compact('categories'));
    }

    public function destroy($id)
    {
        $sparepart = new Sparepart();
        $sparepart->deleteData($id);
        return response()->json(['success' => 'Sparepart berhasil dihapus']);
    }

    public function store(Request $request, Sparepart $sparepart)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'nameS' => 'required',
            'price' => 'required',
            'biayaPemasangan' => 'required',
            'stock' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $sparepart->storeData($request->all());

        return response()->json(['success' => 'Sparepart berhasil ditambahkan']);
    }

    public function edit($id)
    {
        $sparepart = new Sparepart();
        $data = $sparepart->findData($id);

        $html = '<div class="form-group">
                    <label for="Name">Nama:</label>
                    <input type="text" class="form-control" name="name" id="editTitle" value="' . $data->nameS . '">
                </div>
                <div class="form-group">
                    <label for="Price">Harga:</label>
                    <input type="text" class="form-control" name="name" id="editPrice" value="' . $data->price . '">
                </div>
                <div class="form-group">
                <label for="biayaPemasangan">Biaya Pemasangan:</label>
                <input type="text" class="form-control" name="biayaPemasangan" id="editPemasangan" value="' . $data->biayaPemasangan . '">
                </div>
                <div class="form-group">
                    <label for="Stock">Stok:</label>
                    <input type="text" class="form-control" name="name" id="editStock" value="' . $data->stock . '">
                </div>';

        return response()->json(['html' => $html]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nameS' => 'required',
            'price' => 'required',
            'biayaPemasangan' => 'required',
            'stock' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $sparepart = new Sparepart();
        $sparepart->updateData($id, $request->all());

        return response()->json(['success' => 'Sparepart berhasil diperbarui']);
    }
}
