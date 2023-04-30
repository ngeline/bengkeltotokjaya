<?php

namespace App\Http\Controllers\Pemilik;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Alert;
use App\Models\Category;
use App\Models\DetailJenisService;
use App\Models\Payment;
use App\Models\DetailService;
use App\Models\JenisService;
use Barryvdh\DomPDF\Facade as PDF;


class LaporanServiceController extends Controller
{
    public function index(Request $request)
    {
        if (empty($request->all())) {
            $services =  DB::table('services')
            ->join('users', 'services.user_id', '=', 'users.id')
            ->select('users.name', 'services.service_date', 'services.status', 'queue', 'status_service', 'no_antrian', 'nama_mobil', 'montir','services.id')
            ->whereIn('services.status',['Menunggu diproses','Servis diproses','Servis selesai','Menunggu pembayaran','Sudah mengirim pembayaran'])
            ->orderBy('services.created_at','desc')
            ->paginate(10);
            return view('pemilik.laporanservice', compact('services'));
        } else {
            $cari = $request->cari;
            $services =  Service::where('users.name', 'like', "%".$cari."%")
            ->orWhere('no_antrian', 'LIKE', '%' . $cari . '%')
            ->orWhere('tanggal', 'LIKE', '%' . $cari . '%')
            ->orWhere('montir', 'LIKE', '%' . $cari . '%')
            ->orWhere('name_stnk', 'LIKE', '%' . $cari . '%')
            ->orWhere('number_plat', 'LIKE', '%' . $cari . '%')
            ->orWhere('nama_mobil', 'LIKE', '%' . $cari . '%')
            ->orWhere('jenis_mobil', 'LIKE', '%' . $cari . '%')
            ->orWhere('service_date', 'LIKE', '%' . $cari . '%')
            ->orWhere('status', 'LIKE', '%' . $cari . '%')
            ->orWhere('status_service', 'LIKE', '%' . $cari . '%')
            ->join('users', 'services.user_id', '=', 'users.id')
            ->select('users.name', 'services.service_date', 'services.status', 'queue', 'no_antrian', 'nama_mobil', 'montir','services.id')
            ->whereNotIn('services.status',['expired'])
            ->paginate(10);
            return view('pemilik.laporanservice', compact('services','cari'));
        }
    }

    public function detail($id)
    {
    	$booking = Service::where('id', $id)->first();
        $bookings = Service::where('id', $booking->id)->get();
     	return view('pemilik.laporandetail', compact('booking', 'bookings'));
    }

    public function save(Request $request, $id){
        
        $service = Service::where('id', $id)->first();
        $service->status = $request->status;
        $service->queue= $request->queue;
        $service->update();
        alert()->success('Input data is successfull');
        return redirect('bookingdata');
    }

    public function seePayment($id){
        $service = Service::where('id', $id)->first();
        $payments = Payment::where('service_id', $service->id)->get();
    	return view('pemilik.seePayment', compact('service', 'payments'));
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
