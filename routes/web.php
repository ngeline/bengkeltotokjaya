<?php

use Illuminate\Support\Facades\Route;

//Luar
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\UserChartController;
// Admin
use App\Http\Controllers\Admin\BookingDataController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\TypeServiceController;
use App\Http\Controllers\Admin\CustomerServiceController;
// use App\Http\Controllers\Admin\BookingPanggilanController;
// use App\Http\Controllers\Admin\ContactController;

// Pemilik
use App\Http\Controllers\Pemilik\PerkembanganController;
use App\Http\Controllers\Pemilik\InvoiceServiceController;
use App\Http\Controllers\Pemilik\LaporanServiceController;
use App\Http\Controllers\Pemilik\LaporanSparepartController;
use App\Http\Controllers\Pemilik\LaporanTransaksiController;
use App\Http\Controllers\Visitor;



use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LayananController;
// model

use App\Models\DetailService;
use App\Models\JenisService;
use App\Models\Category;
use Illuminate\Support\Facades\DB;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home', [
        'jenis_services' => JenisService::paginate(10),
        'categories' => Category::all()
    ]);
});

Auth::routes();

Route::get('/beranda', [HomeController::class, 'beranda']);
Route::get('/home', [HomeController::class, 'home']);
//login
Route::get('/login', [LoginController::class, 'login'])->name('Login');

//register
Route::get('/register', [LoginController::class, 'register'])->name('Register');

//logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//postlogin
Route::POST('/postlogin', [LoginController::class, 'postlogin'])->name('postLogin');

//reject
Route::get('/reject', [LoginController::class, 'reject'])->name('reject');

//rejectrole
Route::get('/rejectrole', [LoginController::class, 'rejectrole'])->name('rejectrole');
Route::auth();


// Route::group(['middleware' => ['web', 'auth','cekrole']], function(){      // web untuk koneksi ke web, auth untuk authentication check, cekrole untuk cek level user
//     Route::group(['cekrole' => 'admin'], function(){   // jika rolenya superadmin
//         // Route::prefix('admin')->group(function(){
//         Route::prefix('admin')->name('admin.')->group(function(){ //
//             Route::get('home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('home');
//             Route::resource('user', 'App\Http\Controllers\Admin\CustomerController');
//             Route::resource('montir', 'App\Http\Controllers\Admin\MontirController');
//             Route::resource('typeService', 'App\Http\Controllers\Admin\TypeServiceController');
//             Route::resource('category', 'App\Http\Controllers\Admin\CategoryController');
//             Route::resource('sparepart', 'App\Http\Controllers\Admin\SparepartController');


