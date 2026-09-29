<?php
use App\Http\Controllers\CommodityAcquisitionController;
use App\Http\Controllers\CommodityController;
use App\Http\Controllers\CommodityLocationController;
use App\Http\Controllers\CommodityInController;
use App\Http\Controllers\CommodityOutController;
use App\Http\Controllers\CommodityLoanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SanctionController;
use App\Http\Controllers\AuditLogController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn()=>view('auth.login'))->middleware('guest');
Route::get('/login',[LoginController::class,'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'login'])->middleware('guest');
Route::post('/logout',LogoutController::class)->name('logout')->middleware('auth');
Route::post('/notifications/read-all',[\App\Http\Controllers\NotificationController::class,'readAll'])->name('notifications.read-all')->middleware('auth');

Route::middleware('auth')->group(function(){
    Route::get('/dashboard',[HomeController::class,'index'])->name('home');
    Route::get('/profile',[ProfileController::class,'index'])->name('profile.index');
    Route::put('/profile',[ProfileController::class,'update'])->name('profile.update');

    Route::resource('barang',CommodityController::class)->only('index','store','update','destroy')->parameter('barang','commodity')->middleware('permission:lihat barang');
    Route::post('/barang/{id}/restore',[CommodityController::class,'restore'])->name('barang.restore')->middleware('permission:restore barang');
    Route::prefix('barang')->name('barang.')->group(function(){
        Route::post('/print',[CommodityController::class,'generatePDF'])->name('print');
        Route::post('/print/{id}',[CommodityController::class,'generatePDFIndividually'])->name('print-individual');
        Route::post('/export',[CommodityController::class,'export'])->name('export');
        Route::post('/import',[CommodityController::class,'import'])->name('import');
    });

    Route::resource('barang-masuk',CommodityInController::class)->only('index','store','update','destroy')->parameter('barang-masuk','commodity_in')->middleware('permission:lihat barang masuk');
    Route::resource('barang-keluar',CommodityOutController::class)->only('index','store','update','destroy')->parameter('barang-keluar','commodity_out')->middleware('permission:lihat barang keluar');

    Route::resource('peminjaman',CommodityLoanController::class)->only('index','store','update','destroy')->parameter('peminjaman','commodity_loan')->middleware('permission:lihat peminjaman');
    Route::post('/peminjaman/{commodity_loan}/setujui',[CommodityLoanController::class,'approve'])->name('peminjaman.approve')->middleware('permission:setujui peminjaman');
    Route::post('/peminjaman/{commodity_loan}/tolak',[CommodityLoanController::class,'reject'])->name('peminjaman.reject')->middleware('permission:tolak peminjaman');
    Route::post('/peminjaman/{commodity_loan}/kembalikan',[CommodityLoanController::class,'returnLoan'])->name('peminjaman.return')->middleware('permission:proses pengembalian');

    Route::resource('sanksi',SanctionController::class)->only('index','store','update','destroy')->parameter('sanksi','sanction')->middleware('permission:lihat sanksi');
    Route::get('/audit',[AuditLogController::class,'index'])->name('audit.index')->middleware('permission:lihat aktivitas');
    Route::get('/laporan',[ReportController::class,'index'])->name('laporan.index')->middleware('permission:lihat laporan');

    Route::resource('perolehan',CommodityAcquisitionController::class)->except('create','edit','show')->parameter('perolehan','commodity_acquisition')->middleware('permission:lihat perolehan');
    Route::resource('ruangan',CommodityLocationController::class)->except('create','edit','show')->parameter('ruangan','commodity_location')->middleware('permission:lihat ruangan');
    Route::post('/ruangan/import',[CommodityLocationController::class,'import'])->name('ruangan.import')->middleware('permission:import ruangan');
    Route::post('/ruangan/export',[CommodityLocationController::class,'export'])->name('ruangan.export')->middleware('permission:export ruangan');
    Route::resource('pengguna',UserController::class)->except('create','edit','show')->parameter('pengguna','user')->middleware('permission:kelola pengguna');
    Route::resource('peran-dan-hak-akses',RoleController::class)->parameter('peran-dan-hak-akses','role')->middleware('permission:lihat peran dan hak akses');
});