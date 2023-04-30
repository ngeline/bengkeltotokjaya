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
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Exports\LaporanTransaksiExport;


class LaporanTransaksiController extends Controller
{
    public function indexgagal(){
        // $service = Service::all()->load('payments', 'user')->dd();
        $services =  DB::table('services')
        ->join('users', 'services.user_id', '=', 'users.id')
        ->select('users.name','name_stnk', 'services.service_date', 'services.status', 'queue', 'status_service', 'no_antrian', 'montir',  'nama_mobil', 'jenis_mobil', 'number_plat','services.id','total_price','complaint')
        ->whereIn('services.status', ['Sudah mengirim pembayaran','Pembayaran diverifikasi'])
        ->orderBy('services.created_at','desc')
        ->paginate(10);
        return view('pemilik.laporantransaksi', compact('services'));
    }

    public function index(Request $request)
    {
        if (empty($request->all())) {
            $services =  DB::table('services')
            ->join('users', 'services.user_id', '=', 'users.id')
            ->select('users.name','name_stnk', 'services.service_date', 'services.status', 'queue', 'status_service', 'no_antrian', 'montir',  'nama_mobil', 'jenis_mobil', 'number_plat','services.id','total_price','complaint')
            ->whereIn('services.status', ['Sudah mengirim pembayaran','Pembayaran diverifikasi'])
            ->orderBy('services.created_at','desc')
            ->paginate(10);
            return view('pemilik.laporantransaksi', compact('services'));
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
            ->paginate();
            return view('pemilik.laporantransaksi', compact('services','cari'));
        }
    }

    public function detail($id)
    {
    	$booking = Service::where('id', $id)->first();
        $bookings = Service::where('id', $booking->id)->get();
     	return view('pemilik.transaksidetail', compact('booking', 'bookings'));
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

    public function transaksi1(Request $request)
    {
      
        if (empty($request->all())) {
            $data = LaporanModel::paginate(15);

            return view('manager.laporanpermintaan', ['data' => $data]);
        } else {
            // $data = LaporanModel::where('tanggal','LIKE',$request->start_date)->where('tanggal','LIKE',$request->end_date)->paginate();
            $data = LaporanModel::whereBetween('tanggal', [$request->start_date, $request->end_date])->paginate();
            return view('manager.laporanpermintaan', ['data' => $data, 'start_date' => $request->start_date, 'end_date' => $request->end_date]);
        }
    }

    public function transaksi(Request $request)
    {
      
        if (empty($request->all())) {
            $services =  DB::table('services')
            ->join('users', 'services.user_id', '=', 'users.id')
            ->select('users.name', 'services.service_date', 'services.status', 'services.name_stnk', 'services.no_antrian', 'services.name_stnk', 'services.montir','services.jenis_mobil', 'services.complaint','queue',  'nama_mobil', 'number_plat','services.id','total_price')
            ->whereIn('services.status', ['Sudah mengirim pembayaran','Pembayaran diverifikasi'])
            ->orderBy('services.created_at','desc')
            ->paginate(10);

            return view('pemilik.laporantransaksi', ['services' => $services]);
        } else {
            $services =  DB::table('services')
            ->join('users', 'services.user_id', '=', 'users.id')
            ->select('users.name', 'services.service_date', 'services.status', 'services.name_stnk', 'services.no_antrian', 'services.name_stnk', 'services.montir','services.jenis_mobil', 'services.complaint','queue',  'nama_mobil', 'number_plat','services.id','total_price')
            ->whereIn('services.status', ['Sudah mengirim pembayaran','Pembayaran diverifikasi'])
            ->whereBetween('services.tanggal', [$request->start_date, $request->end_date])
            ->orderBy('services.created_at','desc')
            ->paginate(10);
            return view('pemilik.laporantransaksi', ['services' => $services, 'start_date' => $request->start_date, 'end_date' => $request->end_date]);
        }
    }

    public function laporan_pdf($start_date, $end_date)
    {
        if ($start_date == 'semua' && $end_date == 'semua') {
            $data = Service::all();
        } else {
            // $data = LaporanModel::where('tanggal','LIKE',$request->start_date)->where('tanggal','LIKE',$request->end_date)->paginate();
            $data = Service::whereBetween('tanggal', [$start_date, $end_date])->get();            
        }
        // dd("$start_date");
        
        $pdf = PDF::loadView('templatepdf', ['data' => $data]);
     
        return $pdf->download('LaporanTransaksi2022.pdf');
    
    }

    public function laporan_excelpemilik($start_date, $end_date)
    {
        // dd("$start_date - $end_date");
        return Excel::download(new LaporanTransaksiExport($start_date, $end_date), 'LaporanTransaksi2022.xlsx');
    }

}