Route::group(['middleware' => ['web', 'auth', 'cekrole']], function () { // web untuk koneksi ke web, auth untuk authentication check, cekrole untuk cek level user


    Route::group(['cekrole' => 'admin'], function () { // jika rolenya superadmin

        Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');
        Route::resource('user', 'App\Http\Controllers\Admin\CustomerController');
        Route::resource('montir', 'App\Http\Controllers\Admin\MontirController');
        Route::resource('typeService', 'App\Http\Controllers\Admin\TypeServiceController');
        Route::resource('category', 'App\Http\Controllers\Admin\CategoryController');
        Route::resource('spareparts', 'App\Http\Controllers\Admin\SparepartController');
        // Route::resource('contact', 'App\Http\Controllers\Admin\ContactController');

        // Sif
        Route::resource('/user', CustomerController::class)->except(['destroy']);
        Route::get('/user/{customers}/delete', [CustomerController::class, 'destroy'])->name('customers.destroy');

        // Booking Data
        Route::get('bookingdata', [App\Http\Controllers\Admin\BookingDataController::class, 'index'])->name('bookingdata');
        Route::get('bookingdata/invoice/print/{id}', [App\Http\Controllers\Admin\BookingDataController::class, 'cetak_pdf']);
        Route::get('bookingdata/detail/{id}', [App\Http\Controllers\Admin\BookingDataController::class, 'detail']);
        Route::get('bookingdata/edit/{id}', [App\Http\Controllers\Admin\BookingDataController::class, 'edit']);
        Route::post('/bookingdataedit/{id}', [App\Http\Controllers\Admin\BookingDataController::class, 'update']);
        Route::post('bookingdata/detail/input_queue/{id}', [App\Http\Controllers\Admin\BookingDataController::class, 'save']);
        Route::get('bookingdata/invoice/{id}', [App\Http\Controllers\Admin\InvoiceController::class, 'detail']);
        Route::get('bookingdata/invoiceDone/{id}', [App\Http\Controllers\Admin\InvoiceController::class, 'invoice']);

        //
        

        // Cari Booking Data Admin
        Route::get('seePaymentTransaksi/{id}', [App\Http\Controllers\Admin\LaporanTransaksiController::class, 'seePaymentTransaksi']);
        Route::get('/caribookingdataadmin', [App\Http\Controllers\Admin\BookingDataController::class, 'bookingcari'])->name('abcari');


        // Cari service panggilan
        Route::get('/caribookingpanggilanadmin', [App\Http\Controllers\Admin\BookingPanggilanController::class, 'bookingpanggilancari'])->name('abpcari');

        // Tambah Data Service
        Route::get('/tambahbookingservice', [App\Http\Controllers\Admin\BookingDataController::class, 'tambahdatabooking']);
        Route::post('/tambahbookingservice/{id}', [App\Http\Controllers\Admin\BookingDataController::class, 'tambahservice']);

        // Cari Laporan Transaksi admin
        Route::get('/carilaporantransaksiadmin', [App\Http\Controllers\Admin\LaporanTransaksiController::class, 'transaksi'])->name('acari');

        // Laporan Transaksi Admin
        Route::get('laporantransaksiadmin', [App\Http\Controllers\Admin\LaporanTransaksiController::class, 'index'])->name('admin.laporantransaksi');

        // Route::post('seePayment/{id}',[App\Http\Controllers\Admin\BookingDataController::class, 'savePayment']);
        Route::get('seePayment/{id}', [App\Http\Controllers\Admin\BookingDataController::class, 'seePayment']);
        Route::post('bookingdata', [App\Http\Controllers\Admin\BookingDataController::class, 'update']);

        // Booking Service dan Invoice
        Route::get('/addSparepart/{idService}', [App\Http\Controllers\Admin\InvoiceController::class, 'render']);
        Route::get('/addTypeService/{idService}', [App\Http\Controllers\Admin\InvoiceController::class, 'renderService']);
        Route::post('/sparepart/need/{idSparepart}/{idService}', [App\Http\Controllers\Admin\InvoiceController::class, 'order']);
        Route::post('/TypeService/{idJenisService}/{idService}', [App\Http\Controllers\Admin\InvoiceController::class, 'addService']);

        Route::delete('sparepartDelete/{id}', [App\Http\Controllers\Admin\InvoiceController::class, 'delete']);
        Route::delete('serviceDelete/{id}', [App\Http\Controllers\Admin\InvoiceController::class, 'deleteJenis']);

        Route::post('InvoiceCompleted/{id}', [App\Http\Controllers\Admin\InvoiceController::class, 'konfirmasi']);

        //  Pesan
        Route::get('/contact', [App\Http\Controllers\Admin\ContactController::class, 'render'])->name('contact');
        Route::post('/message/reply/{id}', [App\Http\Controllers\Admin\ContactController::class, 'reply']);
        Route::delete('/message/delete/{id}', [App\Http\Controllers\Admin\ContactController::class, 'delete']);

        //  Profil Admin
        Route::get('/profileAdmin', [App\Http\Controllers\Admin\ProfileController::class, 'indexAdmin'])->name('profileAdmin');
        Route::post('/profileAdmin', [App\Http\Controllers\Admin\ProfileController::class, 'profilAdmin']);
        Route::post('/seePayment/update/{id}', [App\Http\Controllers\Admin\BookingDataController::class, 'verifikasipembayaran'])->name('seePayment.update');

        // verifikasi pembayaran
        Route::post('/sparepart/need/{id}', [App\Http\Controllers\Admin\InvoiceController::class, 'order']);

        // verfikasi pembayaran bayar langsung
        Route::get('/bookingdata/update/{id}', [App\Http\Controllers\Admin\BookingDataController::class, 'bayarlangsung'])->name('bookingdata.update');
        Route::get('/bookingpanggilan/update/{id}', [App\Http\Controllers\Admin\BookingDataController::class, 'bayarlangsungpanggilan'])->name('bookingpanggilan.update');


        // Customer Service Admin
        Route::get('/customerserviceadmin', [App\Http\Controllers\Admin\CustomerServiceAdminController::class, 'index'])->name('admin.customerserviceadmin');
        Route::get('customerServiceAdmin/{id}', [App\Http\Controllers\Admin\CustomerServiceAdminController::class, 'customerServiceAdmin']);
        Route::get('/gratisservice/{id}', [App\Http\Controllers\Admin\CustomerServiceAdminController::class, 'gratisservice']);
        Route::post('/gratisserviceberhasil/{id}', [App\Http\Controllers\Admin\CustomerServiceAdminController::class, 'proseslangsung'])->name('proseslangsung');

        // verfikasi Service Admin langsung
        Route::get('/customerserviceadmin/update/{id}', [App\Http\Controllers\Admin\CustomerServiceAdminController::class, 'proseslangsung'])->name('customerserviceadmin.update');

        // cetak excel
        Route::get('create-pdf-file/{start_date}/{end_date}', [App\Http\Controllers\Admin\LaporanTransaksiController::class, 'laporan_pdf'])->name('exportpdf');
        Route::get('/exportexcel/{start_date}/{end_date}', [App\Http\Controllers\Admin\LaporanTransaksiController::class, 'laporan_excel'])->name('exportexcel');

        // Hapus Booking Servie
        Route::get('/bookingdata/destroy/{id}', [App\Http\Controllers\Admin\BookingDataController::class, 'destroy'])->name('bookingdata.destroy');

        // Cari
        Route::post('addSparepart', [App\Http\Controllers\Admin\InvoiceController::class, 'render'])->name('addscari');




        // BOOKING PANGGILAN ADMIN



        // Booking Panggilan
        Route::get('bookingpanggilanadmin', [App\Http\Controllers\Admin\BookingPanggilanController::class, 'index'])->name('bookingpanggilanadmin');
        Route::get('bookingpanggilanadmin/invoice/print/{id}', [App\Http\Controllers\Admin\BookingPanggilanController::class, 'cetak_pdf']);
        Route::get('bookingpanggilanadmin/detail/{id}', [App\Http\Controllers\Admin\BookingPanggilanController::class, 'detail']);
        Route::get('bookingpanggilanadmin/edit/{id}', [App\Http\Controllers\Admin\BookingPanggilanController::class, 'edit']);
        Route::post('/bookingpanggilanadmin/{id}', [App\Http\Controllers\Admin\BookingPanggilanController::class, 'update']);
        Route::post('bookingpanggilanadmin/detail/input_queue/{id}', [App\Http\Controllers\Admin\BookingPanggilanController::class, 'save']);
        Route::get('bookingpanggilanadmin/invoice/{id}', [App\Http\Controllers\Admin\InvoiceController::class, 'detail']);
        Route::get('bookingpanggilanadmin/invoiceDone/{id}', [App\Http\Controllers\Admin\InvoiceController::class, 'invoice']);
        // Hapus Booking Servie
        Route::get('/bookingpanggilanadmin/destroy/{id}', [App\Http\Controllers\Admin\BookingPanggilanController::class, 'destroy'])->name('bookingpanggilanadmin.destroy');
        

        // Route::post('seePayment/{id}',[App\Http\Controllers\Admin\BookingDataController::class, 'savePayment']);
        Route::get('seePayment/{id}', [App\Http\Controllers\Admin\BookingDataController::class, 'seePayment']);
        Route::post('bookingpanggilanadmin', [App\Http\Controllers\Admin\BookingDataController::class, 'update']);
        Route::post('/seePayment/update/{id}', [App\Http\Controllers\Admin\BookingDataController::class, 'verifikasipembayaran'])->name('seePayment.update');

        // verifikasi pembayaran
        Route::post('/sparepart/need/{id}', [App\Http\Controllers\Admin\InvoiceController::class, 'order']);

        // verfikasi pembayaran bayar langsung
        Route::get('/bookingpanggilanadmin/update/{id}', [App\Http\Controllers\Admin\BookingPanggilanController::class, 'bayarlangsung'])->name('bookingpanggilanadmin.update');
        Route::get('/bookingpanggilanadmin/update/{id}', [App\Http\Controllers\Admin\BookingPanggilanController::class, 'bayarlangsungpanggilan'])->name('bookingpanggilanadmin.update');

        // gratiservice
//         });
    });



    Route::group(['cekrole' => 'pemilik'], function () { // jika rolenya pemilik
        Route::get('/pemilik/home', [App\Http\Controllers\HomeController::class, 'pemilikHome'])->name('pemilik.home');
        Route::resource('laporansparepart', 'App\Http\Controllers\Pemilik\LaporanSparepartController');

        Route::get('laporanservice', [App\Http\Controllers\Pemilik\LaporanServiceController::class, 'index'])->name('pemilik.laporanservice');
        Route::post('laporanservice', [App\Http\Controllers\Pemilik\LaporanServiceController::class, 'index'])->name('carilapser');
        Route::get('laporanservice/invoice/print/{id}', [App\Http\Controllers\Pemilik\LaporanServiceController::class, 'cetak_pdf']);
        Route::get('laporanservice/detail/{id}', [App\Http\Controllers\Pemilik\LaporanServiceController::class, 'detail']);
        Route::post('laporanservice/detail/input_queue/{id}', [App\Http\Controllers\Pemilik\LaporanServiceController::class, 'save']);
        Route::get('laporanservice/invoice/{id}', [App\Http\Controllers\Pemilik\InvoiceServiceController::class, 'detail']);
        Route::get('laporanservice/invoiceDone/{id}', [App\Http\Controllers\Pemilik\InvoiceServiceController::class, 'invoice']);

        // Laporan
        Route::get('laporantransaksi', [App\Http\Controllers\Pemilik\LaporanTransaksiController::class, 'index'])->name('pemilik.laporantransaksi');
        Route::get('laporantransaksi/seePayment/{id}', [App\Http\Controllers\Pemilik\LaporanTransaksiController::class, 'seePayment']);

        Route::get('perkembangan', [App\Http\Controllers\Pemilik\PerkembanganController::class, 'pemilikHome'])->name('pemilik.perkembangan');

        //  Profil Admin
        Route::get('/profilePemilik', [App\Http\Controllers\ProfileController::class, 'indexPemilik'])->name('profilePemilik');
        Route::post('/profilePemilik', [App\Http\Controllers\ProfileController::class, 'profilPemilik']);

        // Cari
        Route::get('/carilaporantransaksipemilik', [App\Http\Controllers\Pemilik\LaporanTransaksiController::class, 'transaksi'])->name('pcari');

        // Cari laporan transaksi pemilik
        Route::post('laporantransaksi', [App\Http\Controllers\Pemilik\LaporanServiceController::class, 'index'])->name('carilaptran');

        // cetak excel pemilik
        Route::get('/exportexcelpemilik/{start_date}/{end_date}', [App\Http\Controllers\Pemilik\LaporanTransaksiController::class, 'laporan_excelpemilik'])->name('exportexcelpemilik');
        Route::resource('daterange', 'DateRangeController');
    });


    Route::group(['cekrole' => 'pelanggan'], function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('/contactCus', [App\Http\Controllers\ContactController::class, 'index'])->name('contactCus');
        Route::post('contact/{id}', [App\Http\Controllers\ContactController::class, 'save']);
        Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
        Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
        Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'update']);
        Route::get('/booking', [App\Http\Controllers\ServiceController::class, 'index']);
        Route::post('/booking/{id}', [App\Http\Controllers\ServiceController::class, 'save']);
        Route::get('/bookingpanggilan', [App\Http\Controllers\ServicePanggilanController::class, 'index']);
        Route::post('/bookingpanggilan/{id}', [App\Http\Controllers\ServicePanggilanController::class, 'save']);
        Route::post('/historyEdit/{id}', [App\Http\Controllers\HistoryController::class, 'update']);
        Route::get('/history', [App\Http\Controllers\HistoryController::class, 'index'])->name('history');
        Route::get('history/{id}', [App\Http\Controllers\HistoryController::class, 'detail']);
        Route::get('payment/{id}', [App\Http\Controllers\PaymentController::class, 'index']);
        Route::get('history/seePayment/{id}', [App\Http\Controllers\PaymentController::class, 'seePayment']);
        Route::post('payment/{id}', [App\Http\Controllers\PaymentController::class, 'save']);
        Route::get('/sparepart', [App\Http\Controllers\SparepartController::class, 'render'])->name('sparepart');
        Route::get('cari', [App\Http\Controllers\SparepartController::class, 'cari']);
        Route::get('/sparepart/category/{category}', [App\Http\Controllers\CategoryController::class, 'render'])->name('spareparts.category');
        Route::get('invoice/{id}', [App\Http\Controllers\HistoryController::class, 'invoice']);
        Route::get('/invoice/print/{id}', [App\Http\Controllers\HistoryController::class, 'cetak_pdf']);
        Route::get('/serviceHistory', [App\Http\Controllers\HistoryController::class, 'index_service'])->name('serviceHistory');
        Route::get('serviceHistory/{id}', [App\Http\Controllers\HistoryController::class, 'detail_service']);

        Route::post('notifikasi/{id}', [App\Http\Controllers\NotifikasiController::class, 'customerservice']);
        Route::get('/notifikasi', [App\Http\Controllers\NotifikasiController::class, 'index'])->name('index');
        Route::get('notifikasi/{id}', [App\Http\Controllers\NotifikasiController::class, 'notifikasi']);


        Route::get('/customerService', [App\Http\Controllers\CustomerServiceController::class, 'index'])->name('index');
        Route::get('customerService/{id}', [App\Http\Controllers\CustomerServiceController::class, 'customerservice']);

        // Layanan
        Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');
    });
});
