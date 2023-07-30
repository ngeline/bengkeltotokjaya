<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailService;
use Illuminate\Http\Request;

class LaporanPengeluaranController extends Controller
{
    public function index(Request $request)
    {
        $month = $request->month;
        $sparepart = DetailService::select('sparepartName')->selectRaw('SUM(total_sparepart) as total_spareparts')->whereMonth('created_at', date('m'))->groupBy('sparepartName')->paginate(10);
        
        if ($month) {
            $explode_month = explode('-', $month);
            $sparepart = DetailService::select('sparepartName')->selectRaw('SUM(total_sparepart) as total_spareparts')->whereMonth('created_at', $explode_month[0])->groupBy('sparepartName')->paginate(10);
        }

        return view('admin.laporan_pengeluaran', [
            'spareparts' => $sparepart
        ]);
    }
}
