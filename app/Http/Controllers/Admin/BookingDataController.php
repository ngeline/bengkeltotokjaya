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
use App\Models\Montir;
use App\Models\JenisService;
use Carbon\Carbon;
use App\Models\User;
use Auth;
// use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf;

class BookingDataController extends Controller
{
    protected $status_service = "booking service";

    public function index(){
        $services =  DB::table('services')
        ->join('users', 'services.user_id', '=', 'users.id')
        ->select('users.name', 'services.service_date', 'services.status', 'status_service', 'queue', 'no_antrian','montir', 'services.id')
        ->whereIn('services.status',['Menunggu diproses','Servis diproses','Servis selesai','Menunggu pembayaran','Sudah mengirim pembayaran'])
        ->whereIn('services.status_service',['booking service'])
        ->orderBy('services.created_at','desc')
        ->paginate(10);
        // dd($services);
        return view('admin.bookingdata', compact('services'));
    }

    public function detail(Request $request, $id)
    {
        // $booking = Service::where('id', $id)->get()->load('id');
    	$booking = Service::where('id', $id)->first();
        $bookings = Service::where('id', $booking->id)->get();
        $datamt = Montir::whereIn('status',['aktif'])->get();
     	return view('admin.bookingdetail', compact('booking', 'bookings','datamt'));
    }

    public function edit($id)
    {
        $booking = Service::where('id', $id)->first();
        $bookings = Service::where('id', $booking->id)->get();
        $categories = Category::all();
        $datamt = Montir::whereIn('status',['aktif'])->get();

        return view('admin.editbookingdata', compact('bookings', 'booking', 'categories','datamt'));
    }

    public function update1(Request $request, $id)
    {
        //memanggil model, query simmpan data
        $booking = Service::where('id', $id)->first();

        //sebelah kiri nama di DB dan sebelah kanan nama diform (view)
        $booking->name_stnk = $request->name_stnk;
        $booking->number_plat = $request->number_plat;
        $booking->nama_mobil = $request->nama_mobil;
        $booking->jenis_mobil = $request->jenis_mobil;
        $booking->service_date = $request->service_date;
        $booking->complaint = $request->complaint;

        $booking->save();

        //redirect kembali ke halaman sebelumnya
        return redirect('bookingdata');
    }

    public function update(Request $request, $id)
    {

        $booking = Service::findOrFail($id);
        $booking->name_stnk = $request->name_stnk;
        $booking->number_plat = $request->number_plat;
        $booking->nama_mobil = $request->nama_mobil;
        $booking->jenis_mobil = $request->jenis_mobil;
        $booking->montir = $request->montir;
        $booking->complaint = $request->complaint;
        $booking->update();
        alert()->success('Booking berhasil diperbarui', 'Success');
        return redirect('bookingdata');
    }

    public function save(Request $request, $id){

        if ($request->status == "Servis diproses") {
            $service = Montir::where('name', $request->montir)->update(['status'=> 'Bekerja']);
        } elseif ($request->status == "Servis selesai") {
            $service = Montir::where('name', $request->montir)->update(['status'=> 'Aktif']);
        }
        $service = Service::where('id', $id)->first();
        $service->status = $request->status;
        $service->queue= $request->queue;
        $service->montir= $request->montir;
        $service->update();
        alert()->success('Input data is successfull');
        return redirect('bookingdata');
    }

    public function seePayment($id){
        $service = Service::where('id', $id)->first();
        $payments = Payment::where('service_id', $service->id)->first();
        $booking = Service::where('id', $id)->first();
    	return view('admin.seePayment', compact('service', 'payments','booking'));
    }


    // cari booking data
    public function bookingcari(Request $request)
    {

        if (empty($request->all())) {
            $services =  DB::table('services')
            ->join('users', 'services.user_id', '=', 'users.id')
            ->select('users.name', 'services.service_date', 'services.status', 'no_antrian' , 'status_service', 'queue', 'montir' , 'nama_mobil', 'number_plat','services.id','total_price')
            ->whereIn('services.status', ['Menunggu diproses','Servis diproses','Servis selesai','Menunggu pembayaran','Sudah mengirim pembayaran'])
            ->orderBy('services.created_at','desc')
            ->paginate(10);

            return view('admin.bookingdata', ['services' => $services]);
        } else {
            $services =  DB::table('services')
            ->join('users', 'services.user_id', '=', 'users.id')
            ->select('users.name', 'services.service_date', 'services.status', 'no_antrian' , 'status_service', 'queue', 'montir' , 'nama_mobil', 'number_plat','services.id','total_price')
            ->whereIn('services.status', ['Menunggu diproses','Servis diproses','Servis selesai','Menunggu pembayaran','Sudah mengirim pembayaran'])
            ->whereBetween('services.tanggal', [$request->start_date, $request->end_date])
            ->orderBy('services.created_at','desc')
            ->paginate(10);
            return view('admin.bookingdata', ['services' => $services, 'start_date' => $request->start_date, 'end_date' => $request->end_date]);
        }
    }


    // bayar langsung
    public function bayarlangsung(Request $request, $id)
    {
        $detailservice = Service::where('id', $id)->first();
        // dd ($detailservice);
        $payment = Payment::create(['service_id'=> $id , 'namaRek'=> Auth::user()->name, 'bank'=> '-' , 'total'=> $detailservice->total_price, 'order_date'=> Carbon::now(), 'pembayaran' => 'Pembayaran ditempat']);
        $service = Service::where('id', $id)->first();
        // dd($service);
        $service-> status= 'Pembayaran diverifikasi' ;
        $service->update();

        // dd($service);

        // Proses notif
        // $a = Service::where('user_id', $service->user_id)->id;
        $totalservice = Service::where('user_id', $service->user_id)->whereIn('status',['Pembayaran diverifikasi'])->get();
        if (count($totalservice)>=10){
            $customerservice = new CustomerService();
            $customerservice->user_id = $service->user_id;
            $customerservice->keterangan = 'Gratis 1x layanan servis (Tune Up)';
            $customerservice->expired_at = Carbon::now()->addDays(180); // menambah 180 hari kedepan
            $customerservice->save();
        }

        alert()->success('Bayar langsung sukses!');
        return redirect('bookingdata');
    }

