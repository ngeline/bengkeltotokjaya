<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Alert;
use App\Models\DetailJenisService;
use App\Models\DetailService;
use App\Models\JenisService;
use Barryvdh\DomPDF\Facade as PDF;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bookings = Service::where('user_id', Auth::user()->id)
        ->whereNotIn('status',['Pembayaran diverifikasi'])
        ->orderBy('services.created_at','desc')
        ->get();
        $categories = Category::all();
        // $services =  DB::table('services')
        // ->join('users', 'services.user_id', '=', 'users.id')
        // ->select('users.name', 'services.service_date', 'services.status', 'queue', 'no_antrian','montir', 'services.id')
        // ->whereIn('services.status',['Menunggu diproses','Servis diproses','Servis selesai','Menunggu pembayaran','Sudah mengirim pembayaran'])
        // ->orderBy('services.created_at','desc')
        // ->paginate(10);
        // 
        $ket = '';
        foreach($bookings as $a){
            if($a->keterangan==''){
                $ket='';
            } 
            else {
                $ket=$a->keterangan;
            }

        }
        // $ket = $bookings -> keterangan;
        // dd($ket);
        return view('history', compact('bookings', 'categories','ket'));
    }

    public function detail($id)
    {
        $booking = Service::where('id', $id)->first();
        $bookings = Service::where('id', $booking->id)->get();
        $categories = Category::all();
        return view('historyDetail', compact('bookings', 'booking', 'categories'));
    }

    public function update(Request $request, $id)
    {

        $booking = Service::findOrFail($id);
        $booking->name_stnk = $request->name_stnk;
        $booking->number_plat = $request->number_plat;
        $booking->nama_mobil = $request->nama_mobil;
        $booking->jenis_mobil = $request->jenis_mobil;
        $booking->complaint = $request->complaint;
        $booking->update();
        alert()->success('Booking berhasil diperbarui', 'Success');
        return redirect('history');
    }

    public function invoice($id)
    {
        $booking = Service::where('id', $id)->first();
        $bookings = Service::where('id', $booking->id)->get();
        $jenisServices = JenisService::all();
        $categories = Category::all();
        $service_details = [];
        if (!empty($booking)) {
            $service_details = DetailService::where('service_id', $booking->id)->get();
        }
        $detailJenis = [];
        if(!empty($booking))
        {
            $detailJenis  = DetailJenisService::where('service_id', $booking->id)->get();

        }
        return view('invoice', compact('bookings', 'booking', 'jenisServices', 'service_details', 'categories', 'detailJenis'));
    }

    public function index_service()
    {
        $bookings = Service::where('user_id', Auth::user()->id)
        ->whereIn('status', ['Pembayaran diverifikasi'])
        ->get();
        $categories = Category::all();
        return view('serviceHistory', compact('bookings', 'categories'));
    }

    public function detail_service($id)
    {
        $booking = Service::where('id', $id)->first();
        $bookings = Service::where('id', $booking->id)->get();
        $categories = Category::all();
        $service_details = [];
        if (!empty($booking)) {
            $service_details = DetailService::where('service_id', $booking->id)->get();
        }
        $detailJenis = [];
        if(!empty($booking))
        {
            $detailJenis  = DetailJenisService::where('service_id', $booking->id)->get();

        }
        return view('detailService', compact('bookings', 'booking', 'categories', 'service_details', 'detailJenis'));
    }

    public function cetak_pdf($id)
    {
        $booking = Service::where('id', $id)->first();
        $bookings = Service::where('id', $booking->id)->get();
        $jenisServices = JenisService::all();
        $categories = Category::all();
        $service_details = [];
        if (!empty($booking)) {
            $service_details = DetailService::where('service_id', $booking->id)->get();
        }
        $detailJenis = [];
        if(!empty($booking))
        {
            $detailJenis  = DetailJenisService::where('service_id', $booking->id)->get();

        }
        $pdf = PDF::loadview('invoice_pdf', ['booking' => $booking, 'bookings' => $bookings, 'jenisServices' => $jenisServices, 'categories'=>$categories, 'service_details'=>$service_details, 'detailJenis'=>$detailJenis])->setPaper('a4', 'portrait');
        return $pdf->stream();
    }
}
