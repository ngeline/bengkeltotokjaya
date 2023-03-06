<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisService;
use App\Models\Montir;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class MontirController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Montir::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return '<button type="button" class="btn btn-warning btn-sm" id="getEditArticleData" data-id="' . $data->id . '">Ubah</button>
                    <button type="button" data-id="' . $data->id . '" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId">Hapus</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view("admin.montir");
    }

    public function destroy($id)
    {
        $typeService = new Montir();
        $typeService->deleteData($id);
        return response()->json(['success' => 'Tipe Service berhasil dihapus']);
    }

    public function store(Request $request, Montir $jenis_Service)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'status' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $jenis_Service->storeData($request->all());

        return response()->json(['success' => 'Tipe Service berhasil ditambahkan']);
    }

    public function edit($id)
    {
        $article = new Montir();
        $data = $article->findData($id);

        $html = '<div class="form-group">
                    <label for="Name">Name:</label>
                    <input type="text" class="form-control" name="name" id="editTitle" value="' . $data->name . '">
                </div>
                <div class="form-group">
                <label for="Status">Status:</label>
                    <select type="text" class="form-control" name="status" id="editDescription" >
                        <option value="' . $data->status . '"></option>
                        <option value="Aktif">Aktif</option>
                        <option value="Non-Aktif">Non-Aktif</option>
                    </select>
                </div>';

        return response()->json(['html' => $html]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $article = new Montir();
        $article->updateData($id, $request->all());

        return response()->json(['success' => 'Tipe Service Berhasil Update']);
    }
}
