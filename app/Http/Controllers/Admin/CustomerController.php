<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Role;
use Alert;
use Illuminate\Http\Request;
// use DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where('is_admin','=',"0")->latest()->get()->load('role');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    return '
                    <button type="button" class="btn btn-success btn-sm" id="getEditArticleData" data-id="'.$data->id.'"  data-toggle="modal" data-target="#EditArticleModal" id="getEditArticleData" >Ubah</button>
                    <button type="button" data-id="'.$data->id.'" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId">Hapus</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view("admin.customers");
    }

    public function index2()
    {
        return view('admin.customers', [
            'users' => User::with('role')->get()->load('role')
        ]);
    }


    public function destroy($id)
    {
        $user = new User;
        $user->deleteData($id);
        return response()->json(['success'=>'User berhasil di hapus!']);
    }

    // public function store(Request $request, User $jenis_User)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required',
    //         'role_id' => 'required',
    //     ]);


    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator->errors());
    //     }

    //     $jenis_User->storeData($request->all());

    //     return response()->json(['success' => 'Role berhasil ditambahkan']);
    // }

    public function store(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            // 'role_id' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'password' => 'required',
        ]);
        // dd($request->all());


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        // $user->storeData($request->all());
        User::create([
            'name' => $request -> name,
            'email' => $request -> email,
            // 'role_id' => $request-> role_id,
            'address' => $request-> alamat,
            'phoneNumber' => $request-> no_hp,
            'password' => Hash::make($request-> password),
        ]);
        return response()->json(['success' => 'Pengguna berhasil ditambahkan']);
    }

    // public function edit($id)
    // {
    //     $article = new JenisUser();
    //     $data = $article->findData($id);

    //     $html = '<div class="form-group">
    //                 <label for="Name">Name:</label>
    //                 <input type="text" class="form-control" name="name" id="editTitle" value="' . $data->name . '"  >
    //             </div>
    //             <div class="form-group">
    //                 <label for="role_id">role_id:</label>
    //                 <input type="text" class="form-control" name="role_id" id="editRole" value="' . $data->role_id . '">
    //             </div>';

    //     return response()->json(['html' => $html]);
    // }

    public function edit($id)
    {
        $user = new User();
        $data = User::findOrFail($id);

        $html = '<div class="form-group">
                    <label for="Name">Nama:</label>
                    <input type="text" class="form-control" name="name" id="editTitle" value="' . $data->name . '">
                </div>
                <div class="form-group">
                <label for="Role">Role:</label>
                    <select type="text" class="form-control" name="role_id" id="editRole" >
                        <option selected>Pilih Role</option>
                        <option value="0">pelanggan</option>
                        <option value="1">admin</option>
                        <option value="2">pemilik</option>
                        <option value="3">non-aktif</option>
                    </select>
                </div>';
        // dd($html);
        return response()->json(['html' => $html]);
    }

    // public function update(Request $request, $id)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required',
    //         'role_id' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator->errors());
    //     }

    //     $article = new JenisUser();
    //     $article->updateData($id, $request->all());

    //     return response()->json(['success' => 'Role Berhasil Update']);
    // }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'role_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $user = new User();
        // $user->updateData($id, $request->all());
        $data = User::findOrFail($id);
        $data->name = $request->name;
        $data->role_id = $request->role_id;
        $data->save();
        // dd($request->all());
        return response()->json(['success' => 'Data berhasil diperbarui']);
    }

    
}
