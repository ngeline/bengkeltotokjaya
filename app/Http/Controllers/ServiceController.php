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
use App\Models\DetailJenisService;
use App\Models\DetailService;
use App\Transformers\AntrianTransformer;
use App\Models\JenisService;
use App\Models\OwnedCars;
use App\Models\Sparepart;

class ServiceController extends Controller
{
    protected $status_service = "booking service";

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $service = JenisService::latest()->get();
        return view('booking', [
            'categories' => Category::all(),
            'service' => JenisService::all(),
            'owned_cars' => OwnedCars::where('user_id', auth()->user()->id)->get()
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
        $hasil = "A $rubahTipe";

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

        $service_day = Service::where('service_date', $request->service_date)->get();

        if (count($service_day) >= 3) {
            return redirect()->back()->withErrors(['message' => "Booking service pada tanggal {$request->service_date} sudah penuh."]);
        }

        $owned_cars = new OwnedCars();
        $is_exist = $owned_cars->where('name_stnk', $request->name_stnk)->where('number_plat', $request->number_plat)->get();
        if (count($is_exist) == 0) {
            $owned_cars->user_id = auth()->user()->id;
            $owned_cars->name_stnk = $request->name_stnk;
            $owned_cars->number_plat = $request->number_plat;
            $owned_cars->nama_mobil = $request->nama_mobil;
            $owned_cars->jenis_mobil = $request->jenis_mobil;
            $owned_cars->save();
        }

        $service = new Service();
        $service->user_id = $user->id;
        $service->no_antrian = $this->getNoAntrian();
        $service->tanggal = $this->getTanggal();
        $service->name_stnk = $request->name_stnk;
        $service->number_plat = $request->number_plat;
        $service->nama_mobil = $request->nama_mobil;
        $service->jenis_mobil = $request->jenis_mobil;
        $service->service_date = $request->service_date;
        // $service->service_date = now();
        $service->status_service = $this->status_service;
        $service->complaint = $request->complaint;
        $service->expired_at = Carbon::now()->addDays(1); // menambah 1 hari kedepan
        $service->save();

        $jenisServices = JenisService::where('id', $request->service)->first();

        //cek Servicedetail
        $check_jenisService_detail = DetailJenisService::where('jenisService_id', $jenisServices->id)
            ->where('service_id', $service->id)
            ->first();

        if (empty($check_jenisService_detail)) {
            $service_detail = new DetailJenisService();
            $service_detail->service_id = $service->id;
            $service_detail->jenisService_id = $jenisServices->id;
            $service_detail->serviceName = $jenisServices->name;
            $service_detail->price = $jenisServices->price;
            $service_detail->save();

        }

        //jumlah total
        $service = Service::where('id', $service->id)->first();
        $service->priceService = $service->priceService + $jenisServices->price;
        $service->total_price = $service->total_price + $jenisServices->price;
        $service->update();

        alert()->success('Terimakasih sudah booking');
        return redirect('history');
    }
}
