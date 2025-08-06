<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;


Route::get('/welcome', function () {
    return view('welcome');
});



Route::middleware([CheckAdmin::class])->group(function () {

    Route::get('/admin', App\Livewire\Admin\Index::class)->name('admin');
    Route::get('/user', App\Livewire\User\Index::class)->name('user');
    Route::get('/admin-campaign', App\Livewire\AdminCampaign\Index::class)->name('admin-campaign');
    Route::get('/update-campaign', App\Livewire\AdminUpdate\Index::class)->name('update-campaign');
    // Route::get('/user/create', App\Livewire\User\Create::class)->name('user');
    Route::get('/admin-berita', App\Livewire\Berita\Index::class)->name('admin-berita');
    Route::get('/gambar_landing', App\Livewire\GambarLanding\Index::class)->name('gambar_landing');
    Route::get('/admin-mitra', App\Livewire\Mitra\Index::class)->name('admin-mitra');
    Route::get('/admin-donasi', App\Livewire\AdminDonasi\Index::class)->name('admin-donasi');
    Route::get('/visi', App\Livewire\Visi\Index::class)->name('visi');
    Route::get('/misi', App\Livewire\Misi\Index::class)->name('misi');
    Route::get('/admin-kebijakan', App\Livewire\KebijakanAdmin\Index::class)->name('admin-kebijakan');
    Route::get('/admin-konfirmasi', App\Livewire\AdminKonfirmasi\Index::class)->name('admin-konfirmasi');
    Route::get('/petugas', App\Livewire\Petugas\Index::class)->name('petugas');
    Route::get('/kategori', App\Livewire\Kategori\Index::class)->name('kategori');
    Route::get('/pilihan-wakaf', App\Livewire\PilihanWakafAdmin\Index::class)->name('pilihan-wakaf');
    Route::get('/pilihan-infaq', App\Livewire\PilihanInfaqAdmin\Index::class)->name('pilihan-infaq');
    Route::get('/pilihan-qurban', App\Livewire\PilihanQurbanAdmin\Index::class)->name('pilihan-qurban');
    Route::get('/pilar-Program', App\Livewire\PilarProgram\Index::class)->name(name: 'pilar-Program');
    Route::get('/laporan-admin', App\Livewire\LaporanAdmin\Index::class)->name('laporan-admin');
    Route::get('/notification', App\Livewire\Notification\Index::class)->name('notification');
    Route::get('/komponen_ziwaf', App\Livewire\KomponenZiwafAdmin\Index::class)->name('komponen_ziwaf');

});

Route::get('/', App\Livewire\Landing::class)->name('landing');

Route::get('/daftar', App\Livewire\Daftar::class);

Route::get('/login', App\Livewire\Login::class)->name('login')->middleware('guest');


Route::get('/landing-mobile', App\Livewire\LandingMobile::class);

Route::get('/detail-campaign', App\Livewire\DetailCampaign::class);

Route::post('logout', App\Http\Controllers\logout::class)->name('logout');

Route::prefix('berita')->group(function () {
    Route::get('/', App\Livewire\UserBerita\Index::class)->name('berita');
    Route::get('/{title_berita}', App\Livewire\UserBerita\Show::class)->name('user-berita.show');
});

Route::prefix('zakat')->group(function () {
    Route::get('/', App\Livewire\Ziwaf\Zakat\Ziwaf::class)->name('zakat');
    Route::get('/data', App\Livewire\Ziwaf\Zakat\ZakatBayar::class)->name('zakat.data');
    Route::get('/pembayaran/{token}', App\Livewire\Ziwaf\Zakat\Checkout::class)->name('zakat.pembayaran');
});

Route::prefix('wakaf')->group(function () {
    Route::get('/', App\Livewire\Ziwaf\Wakaf\Wakaf::class)->name('wakaf');
    Route::get('/data', App\Livewire\Ziwaf\Wakaf\InfaqwakafBayar::class)->name('wakaf.data');
    Route::get('/pembayaran/{token}', App\Livewire\Ziwaf\Wakaf\CheckoutWakaf::class)->name('wakaf.pembayaran');
});

Route::prefix('narasi')->group(function () {
    Route::get('/fitrah', App\Livewire\Ziwaf\Narasi\Fitrah::class)->name('narasi.fitrah');
    Route::get('/maal', App\Livewire\Ziwaf\Narasi\Maal::class)->name('narasi.maal');
    Route::get('/infaq', App\Livewire\Ziwaf\Narasi\Infaq::class)->name('narasi.infaq');
    Route::get('/wakaf', App\Livewire\Ziwaf\Narasi\Wakaf::class)->name('narasi.Wakaf');
    Route::get('/fidyah', App\Livewire\Ziwaf\Narasi\Fidyah::class)->name('narasi.fidyah');
    Route::get('/qurban', App\Livewire\Ziwaf\Narasi\Qurban::class)->name('narasi.qurban');
});

