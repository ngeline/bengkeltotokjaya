<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\DetailService;
use App\Models\JenisService;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Service;
use App\Models\CustomerService;
use App\Models\Sparepart;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use App\Notifications\UserNotification;

class HomeController extends Controller
// {
//     /**
//      * Create a new controller instance.
//      *
//      * @return void
//      */
//     public function __construct()
//     {
//         $this->middleware('auth');
//     }

//     /**
//      * Show the application dashboard.
//      *
//      * @return \Illuminate\Contracts\Support\Renderable
//      */
//     public function index()
//     {
//         return view('home');
//     }
// }



{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'jenis_services' =>JenisService::all(),
            'categories' => Category::all()
        ]);
    }

    public function beranda()
    {
        return view('beranda', [
            'jenis_services' =>JenisService::all(),
            'categories' => Category::all()
        ]);
    }


    public function adminHome(Request $request)
    {
        $today = Carbon::today();
        $sparepart = Sparepart::count();
        $category = Category::count();
        $user = User::count();
        $jenisService = JenisService::count();
        $contact = Contact::count();
        $booking = Service::count();
        $payment = Payment::where('created_at', "like", "%")->sum('total');
        $customerservice = CustomerService::count();
        $transaksiclear = Service::whereIn('status',['Pembayaran diverifikasi']);

        $users = Service::select(DB::raw("COUNT(*) as count"))
                    ->whereIn('status',['Pembayaran diverifikasi'])
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count');

        // stok terlaris
        $st = DetailService::select("sparepartName",DB::raw("SUM(total_sparepart) as total_sparepart"))
        ->limit(10)
        ->groupBy('sparepartName')
        ->orderByDesc('total_sparepart');
        $totalsparepart = $st->pluck('total_sparepart');
        $namasparepart = $st->pluck('sparepartName');
        $totalsparepart = $totalsparepart->map(function($item, $key) {
            $item = (int)$item;
            return $item;
        });

        //stok diatas 50 (banyak)
        $sb = Sparepart::select("nameS",DB::raw("SUM(stock) as stock"))
        ->limit(20)
        ->groupBy('nameS')
        ->where('stock','>=','50')
        ->orderByDesc('stock');
        $sparepartbanyak= $sb->pluck('stock');
        $namasparepartbanyak = $sb->pluck('nameS');
        $sparepartbanyak = $sparepartbanyak->map(function($item, $key) {
            $item = (int)$item;
            return $item;
        });

        //stok dibawah 50 (sedikit)
        $ss = Sparepart::select("nameS",DB::raw("SUM(stock) as stock"))
        ->limit(20)
        ->groupBy('nameS')
        ->where('stock','<=','50')
        ->orderBy('stock');
        $sparepartsedikit = $ss->pluck('stock');
        $namasparepartsedikit = $ss->pluck('nameS');
        $sparepartsedikit = $sparepartsedikit->map(function($item, $key) {
            $item = (int)$item;
            return $item;
        });

        return view('admin.adminHome', compact('today','sparepart', 'category', 'user', 'jenisService', 'contact', 'booking', 'users', 'payment','st' ,'totalsparepart' , 'namasparepart', 'namasparepartsedikit', 'sparepartsedikit', 'sb', 'namasparepartbanyak', 'sparepartbanyak','customerservice','transaksiclear' ));
    }

    public function pemilikHome()
    {
        $today = Carbon::today();
        $sparepart = Sparepart::count();
        $category = Category::count();
        $user = User::count();
        $jenisService = JenisService::count();
        $contact = Contact::count();
        $booking = Service::count();
        $payment = Payment::where('created_at', "like", "%")->sum('total');
        $customerservice = CustomerService::count();
        $transaksiclear = Service::whereIn('services.status',['Menunggu diproses']);

        $users = User::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count');

       $st = DetailService::select("sparepartName",DB::raw("SUM(total_sparepart) as total_sparepart"))
        ->groupBy('sparepartName')
        ->orderByDesc('total_sparepart');
        $totalsparepart = $st->pluck('total_sparepart');
        $namasparepart = $st->pluck('sparepartName');
        $totalsparepart = $totalsparepart->map(function($item, $key) {
            $item = (int)$item;
            return $item;
        });

        //stok sedikit
        $ss = Sparepart::select("nameS",DB::raw("SUM(stock) as stock"))
        ->groupBy('nameS')
        ->orderByDesc('stock');
        $sparepartsedikit = $ss->pluck('stock');
        $namasparepartsedikit = $ss->pluck('nameS');
        $sparepartsedikit = $sparepartsedikit->map(function($item, $key) {
            $item = (int)$item;
            return $item;
        });

        // ****** Stok Terlaris Berdasarkan Laporan ****** //
        return view('pemilik.pemilikHome', compact('today','sparepart', 'category', 'user', 'jenisService', 'contact', 'booking', 'users', 'payment','st' ,'totalsparepart' , 'namasparepart', 'namasparepartsedikit', 'sparepartsedikit', 'customerservice','transaksiclear' ));
    }

}
