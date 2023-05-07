<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\CustomerService;
use Alert;
use App\Models\Category;
use App\Models\DetailJenisService;
use App\Models\Payment;
use App\Models\DetailService;
use App\Models\JenisService;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;
use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Excel;

class LaporanTransaksiController extends Controller
{
    public function index(){
        // $service = Service::all()->load('payments', 'user')->dd();
        $services =  DB::table('services')
        ->join('users', 'services.user_id', '=', 'users.id')
        ->select('users.name', 'services.service_date', 'services.status', 'queue',  'nama_mobil', 'number_plat','services.id','total_price')
        ->whereIn('services.status', ['Sudah mengirim pembayaran','Pembayaran diverifikasi'])
        ->orderBy('services.created_at','desc')
        ->paginate(10);
        return view('admin.laporantransaksi', compact('services'));
    }

    public function detail($id)
    {
    	$booking = Service::where('id', $id)->first();
        $bookings = Service::where('id', $booking->id)->get();
     	return view('admin.transaksidetail', compact('booking', 'bookings'));
    }

    public function save(Request $request, $id){
        
        $service = Service::where('id', $id)->first();
        $service->status = $request->status;
        $service->queue= $request->queue;
        $service->update();
        alert()->success('Input data is successfull');
        return redirect('bookingdata');
    }

    public function seePaymentTransaksi($id){
        $service = Service::where('id', $id)->first();
        $payments = Payment::where('service_id', $service->id)->first();
        $booking = Service::where('id', $id)->first();
    	return view('admin.seePaymentTransaksi', compact('service', 'payments','booking'));
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

    public function transaksi(Request $request)
    {
      
        if (empty($request->all())) {
            $services =  DB::table('services')
            ->join('users', 'services.user_id', '=', 'users.id')
            ->select('users.name', 'services.service_date', 'services.status', 'queue',  'nama_mobil', 'number_plat','services.id','total_price')
            ->whereIn('services.status', ['Sudah mengirim pembayaran','Pembayaran diverifikasi'])
            ->orderBy('services.created_at','desc')
            ->paginate(10);

            return view('admin.laporantransaksi', ['services' => $services]);
        } else {
            $services =  DB::table('services')
            ->join('users', 'services.user_id', '=', 'users.id')
            ->select('users.name', 'services.service_date', 'services.status', 'queue',  'nama_mobil', 'number_plat','services.id','total_price')
            ->whereIn('services.status', ['Sudah mengirim pembayaran','Pembayaran diverifikasi'])
            ->whereBetween('services.tanggal', [$request->start_date, $request->end_date])
            ->orderBy('services.created_at','desc')
            ->paginate(10);
            return view('admin.laporantransaksi', ['services' => $services, 'start_date' => $request->start_date, 'end_date' => $request->end_date]);
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

    public function laporan_excel($start_date, $end_date)
    {
        // dd("$start_date - $end_date");
        return Excel::download(new LaporanTransaksiExport($start_date, $end_date), 'LaporanTransaksi2022.xlsx');
    }

}
