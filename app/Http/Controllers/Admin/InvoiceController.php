<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Sparepart;
use App\Models\Category;
use Alert;
use App\Models\DetailJenisService;
use App\Models\DetailService;
use Illuminate\Support\Facades\Auth;
use App\Models\JenisService;

use function GuzzleHttp\Promise\all;

class InvoiceController extends Controller
{
    public function detail($id)
    {
        $booking = Service::where('id', $id)->where('status', 'Servis selesai')->first();
        $bookings = Service::where('id', $booking->id)->get();
        $jenisServices = JenisService::all();
        $service_details = [];
        if (!empty($booking)) {
            $service_details = DetailService::where('service_id', $booking->id)->get();

        }
        $detailJenis = [];
        if (!empty($booking)) {
            $detailJenis = DetailJenisService::where('service_id', $booking->id)->get();

        }
        return view('admin.invoice', compact('booking', 'bookings', 'jenisServices', 'service_details', 'detailJenis'));
    }

    public function render(Request $request, $idService)
    {
        $id_service = $idService;

        if (empty($request->all())) {
            $spareparts = DB::table('spareparts')
                ->join('categories', 'spareparts.category_id', '=', 'categories.id')
                ->select('categories.name', 'spareparts.nameS', 'spareparts.price', 'spareparts.stock', 'spareparts.id', 'spareparts.biayaPemasangan')
                ->get();
            $category = Category::all();
            return view('admin.addSparepart', compact('spareparts', 'category', 'id_service'));
        } else {
            $cari = $request->cari;
            $spareparts = Sparepart::where('categories.name', 'like', "%" . $cari . "%")
                ->orWhere('nameS', 'LIKE', '%' . $cari . '%')
                ->orWhere('price', 'LIKE', '%' . $cari . '%')
                ->orWhere('biayaPemasangan', 'LIKE', '%' . $cari . '%')
                ->orWhere('stock', 'LIKE', '%' . $cari . '%')
                ->join('categories', 'spareparts.category_id', '=', 'categories.id')
                ->select('categories.name', 'spareparts.nameS', 'spareparts.price', 'spareparts.stock', 'spareparts.id', 'spareparts.biayaPemasangan')
                ->paginate();
            $category = Category::all();
            return view('admin.addSparepart', compact('spareparts', 'category', 'cari', 'id_service'));

        }
    }

    public function index1(Request $request)
    {
        if (empty($request->all())) {
            $services = DB::table('services')
                ->join('users', 'services.user_id', '=', 'users.id')
                ->select('users.name', 'services.service_date', 'services.status', 'queue', 'no_antrian', 'nama_mobil', 'montir', 'services.id')
                ->get();
            return view('pemilik.laporanservice', compact('services'));
        } else {
            $cari = $request->cari;
            $services = Service::where('users.name', 'like', "%" . $cari . "%")
                ->orWhere('status', 'LIKE', '%' . $cari . '%')
                ->orWhere('montir', 'LIKE', '%' . $cari . '%')
                ->orWhere('no_antrian', 'LIKE', '%' . $cari . '%')
                ->orWhere('nama_mobil', 'LIKE', '%' . $cari . '%')
                ->orWhere('tanggal', 'LIKE', '%' . $cari . '%')
                ->join('users', 'services.user_id', '=', 'users.id')
                ->select('users.name', 'services.service_date', 'services.status', 'queue', 'no_antrian', 'nama_mobil', 'montir', 'services.id')
                ->paginate();
            return view('pemilik.laporanservice', compact('services', 'cari'));
        }
    }

    public function renderService($idService)
    {
        $jenisServices = JenisService::all();
        $category = Category::all();
        $id_service = $idService;

        return view('admin.addTypeService', compact('jenisServices', 'category', 'id_service'));

    }

