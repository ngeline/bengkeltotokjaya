<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Alert;
use Carbon\Carbon;
use App\Models\Service;
use App\Models\Antrian;
use App\Transformers\AntrianTransformer;

class ServicePanggilanController extends Controller
{
    protected $status_service = "service panggilan";

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('bookingpanggilan', [
            'categories' => Category::all()
        ]);
    }


    private function getNoAntrian()
    {
        //Set Default Tanggal Sekarang (Indonesia)
        date_default_timezone_set("Asia/Jakarta");

        //Panjang Data Berdasarkan Hari Ini
        $jumlah_hari_ini = Service::where('tanggal', date('Y-m-d'))
            ->where('status_service', $this->status_service)
            ->count();

        //Panjang Data Hari Ini Ditambah 1
        $noAntrian = $jumlah_hari_ini + 1;
        $rubahTipe = strval($noAntrian);
        $hasil = "B $rubahTipe";

        return $hasil;
    }

    private function getTanggal()
    {
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date('Y-m-d');

        return $tanggal;
    }

    public function save(Request $request, $id)
    {
        date_default_timezone_set("Asia/Jakarta");

        $user = User::where('id', $id)->first();
        $service = Service::where('user_id', $user->id)->first();
        $service = new Service();
        $service->user_id = $user->id;
        $service->no_antrian = $this->getNoAntrian();
        $service->tanggal = $this->getTanggal();
        $service->name_stnk = $request->name_stnk;
        $service->number_plat = $request->number_plat;
        $service->nama_mobil = $request->nama_mobil;
        $service->jenis_mobil = $request->jenis_mobil;
        $service->montir = $request->montir;
        $service->service_date = now();
        $service->status_service = $this->status_service;
        // $service->photo = $request->photo;

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|mimes:jpg,jpeg,png'
            ]);
    
            $getDokumen = $request->file('photo');
            $nameFile = str_replace(['/', ' '], '-', $getDokumen->getClientOriginalName());
            $getDokumen->move(public_path('upload/photo'), $nameFile);
            $service->photo = 'upload/photo/' . $nameFile;
        }


        $service->maps = $request->maps;
        $service->address_sp = $request->address_sp;
        $service->complaint = $request->complaint;
        $service->expired_at = Carbon::now()->addDays(1); // menambah 1 hari kedepan
        $service->save();
        alert()->success('Terimakasih sudah booking kerusakan berat, harap menunggu konfirmasi dari Admin');
        return redirect('history');
    }
}