    public function bayarlangsungpanggilan(Request $request, $id)
    {
        $detailservice = Service::where('id', $id)->first();
        // dd ($detailservice);
        $payment = Payment::create(['service_id'=> $id , 'namaRek'=> Auth::user()->name, 'bank'=> '-' , 'total'=> $detailservice->total_price, 'order_date'=> Carbon::now(), 'pembayaran' => 'Pembayaran ditempat']);
        $service = Service::where('id', $id)->first();
        // dd($service);
        $service-> status= 'Pembayaran diverifikasi' ;
        $service->update();

        // dd($service);

        // Proses notif
        // $a = Service::where('user_id', $service->user_id)->id;
        $totalservice = Service::where('user_id', $service->user_id)->whereIn('status',['Pembayaran diverifikasi'])->get();
        if (count($totalservice)>=10){
            $customerservice = new CustomerService();
            $customerservice->user_id = $service->user_id;
            $customerservice->keterangan = 'Gratis 1x layanan servis (Tune Up)';
            $customerservice->expired_at = Carbon::now()->addDays(180); // menambah 180 hari kedepan
            $customerservice->save();
        }

        alert()->success('Bayar langsung sukses!');
        return redirect('bookingdata');
    }

    public function verifikasipembayaran(Request $request, $id)
    {
        if ($request->status == "Menunggu Pembayaran") {
            $service = Service::where('id', $id)->update(['status'=> 'Menunggu pembayaran','keterangan'=> 'Transaksi Anda tidak dapat diselesaikan. Harap mengirim ulang bukti bayar asli']);
            $service = Payment::where('service_id', $id)->delete();
            // $service-> keterangan = 'Transaksi Anda tidak dapat diselesaikan. Harap upload ulang bukti bayar asli' ;
            // $service = Service::create(['keterangan' => 'Transaksi Anda tidak dapat diselesaikan. Harap upload ulang bukti bayar asli']);
        } elseif ($request->status == "Sudah mengirim pembayaran") {
            $service = 'Pembayaran diverifikasi';
            $service = Service::where('id', $id)->update(['status'=> 'Pembayaran diverifikasi']);
        }
        return redirect ('bookingdata');

    }

    public function savePayment(Request $request, $id){

        $service = Service::where('id', $id)->first();
        $service->status = $request->status;
        $service->update();
        alert()->success('Input data is successfull');
        return redirect('bookingdata');
    }

    public function updatePayment(Request $request, $id)
    {

        $service = Service::findOrFail($id);
        $service->status = $request->status;
        $service->update();
        alert()->success('Booking berhasil diperbarui', 'Success');
        return redirect('bookingdata');
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
        // return $pdf->stream();
        return $pdf->download('invoice.pdf');
    }


    public function destroy($id)
    {
        $service = Service::where('id', $id)->first();
        $service->delete();

        return redirect()->back()->with('success', 'Berhasil Menghapus data laporan atas nama '.$service->user_id);
    }


    // Tambah Data Booking Service-------------------------------------------


    public function tambahdatabooking()
    {
        $user = User::whereIn('role_id',['pelanggan','non-aktif'])->get();
        $datamt = Montir::whereIn('status',['aktif'])->get();
        $jenis_service = JenisService::all();

        return view('admin.tambahbookingservice', ['categories' => Category::all(),'datamt'=> $datamt, 'user' => $user, 'jenis_services' => $jenis_service]);
    }

    private function getNoAntrian(){
        //Set Default Tanggal Sekarang (Indonesia)
        date_default_timezone_set("Asia/Jakarta");

        //Panjang Data Berdasarkan Hari Ini
        $jumlah_hari_ini = Service::where('tanggal',date('Y-m-d'))
            ->where('status_service', $this->status_service)
            ->count();

        //Panjang Data Hari Ini Ditambah 1
        $noAntrian = $jumlah_hari_ini + 1;
        $rubahTipe = strval($noAntrian);
        $hasil = "A $rubahTipe";

        return $hasil;
    }

    private function getTanggal(){
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date('Y-m-d');

        return $tanggal;
    }

    public function tambahservice(Request $request, $id)
    {
        date_default_timezone_set("Asia/Jakarta");

        $user = User::where('id', $id)->first();
        $service = Service::where('user_id', $user->id)->first();
        $service= new Service();
        $service->user_id = $request->user;
        $service->no_antrian = $this->getNoAntrian();
        $service->tanggal = $this->getTanggal();
        $service->name_stnk = $request->name_stnk;
        $service->number_plat = $request->number_plat;
        $service->nama_mobil = $request->nama_mobil;
        $service->jenis_mobil = $request->jenis_mobil;
        $service->montir = $request->montir;
        $service->status_service = 'booking service';
        $service->service_date = now();
        $service->complaint = $request->complaint;
        $service->expired_at = Carbon::now()->addDays(1); // menambah 1 hari kedepan
        $service->save();

        $jenisServices = JenisService::where('name', $request->jenis_service)->first();

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


        Montir::where('name', $request->montir)->update(['status'=> 'Bekerja']);
        alert()->success('Tambah Data Service Berhasil!!!');
        return redirect('bookingdata');
    }
}