    public function order(Request $request, $idSparepart, $idService)
    {
        $sparepart = Sparepart::where('id', $idSparepart)->first();

        //jika melebihi stok
        if ($request->total_sparepart > $sparepart->stock) {
            return redirect('/addSparepart');
        }

        //cek validasi
        // $check_service = Service::where('status', 'Servis selesai')->first();
        $check_service = Service::where('id', $idService)->first();
        //menyimpang ke database Service
        if (empty($check_service)) {
            $check_service->total_price = 0;
            $check_service->update();
        }


        //simpan ke databaseServicedetail
        // $new_service = Service::where('status', 'Servis selesai')->first();
        $new_service = Service::where('id', $idService)->first();

        //cek Servicedetail
        $check_service_detail = DetailService::where('sparepart_id', $sparepart->id)
            ->where('service_id', $new_service->id)
            ->first();

        if (empty($check_service_detail)) {
            $service_detail = new DetailService();
            $service_detail->service_id = $new_service->id;
            $service_detail->sparepart_id = $sparepart->id;
            $service_detail->sparepartName = $sparepart->nameS;
            $service_detail->total_sparepart = $request->total_sparepart;
            $service_detail->price = $sparepart->price;
            $service_detail->biayaPemasangan = $sparepart->biayaPemasangan;
            $service_detail->total_price = $sparepart->price * $request->total_sparepart + $sparepart->biayaPemasangan;
            $service_detail->save();

        } else {
            $service_detail = DetailService::where('sparepart_id', $sparepart->id)->where('service_id', $new_service->id)->first();

            $service_detail->total_sparepart = $service_detail->total_sparepart + $request->total_sparepart;

            //harga sekarang
            $newPrice_service_detail = $sparepart->price * $request->total_sparepart;
            $service_detail->total_price = $service_detail->total_price + $newPrice_service_detail;
            $service_detail->update();
        }

        //jumlah total
        $service = Service::where('status', 'Servis selesai')->first();
        $service->total_price = $service->total_price + $sparepart->price * $request->total_sparepart + $sparepart->biayaPemasangan;
        $service->update();
        alert()->success('Berhasil menambahkan sparepart ke tagihan', 'Success');
        return redirect('bookingdata/invoice/' . $new_service->id);

    }

    public function addService($idJenisService, $idService)
    {
        $jenisServices = JenisService::where('id', $idJenisService)->first();


        //simpan ke databaseServicedetail
        // $new_service = Service::where('status', 'Servis selesai')->first();
        $new_service = Service::where('id', $idService)->first();

        //cek Servicedetail
        $check_jenisService_detail = DetailJenisService::where('jenisService_id', $jenisServices->id)
            ->where('service_id', $new_service->id)
            ->first();

        if (empty($check_jenisService_detail)) {
            $service_detail = new DetailJenisService();
            $service_detail->service_id = $new_service->id;
            $service_detail->jenisService_id = $jenisServices->id;
            $service_detail->serviceName = $jenisServices->name;
            $service_detail->price = $jenisServices->price;
            $service_detail->save();

        }

        //jumlah total
        // $service = Service::where('status', 'Servis selesai')->first();
        $service = Service::where('id', $idService)->first();
        $service->priceService = $service->priceService + $jenisServices->price;
        $service->total_price = $service->total_price + $jenisServices->price;
        $service->update();
        alert()->success('Berhasil menambahkan tipe service ke tagihan', 'Success');
        return redirect('bookingdata/invoice/' . $new_service->id);

    }

    //  $sparepart = Sparepart::where('id', $id)->first();
    //  $service->total_price = $service->total_price + $sparepart->price*$request->total_sparepart+$sparepart->biayaPemasangan;

    public function delete($id)
    {
        $service_detail = DetailService::where('id', $id)->first();
        $service = Service::where('id', $service_detail->service_id)->first();

        // $service->total_price =  $service->total_price - $service_detail->total_price-$service_detail->biayaPemasangan;


        $service->total_price = $service->total_price - $service_detail->total_price;
        $service->update();


        $service_detail->delete();

        alert()->error('Sparepart Anda berhasil dihapus', 'Deleted');
        return redirect('bookingdata/invoice/' . $service->id);
    }

    public function deleteJenis($id)
    {
        $detailJenis = DetailJenisService::where('id', $id)->first();
        $service = Service::where('id', $detailJenis->service_id)->first();

        $service->priceService = $service->priceService - $detailJenis->price;
        $service->total_price = $service->total_price - $detailJenis->price;
        $service->update();


        $detailJenis->delete();

        alert()->error('Tipe Service berhasil dihapus', 'Deleted');
        return redirect('bookingdata/invoice/' . $service->id);
    }

    public function konfirmasi($id)
    {
        $service = Service::where('id', $id)->where('status', 'Servis selesai')->first();
        $service_id = $service->id;
        $service->status = 'Menunggu pembayaran';
        $service->update();
        $service_details = DetailService::where('service_id', $service_id)->get();
        foreach ($service_details as $service_detail) {
            $sparepart = Sparepart::where('id', $service_detail->sparepart_id)->first();
            $sparepart->stock = $sparepart->stock - $service_detail->total_sparepart;
            $sparepart->update();
        }

        alert()->success('Invoice Berhasil disimpan. Tolong, beri tahu pelanggan untuk melakukan pemembayaran!');
        return redirect('bookingpanggilanadmin');
    }

    public function invoice($id)
    {
        $booking = Service::where('id', $id)->first();
        $bookings = Service::where('id', $booking->id)->get();
        $jenisServices = JenisService::all();
        $service_details = [];
        if (!empty($booking)) {
            $service_details = DetailService::where('service_id', $booking->id)->get();

        }
        $detailJenis = [];
        if (!empty($booking)) {
            $detailJenis = DetailJenisService::where('service_id', $booking->id)->get();

        }
        return view('admin.invoiceDone', compact('bookings', 'booking', 'jenisServices', 'service_details', 'detailJenis'));
    }



}
