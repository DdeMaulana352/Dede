<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

Route::get('/', 'FrontController@index');

// Frontend
Route::get('pencarian-laundry','FrontController@search');

Auth::routes([
    'register' => false,
]);

Route::get('contact', [App\Http\Controllers\HomeController::class, 'contact']);

Route::get('register', 'RegisterController@register');
Route::post('register/store', 'RegisterController@store');
Route::post('register/store/user', 'RegisterController@signup');


Route::middleware('auth')->group(function () {
  Route::get('/home', 'HomeController@index')->name('home');
  Route::get('read-notifikasi','HomeController@readNotifikasi');
  // Modul Admin
  Route::prefix('/')->middleware('role:Admin')->group(function () {
    Route::resource('admin','Admin\AdminController');
    Route::get('/admin/customer/hapus/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'hapus']);
    // detail customer
    Route::get('/customer/cuci-komplit/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'riwayatck']);
    Route::post('/customer/update/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'update']);
    Route::get('/customer-add', [App\Http\Controllers\Admin\CustomerController::class, 'create']);
    Route::post('/admin/register/store', [App\Http\Controllers\Admin\CustomerController::class, 'store']);

    Route::get('/admin/customer-data/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'data']);

    // setting
    Route::get('admin-setting','Admin\AdminController@pengaturan');
    Route::put('proses-setting-page/{id}','Admin\SettingsController@proses_set_page')->name('seting-page.update');

    // transaksi user
    Route::get('/transaksi/cuci-dry-clean', [App\Http\Controllers\Admin\CustomerController::class, 'tdc']);
    Route::get('/transaksi/cuci-komplit', [App\Http\Controllers\Admin\CustomerController::class, 'tck']);
    Route::get('/transaksi/satuan', [App\Http\Controllers\Admin\CustomerController::class, 'tcs']);

    // transaksi detail
    Route::get('/transaksi/detail/ck/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'detailck']);
    Route::get('/transaksi/detail/dc/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'detaildc']);
    Route::get('/transaksi/detail/cs/{id}', [App\Http\Controllers\Admin\CustomerController::class, 'detailcs']);

    // harga
    Route::get('/admin/tambah/ck', [App\Http\Controllers\Admin\FinanceController::class, 'tambah_ck']);
    Route::get('/admin/tambah/dc', [App\Http\Controllers\Admin\FinanceController::class, 'tambah_dc']);
    Route::get('/admin/tambah/cs', [App\Http\Controllers\Admin\FinanceController::class, 'tambah_cs']);

    Route::post('/hargack/store/', [App\Http\Controllers\Admin\FinanceController::class, 'storeck']);
    Route::post('/hargadc/store/', [App\Http\Controllers\Admin\FinanceController::class, 'storedc']);
    Route::post('/hargacs/store/', [App\Http\Controllers\Admin\FinanceController::class, 'storecs']);

    Route::get('admin/harga/cuci-komplit', [App\Http\Controllers\Admin\FinanceController::class, 'cuci_komplit']);
    Route::get('admin/harga/cuci-dry-clean', [App\Http\Controllers\Admin\FinanceController::class, 'cuci_dry_clean']);
    Route::get('admin/harga/cuci-satuan', [App\Http\Controllers\Admin\FinanceController::class, 'satuan']);

    // admin-harga-edit
    Route::get('/admin/hargack/edit/{id}', [App\Http\Controllers\Admin\FinanceController::class, 'hargack']);
    Route::get('/admin/hargadc/edit/{id}', [App\Http\Controllers\Admin\FinanceController::class, 'hargadc']);
    Route::get('/admin/hargacs/edit/{id}', [App\Http\Controllers\Admin\FinanceController::class, 'hargacs']);

    Route::get('/admin/hargack/hapus/{id}', [App\Http\Controllers\Admin\FinanceController::class, 'hapusck']);
    Route::get('/admin/hargadc/hapus/{id}', [App\Http\Controllers\Admin\FinanceController::class, 'hapusdc']);
    Route::get('/admin/hargacs/hapus/{id}', [App\Http\Controllers\Admin\FinanceController::class, 'hapuscs']);

    Route::post('/hargack/update/{id}', [App\Http\Controllers\Admin\FinanceController::class, 'update_hargack']);
    Route::post('/hargacs/update/{id}', [App\Http\Controllers\Admin\FinanceController::class, 'update_hargacs']);
    Route::post('/hargadc/update/{id}', [App\Http\Controllers\Admin\FinanceController::class, 'update_hargadc']);

    // Pengguna/karyawan
    Route::resource('karyawan','Admin\KaryawanController');
    Route::post('/register/karyawan', 'RegisterController@karyawan');
    Route::get('update-satatus-karyawan','Admin\KaryawanController@updateKaryawan');
    Route::get('/karyawan/edit/{id}', [App\Http\Controllers\Admin\KaryawanController::class, 'edit']);
    Route::post('/karyawan/update/{id}', [App\Http\Controllers\Admin\KaryawanController::class, 'update']);
    Route::get('/karyawan/hapus/{id}', [App\Http\Controllers\Admin\KaryawanController::class, 'hapus']);
    

    // Customer
    Route::resource('customer','Admin\CustomerController');

    // Riwayat customer
    Route::get('riwayat-customer',[App\Http\Controllers\Admin\CustomerController::class, 'riwayat']);
    Route::get('/customer/riwayat/ck',[App\Http\Controllers\Admin\CustomerController::class, 'riwayat_ck']);
    Route::get('/customer/riwayat/dc',[App\Http\Controllers\Admin\CustomerController::class, 'riwayat_dc']);
    Route::get('/customer/riwayat/cs',[App\Http\Controllers\Admin\CustomerController::class, 'riwayat_cs']);

    // Data Transaksi
    Route::resource('transaksi','Admin\TransaksiController');
    Route::get('filter-transaksi','Admin\TransaksiController@filtertransaksi'); // filter data transaksi by karyawan
    Route::get('invoice-customer/{invoice}','Admin\TransaksiController@invoice'); // lihat invoice

    Route::get('data-harga','Admin\FinanceController@dataharga');
    Route::post('harga-store','Admin\FinanceController@hargastore');
    Route::get('edit-harga','Admin\FinanceController@hargaedit');

    // Finance
    Route::get('finance','Admin\FinanceController@index')->name('finance.index');

    // Notifikasi
    Route::get('read-notification','Admin\AdminController@notif');

    // Setting
    Route::get('settings','Admin\SettingsController@setting');
    Route::put('proses-setting-page/{id}','Admin\SettingsController@proses_set_page')->name('seting-page.update');
    Route::put('set-theme/{id}','Admin\SettingsController@set_theme')->name('setting-theme.update');
    Route::put('set-target-laundry/{id}','Admin\SettingsController@set_target_laundry')->name('set-target.update');
    Route::post('add-bank','Admin\SettingsController@bank')->name('setting.bank');
    Route::put('set-notif/{id}','Admin\SettingsController@notif')->name('set-notif.update');

    // Profile
    Route::get('profile-admin/{id}','Admin\AdminController@profile');
    Route::put('profile-admin-edit/{id}','Admin\AdminController@edit_profile');

    // Dodkumentasi
    Route::get('dokumentasi','Admin\DokumentasiController@index'); // Dokumentasi
    Route::get('dokumentasi/tentang','Admin\DokumentasiController@tentang'); // Tentang
    Route::get('dokumentasi/instalasi-penggunaan','Admin\DokumentasiController@instalasi'); // Instalasi & Penggunaan
    Route::get('dokumentasi/versi','Admin\DokumentasiController@versi'); // Versi dan Pembaruan
    Route::get('dokumentasi/notifikasi','Admin\DokumentasiController@notifikasi'); // Notifikasi

  });

  // Modul Karyawan
  Route::prefix('/')->middleware('role:Karyawan')->group(function () {
    Route::get('pelayanan', [App\Http\Controllers\Karyawan\PelayananController::class, 'index']);
    Route::get('pelayanan/cuci-komplit', [App\Http\Controllers\Karyawan\PelayananController::class, 'ck']);
    Route::get('pelayanan/cuci-dry-clean', [App\Http\Controllers\Karyawan\PelayananController::class, 'index']);
    Route::get('pelayanan/cuci-satuan', [App\Http\Controllers\Karyawan\PelayananController::class, 'index']);
    // Transaksi
    Route::get('add-order','Karyawan\PelayananController@addorders');
    Route::get('update-status-laundry','Karyawan\PelayananController@updateStatusLaundry');

    // laporan
    Route::get('laporan/cuci-komplit', [App\Http\Controllers\KaryawanController::class, 'laporan_ck']);
    Route::get('laporan/cuci-dry-clean', [App\Http\Controllers\KaryawanController::class, 'laporan_dc']);
    Route::get('laporan/satuan', [App\Http\Controllers\KaryawanController::class, 'laporan_cs']);

    // Customer
    Route::get('customers','Karyawan\CustomerController@index');
    Route::get('customers/{id}','Karyawan\CustomerController@detail');
    Route::get('customers-create','Karyawan\CustomerController@create');

    // Filter
    Route::get('listharga','Karyawan\PelayananController@listharga');
    Route::get('listhari','Karyawan\PelayananController@listhari');

    // Laporan
    Route::get('laporan','Karyawan\LaporanController@laporan');
    Route::get('export-excel','Karyawan\LaporanController@exportExcel');

    // Invoice
    Route::get('invoice-kar/{id}','Karyawan\InvoiceController@invoicekar');
    Route::get('cetak-invoice/{id}/print','Karyawan\InvoiceController@cetakinvoice');

    // Profile
    Route::get('profile-karyawan/{id}','Karyawan\ProfileController@karyawanProfile');
    Route::put('profile-karyawan/update/{id}','Karyawan\ProfileController@karyawanProfileSave');

    // Setting
    Route::get('karyawan-setting','Karyawan\SettingsController@setting');
    Route::put('proses-setting-karyawan/{id}','Karyawan\SettingsController@proses_setting_karyawan')->name('proses-setting-karyawan.update');
   });


  // Modul Customer
  Route::prefix('/')->middleware('role:Customer')->group(function (){
    // Setting
    Route::get('setitng','Customer\SettingController@index')->name('customer.setting');
    Route::put('setitng/{id}','Customer\SettingController@settingUpdateCustomer')->name('customer.setting-update');

    // Profile
    Route::get('me/{id}','Customer\ProfileController@index');
    Route::put('me/update/{id}','Karyawan\ProfileController@karyawanProfileSave');
  });
});

// lupa password

// customer, daftar harga
Route::get('harga/cuci-komplit', [App\Http\Controllers\HargaController::class, 'cuci_komplit']);
Route::get('harga/cuci-dry-clean', [App\Http\Controllers\HargaController::class, 'cuci_dry_clean']);
Route::get('harga/cuci-satuan', [App\Http\Controllers\HargaController::class, 'satuan']);

// order customer
Route::get('/order', [App\Http\Controllers\HargaController::class, 'order']);
Route::get('/order/cuci-dry-clean', [App\Http\Controllers\OrderController::class, 'dry']);
Route::get('/order/satuan', [App\Http\Controllers\OrderController::class, 'satuan']);
Route::get('/order/cuci-komplit', [App\Http\Controllers\OrderController::class, 'komplit']);

// orderan
Route::get('/orderan', [App\Http\Controllers\OrderController::class, 'orderan']);

// proses order
Route::post('/order/store/ck', [App\Http\Controllers\OrderController::class, 'orderck']);
Route::post('/order/store/dc', [App\Http\Controllers\OrderController::class, 'orderdc']);
Route::post('/order/store/cs', [App\Http\Controllers\OrderController::class, 'ordercs']);

// karyawan //
Route::get('/inbox', [App\Http\Controllers\KaryawanController::class, 'inbox']);
Route::get('karyawan/input/ck/{id}', [App\Http\Controllers\KaryawanController::class, 'ck']);
Route::get('karyawan/input/dc/{id}', [App\Http\Controllers\KaryawanController::class, 'dc']);

Route::post('/inputorder/store/ck/', [App\Http\Controllers\KaryawanController::class, 'orderck']);
Route::post('/inputorder/store/dc/', [App\Http\Controllers\KaryawanController::class, 'orderdc']);
Route::post('/inputorder/store/cs/', [App\Http\Controllers\KaryawanController::class, 'ordercs']);

Route::get('/order/detail/ck/{id}', [App\Http\Controllers\KaryawanController::class, 'detailck']);
Route::get('/order/detail/dc/{id}', [App\Http\Controllers\KaryawanController::class, 'detaildc']);
Route::get('/order/detail/cs/{id}', [App\Http\Controllers\KaryawanController::class, 'detailcs']);

Route::post('/detail/order/status/ck/{id}', [App\Http\Controllers\KaryawanController::class, 'statusck']);
Route::post('/detail/order/status/dc/{id}', [App\Http\Controllers\KaryawanController::class, 'statusdc']);
Route::post('/detail/order/status/cs/{id}', [App\Http\Controllers\KaryawanController::class, 'statuscs']);

Route::get('/detail/order/bayar/ck/{id}', [App\Http\Controllers\KaryawanController::class, 'bayar']);
Route::get('/detail/order/bayar/dc/{id}', [App\Http\Controllers\KaryawanController::class, 'bayardc']);
Route::get('/detail/order/bayar/cs/{id}', [App\Http\Controllers\KaryawanController::class, 'bayarcs']);

Route::post('/detail/order/selesai/{id}', [App\Http\Controllers\KaryawanController::class, 'selesaick']);
Route::post('/detail/order/selesai/dc/{id}', [App\Http\Controllers\KaryawanController::class, 'selesaidc']);
Route::post('/detail/order/selesai/cs/{id}', [App\Http\Controllers\KaryawanController::class, 'selesaics']);

Route::post('/customer/order/selesaikan/{id}', [App\Http\Controllers\KaryawanController::class, 'selesaikan']);
Route::post('/customer/order/selesaikan/dc/{id}', [App\Http\Controllers\KaryawanController::class, 'selesaikandc']);
Route::post('/customer/order/selesaikan/cs/{id}', [App\Http\Controllers\KaryawanController::class, 'selesaikancs']);

Route::get('customer/order/{id}', [App\Http\Controllers\KaryawanController::class, 'customer_order']);
Route::get('customer/hapus/{id}', [App\Http\Controllers\KaryawanController::class, 'hapus_customer']);
Route::get('customer/create/ck/{id}', [App\Http\Controllers\KaryawanController::class, 'customer_order_ck']);
Route::get('customer/create/dc/{id}', [App\Http\Controllers\KaryawanController::class, 'customer_order_dc']);
Route::get('customer/create/cs/{id}', [App\Http\Controllers\KaryawanController::class, 'customer_order_cs']);

// detail customer
Route::get('/customer/detail/ck/{id}', [App\Http\Controllers\CustomerController::class, 'detailck']);
Route::get('/customer/detail/dc/{id}', [App\Http\Controllers\CustomerController::class, 'detaildc']);
Route::get('/customer/detail/cs/{id}', [App\Http\Controllers\CustomerController::class, 'detailcs']);

// riwayat
Route::get('riwayat/cuci-komplit', [App\Http\Controllers\CustomerController::class, 'ck']);
Route::get('riwayat/cuci-dry-clean', [App\Http\Controllers\CustomerController::class, 'dc']);
Route::get('riwayat/cuci-satuan', [App\Http\Controllers\CustomerController::class, 'cs']);