Route::prefix('fidyah')->group(function () {
    Route::get('/', App\Livewire\Ziwaf\Fidyah\Index::class)->name('fidyah.index');
    Route::get('/data', App\Livewire\Ziwaf\Fidyah\Data::class)->name('fidyah.data');
    Route::get('/pembayaran/{token}', App\Livewire\Ziwaf\Fidyah\Pembayaran::class)->name('fidyah.pembayaran');
});
Route::prefix('infaq')->group(function () {
    Route::get('/', App\Livewire\Ziwaf\Infaq\Index::class)->name('infaq.index');
    Route::get('/data', App\Livewire\Ziwaf\Infaq\Data::class)->name('infaq.data');
    Route::get('/pembayaran/{token}', App\Livewire\Ziwaf\Infaq\Pembayaran::class)->name('infaq.pembayaran');
});

Route::prefix('qurban')->group(function () {
    Route::get('/', App\Livewire\Ziwaf\Qurban\Qurban::class)->name('qurban');
    Route::get('/data', App\Livewire\Ziwaf\Qurban\Data::class)->name('qurban.data');
    Route::get('/checkout/{token}', App\Livewire\Ziwaf\Qurban\Checkout::class)->name('qurban.checkout');
});

Route::get('/ziwaf/success', App\Livewire\Ziwaf\Success::class)->name('ziwaf.success');
Route::get('/ziwaf/KebijakanPrivasi', App\Livewire\Ziwaf\KebijakanPrivasi::class)->name('ziwaf.KebijakanPrivasi');

Route::get('/mitra', App\Livewire\UserMitra::class)->name('mitra');


Route::get('/profil&jajaran', App\Livewire\ProfilJajaran::class)->name('profil&jajaran');

Route::get('/penghargaan', App\Livewire\Penghargaan::class)->name('penghargaan');

Route::get('/kebijakan', App\Livewire\KebijakanMutu::class)->name('kebijakan');

Route::get('/berdaya', App\Livewire\Berdaya::class)->name('berdaya');

Route::get('/cerdas', App\Livewire\Cerdas::class)->name('cerdas');

Route::get('/sehat', App\Livewire\Sehat::class)->name('sehat');

Route::get('/damai', App\Livewire\Damai::class)->name('damai');

Route::get('/hijau', App\Livewire\Hijau::class)->name('hijau');

Route::get('/laporan', App\Livewire\Laporan::class)->name('laporan');

Route::get('/rekening', App\Livewire\Rekening::class)->name('rekening');

Route::get('/qr_donasi', App\Livewire\QrDonasi::class)->name('qr_donasi');

Route::get('/konfirmasi', App\Livewire\UserKonfirmasi::class)->name('user-konfirmasi');

Route::get('/pengajuan-mobiznu', App\Livewire\PengajuanMobiznu::class)->name('pengajuan-mobiznu');

Route::get('/pengajuan-gocap', App\Livewire\PengaduanGocap\Index::class)->name('pengajuan-gocap.index');
Route::get('/pengajuan-gocap/success', App\Livewire\PengaduanGocap\Success::class)->name('pengajuan-gocap.success');


Route::get('/wa_splash', App\Livewire\WaSplash::class)->name('wa_splash');

Route::get('/sejarah', App\Livewire\Sejarah::class)->name('sejarah');

Route::get('/legalitas', App\Livewire\Legalitas::class)->name('legalitas');

Route::get('/Mitra', App\Livewire\UserMitra::class)->name('Mitra');


// Route::get('/donasi/{title}', App\Livewire\Donasi\Donatur::class)->name('donasi.donatur');
// Route::get('/pembayaran/success', App\Livewire\Donasi\Success::class)->name('donasi.success');
// Route::get('/pembayaran/{title}/{token}', App\Livewire\Donasi\Pembayaran::class)->name('donasi.pembayaran');

Route::get('/pengajuan', App\Livewire\Pengajuan\Index::class)->name('pengajuan.index');
Route::get('/pengajuan/success', App\Livewire\Pengajuan\Success::class)->name('pengajuan.success');

Route::middleware('auth')->group(function () {
    Route::get('/profile', App\Livewire\Profile\Index::class)->name('profile.index');
    Route::get('/account', App\Livewire\Profile\Account::class)->name('profile.account');
    Route::get('/history', App\Livewire\Profile\History::class)->name('profile.history');
    Route::get('/transaction', App\Livewire\Profile\Transaction::class)->name('profile.transaction');
});


Route::get('/donasi/{title}', App\Livewire\Donasi\Index::class)->name('donasi.index');
Route::get('/donasi/data/{title}', App\Livewire\Donasi\Donatur::class)->name('donasi.donatur');
Route::get('/pembayaran/success', App\Livewire\Donasi\Success::class)->name('donasi.success');
Route::get('/pembayaran/{title}/{token}', App\Livewire\Donasi\Pembayaran::class)->name('donasi.pembayaran');

Route::get('/list_donasi/{title}', App\Livewire\Campaigns\DonasiList::class)->name('campaigns.donasiList');
Route::get('/campaigns', App\Livewire\Campaigns\Index::class)->name('campaign');
Route::get('/campaigns/{slug}', App\Livewire\Campaigns\Show::class)->name('campaigns.show');
Route::get('/doa/{slug}', App\Livewire\Campaigns\DoaList::class)->name('campaigns.doaList');
Route::get('/pilar/{slug}', App\Livewire\PilarProgram\Show::class)->name('pilarProgram.show');


Route::get('/forgot-password', App\Livewire\ForgotPassword::class)->name('ForgotPassword');
Route::get('/reset-password/{token}', App\Livewire\ResetPassword::class)->name('ResetPassword');
