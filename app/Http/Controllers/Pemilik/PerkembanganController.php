<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\JenisService;
use App\Models\DetailService;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Service;
use App\Models\Sparepart;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use App\Notifications\UserNotification;


class PerkembanganController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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



    public function pemilikHome()
    {
        $users = User::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count');

                    // ****** Stok Terlaris Berdasarkan Laporan ****** //
        $st = DetailService::select("sparepartName",DB::raw("SUM(total_sparepart) as total_sparepart"))
        ->groupBy('sparepartName')
        ->orderByDesc('total_sparepart');
        $totalsparepart = $st->pluck('total_sparepart');
        $namasparepart = $st->pluck('sparepartName');
        $totalsparepart = $totalsparepart->map(function($item, $key) {
            $item = (int)$item;
            return $item;
        });
        
    // ****** Stok Terlaris Berdasarkan Laporan ****** //


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
        return view('pemilik.perkembangan', compact('users', 'st','totalsparepart','namasparepart','ss','sparepartsedikit','namasparepartsedikit'));
        
    }


    public function notify()
    {

        if(auth()->user()){
            
            $user = User::first();

            auth()->user()->notify(new UserNotification($user));
        }

        dd('done');
    }
}
