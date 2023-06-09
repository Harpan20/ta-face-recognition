<?php

use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\admin\NilaiController;
use App\Http\Controllers\admin\PesanController;
use App\Http\Controllers\admin\ProdukController;
use App\Http\Controllers\admin\LaporanController;
use App\Http\Controllers\admin\LayananController;
use App\Http\Controllers\artikel\KarirController;
use App\Http\Controllers\artikel\MitraController;
use App\Http\Controllers\artikel\PromoController;
use App\Http\Controllers\artikel\BeritaController;
use App\Http\Controllers\profil\SejarahController;
use App\Http\Controllers\profil\TentangController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\InformasiController;
use App\Http\Controllers\admin\TataKelolaPerusahaanController;
use App\Http\Controllers\AdvantageController;
use App\Http\Controllers\artikel\ArtikelController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyProfileVideoController;
use App\Http\Controllers\CompanyValueController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ExcellenceController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\profil\StrukturController;
use App\Http\Controllers\permintaan\KreditController;
use App\Http\Controllers\profil\PenghargaanController;
use App\Http\Controllers\permintaan\DepositoController;
use App\Http\Controllers\permintaan\TabunganController;
use App\Http\Controllers\PhoneNumberController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostTypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonyController;
use App\Http\Controllers\VisionController;
use App\Http\Controllers\WhatsappController;

Route::get('login', [LoginController::class, 'login'])->name('admin.login');
Route::post('login', [LoginController::class, 'proseslogin'])->name('admin.proses');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('/admin/produk-create', [ProdukController::class, 'create'])->name('produk.create');
    Route::get('/admin/produk-detail/{id_produk}', [ProdukController::class, 'detail'])->name('produk.detail');
    Route::post('/admin/produk-store', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/admin/produk-edit/{id_produk}', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/admin/produk-update/{id_produk}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/admin/produk-destroy/{id_produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    Route::get('/admin/produk-gambar/{id_produk}', [ProdukController::class, 'editGambar'])->name('produk.editGambar');
    Route::put('/admin/produk-gambar/{id_produk}', [ProdukController::class, 'updateGambar'])->name('produk.updateGambar');

    Route::get('/admin/produk-range/{id_produk}', [ProdukController::class, 'range'])->name('range.produk');
    Route::post('/admin/produk-range/{id_produk}', [ProdukController::class, 'rangeStore'])->name('range.store');
    Route::get('/admin/produk-range-edit/{id_produk}', [ProdukController::class, 'rangeEdit'])->name('range.edit');
    Route::put('/admin/produk-range-edit/{id_produk}', [ProdukController::class, 'rangeUpdate'])->name('range.update');
    Route::get('/admin/produk-thumbnail/{id_produk}', [ProdukController::class, 'editThumbnail'])->name('produk.editThumbnail');
    Route::put('/admin/produk-thumbnail/{id_produk}', [ProdukController::class, 'updateThumbnail'])->name('produk.updateThumbnail');

    Route::get('/admin/produk-range/{id_produk}', [ProdukController::class, 'range'])->name('range.produk');
    Route::post('/admin/produk-range/{id_produk}', [ProdukController::class, 'rangeStore'])->name('range.store');
    Route::get('/admin/produk-range-edit/{id_produk}', [ProdukController::class, 'rangeEdit'])->name('range.edit');
    Route::put('/admin/produk-range-edit/{id_produk}', [ProdukController::class, 'rangeUpdate'])->name('range.update');


    Route::get('/admin/suku-bunga', [ProdukController::class, 'birate'])->name('birates.index');
    Route::get('/admin/suku-bunga-create', [ProdukController::class, 'birateCreate'])->name('birates.create');
    Route::post('/admin/suku-bunga-store', [ProdukController::class, 'birateStore'])->name('birates.store');
    Route::get('/admin/suku-bunga-edit/{id_sukubunga}', [ProdukController::class, 'birateEdit'])->name('birates.edit');
    Route::put('/admin/suku-bunga-edit/{id_sukubunga}', [ProdukController::class, 'birateUpdate'])->name('birates.update');
    Route::delete('/admin/suku-bunga-delete/{id_sukubunga}', [ProdukController::class, 'birateDestroy'])->name('birates.delete');



    Route::get('/admin/layanan', [LayananController::class, 'index'])->name('layanan.index');
    Route::get('/admin/layanan-create', [LayananController::class, 'create'])->name('layanan.create');
    Route::post('/admin/layanan-store', [LayananController::class, 'store'])->name('layanan.store');
    Route::get('/admin/layanan-detail/{id_layanan}', [LayananController::class, 'detail'])->name('layanan.detail');
    Route::get('/admin/layanan-edit/{id_layanan}', [LayananController::class, 'edit'])->name('layanan.edit');
    Route::put('/admin/layanan-update/{id_layanan}', [LayananController::class, 'update'])->name('layanan.update');
    Route::get('/admin/layanan-gambar/{id_layanan}', [LayananController::class, 'editGambar'])->name('layanan.editGambar');
    Route::put('/admin/layanan-gambar/{id_layanan}', [LayananController::class, 'updateGambar'])->name('layanan.updateGambar');
    Route::delete('/admin/layanan-delete/{id_layanan}', [LayananController::class, 'destroy'])->name('layanan.delete');
    Route::get('/admin/layanan-thumbnail/{id_layanan}', [LayananController::class, 'editThumbnail'])->name('layanan.editThumbnail');
    Route::put('/admin/layanan-thumbnail/{id_layanan}', [LayananController::class, 'updateThumbnail'])->name('layanan.updateThumbnail');

    Route::get('/admin/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/admin/berita-create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/admin/berita-store', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/admin/berita-detail/{id_berita}', [BeritaController::class, 'detail'])->name('berita.detail');
    Route::get('/admin/berita-edit/{id_berita}', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/admin/berita-update/{id_berita}', [BeritaController::class, 'update'])->name('berita.update');
    Route::get('/admin/berita-gambar/{id_berita}', [BeritaController::class, 'editGambar'])->name('berita.editGambar');
    Route::put('/admin/berita-gambar/{id_berita}', [BeritaController::class, 'updateGambar'])->name('berita.updateGambar');
    Route::get('/admin/berita-status/{id_berita}', [BeritaController::class, 'editStatus'])->name('berita.editStatus');
    Route::put('/admin/berita-status/{id_berita}', [BeritaController::class, 'updateStatus'])->name('berita.updateStatus');
    Route::delete('/admin/berita-destroy/{id_berita}', [BeritaController::class, 'destroy'])->name('berita.delete');
    Route::get('/admin/berita-thumbnail/{id_berita}', [BeritaController::class, 'editThumbnail'])->name('berita.editThumbnail');
    Route::put('/admin/berita-thumbnail/{id_berita}', [BeritaController::class, 'updateThumbnail'])->name('berita.updateThumbnail');

    Route::get('/admin/promo', [PromoController::class, 'index'])->name('promo.index');
    Route::get('/admin/promo-create', [PromoController::class, 'create'])->name('promo.create');
    Route::post('/admin/promo-store', [PromoController::class, 'store'])->name('promo.store');
    Route::get('/admin/promo-detail/{id_promo}', [PromoController::class, 'detail'])->name('promo.detail');
    Route::get('/admin/promo-edit/{id_promo}', [PromoController::class, 'edit'])->name('promo.edit');
    Route::put('/admin/promo-update/{id_promo}', [PromoController::class, 'update'])->name('promo.update');
    Route::get('/admin/promo-status/{id_promo}', [PromoController::class, 'editStatus'])->name('promo.editStatus');
    Route::put('/admin/promo-status/{id_promo}', [PromoController::class, 'updatedStatus'])->name('promo.updateStatus');
    Route::get('/admin/promo-gambar/{id_promo}', [PromoController::class, 'editGambar'])->name('promo.editGambar');
    Route::put('/admin/promo-gambar/{id_promo}', [PromoController::class, 'updatedGambar'])->name('promo.updateGambar');
    Route::delete('/admin/promo-delete/{id_promo}', [PromoController::class, 'destroy'])->name('promo.delete');

    Route::get('/admin/karir', [KarirController::class, 'index'])->name('karir.index');
    Route::get('/admin/karir-create', [KarirController::class, 'create'])->name('karir.create');
    Route::post('/admin/karir-store', [KarirController::class, 'store'])->name('karir.store');
    Route::get('/admin/karir-detail/{id_karir}', [KarirController::class, 'detail'])->name('karir.detail');
    Route::get('/admin/karir-edit/{id_karir}', [KarirController::class, 'edit'])->name('karir.edit');
    Route::put('/admin/karir-update/{id_karir}', [KarirController::class, 'update'])->name('karir.update');
    Route::get('/admin/karir-status/{id_karir}', [KarirController::class, 'editStatus'])->name('karir.editStatus');
    Route::put('/admin/karir-status/{id_karir}', [KarirController::class, 'updateStatus'])->name('karir.updateStatus');
    Route::get('/admin/karir-gambar/{id_karir}', [KarirController::class, 'editGambar'])->name('karir.editGambar');
    Route::put('/admin/karir-gambar/{id_karir}', [KarirController::class, 'updateGambar'])->name('karir.updateGambar');
    Route::delete('/admin/karir-delete/{id_karir}', [KarirController::class, 'destroy'])->name('karir.delete');
    Route::get('/admin/info-store/{id_karir}', [KarirController::class, 'infoCreate'])->name('infoTambahan.create');
    Route::post('/admin/info-store/{id_karir}', [KarirController::class, 'infoStore'])->name('infoTambahan.store');
    Route::get('/admin/info-edit/{id_karir}', [KarirController::class, 'infoEdit'])->name('infoTambahan.edit');
    Route::put('/admin/info-update/{id_karir}', [KarirController::class, 'infoUpdate'])->name('infoTambahan.update');
    Route::delete('/admin/info-delete/{id_karir}', [KarirController::class, 'infoDestroy'])->name('infoTambahan.delete');


    Route::get('/admin/mitra', [MitraController::class, 'index'])->name('mitra.index');
    Route::get('/admin/mitra-create', [MitraController::class, 'create'])->name('mitra.create');

    Route::get('/admin/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
    Route::get('/admin/artikel-create', [ArtikelController::class, 'create'])->name('artikel.create');
    Route::post('/admin/artikel-store', [ArtikelController::class, 'store'])->name('artikel.store');
    Route::get('/admin/artikel-detail/{id_artikel}', [ArtikelController::class, 'detail'])->name('artikel.detail');
    Route::get('/admin/artikel-edit/{id_artikel}', [ArtikelController::class, 'edit'])->name('artikel.edit');
    Route::put('/admin/artikel-update/{id_artikel}', [ArtikelController::class, 'update'])->name('artikel.update');
    Route::get('/admin/artikel-editGambar/{id_artikel}', [ArtikelController::class, 'editGambar'])->name('artikel.editGambar');
    Route::put('/admin/artikel-updateGambar/{id_artikel}', [ArtikelController::class, 'updateGambar'])->name('artikel.updateGambar');
    Route::get('/admin/artikel-editStatus/{id_artikel}', [ArtikelController::class, 'editStatus'])->name('artikel.editStatus');
    Route::put('/admin/artikel-updateStatus/{id_artikel}', [ArtikelController::class, 'updateStatus'])->name('artikel.updateStatus');
    Route::delete('/admin/artikel-delete/{id_artikel}', [ArtikelController::class, 'destroy'])->name('artikel.delete');
    Route::get('/admin/artikel-thumbnail/{id_artikel}', [ArtikelController::class, 'editThumbnail'])->name('artikel.editThumbnail');
    Route::put('/admin/artikel-thumbnail/{id_artikel}', [ArtikelController::class, 'updateThumbnail'])->name('artikel.updateThumbnail');




    Route::get('/admin/tentang', [TentangController::class, 'index'])->name('tentang.index');
    Route::get('/admin/tentang-create', [TentangController::class, 'create'])->name('tentang.create');
    Route::post('/admin/tentang-store', [TentangController::class, 'store'])->name('tentang.store');
    Route::get('/admin/tentang-detail/{id_tentang}', [TentangController::class, 'detail'])->name('tentang.detail');
    Route::get('/admin/tentang-edit/{id_tentang}', [TentangController::class, 'edit'])->name('tentang.edit');
    Route::put('/admin/tentang-update/{id_tentang}', [TentangController::class, 'update'])->name('tentang.update');
    Route::get('/admin/tentang-gambar/{id_tentang}', [TentangController::class, 'editGambar'])->name('tentang.editGambar');
    Route::put('/admin/tentang-gambar/{id_txentang}', [TentangController::class, 'updateGambar'])->name('tentang.updateGambar');
    Route::delete('/admin/tentang-delete/{id_tentang}', [TentangController::class, 'destroy'])->name('tentang.delete');



    Route::controller(NilaiController::class)->group(function () {
        Route::get('/admin/nilai', 'index')->name('admin.nilai.index');
        Route::get('/admin/nilai/create', 'create')->name('admin.nilai.create');
        Route::post('/admin/nilai', 'store')->name('admin.nilai.store');
        Route::get('/admin/nilai/{nilai}/edit', 'edit')->name('admin.nilai.edit');
        Route::put('/admin/nilai/{nilai}', 'update')->name('admin.nilai.update');
        // Route::get('/admin/nilai/{nilai}', 'show')->name('admin.nilai.show');
        Route::delete('/admin/nilai/{nilai}', 'destroy')->name('admin.nilai.destroy');
        Route::get('/admin/nilai/search', 'search')->name('admin.nilai.search');
    });

    Route::controller(TataKelolaPerusahaanController::class)->group(function () {
        Route::get('/admin/tata-kelola-perusahaan', 'index')->name('admin.tata-kelola-perusahaan.index');
        Route::get('/admin/tata-kelola-perusahaan/create', 'create')->name('admin.tata-kelola-perusahaan.create');
        Route::post('/admin/tata-kelola-perusahaan', 'store')->name('admin.tata-kelola-perusahaan.store');
        Route::get('/admin/tata-kelola-perusahaan/{tata_kelola_perusahaan}/edit', 'edit')->name('admin.tata-kelola-perusahaan.edit');
        Route::put('/admin/tata-kelola-perusahaan/{tata_kelola_perusahaan}', 'update')->name('admin.tata-kelola-perusahaan.update');
        // Route::get('/admin/tata-kelola-perusahaan/{tata_kelola_perusahaan}', 'show')->name('admin.tata-kelola-perusahaan.show');
        Route::delete('/admin/tata-kelola-perusahaan/{tata_kelola_perusahaan}', 'destroy')->name('admin.tata-kelola-perusahaan.destroy');
        Route::get('/admin/tata-kelola-perusahaan/search', 'search')->name('admin.tata-kelola-perusahaan.search');
    });

    Route::get('/admin/sejarah', [SejarahController::class, 'index'])->name('sejarah.index');
    Route::get('/admin/sejarah-create', [SejarahController::class, 'create'])->name('sejarah.create');
    Route::post('/admin/sejarah-post', [SejarahController::class, 'store'])->name('sejarah.store');
    Route::get('/admin/sejarah-edit/{id_sejarah}', [SejarahController::class, 'edit'])->name('sejarah.edit');
    Route::put('/admin/sejarah-update/{id_sejarah}', [SejarahController::class, 'update'])->name('sejarah.update');
    Route::get('/admin/sejarah-detail/{id_sejarah}', [SejarahController::class, 'detail'])->name('sejarah.detail');
    Route::get('/admin/sejarah-edit-gambar/{id_sejarah}', [SejarahController::class, 'editGambar'])->name('sejarah.editGambar');
    Route::put('/admin/sejarah-edit-gambar/{id_sejarah}', [SejarahController::class, 'updateGambar'])->name('sejarah.updateGambar');
    Route::delete('/admin/sejarah-delete/{id_sejarah}', [SejarahController::class, 'destroy'])->name('sejarah.destroy');

    Route::get('/admin/struktur', [StrukturController::class, 'index'])->name('struktur.index');
    Route::get('/admin/struktur-create', [StrukturController::class, 'create'])->name('struktur.create');
    Route::post('/admin/struktur-post', [StrukturController::class, 'store'])->name('struktur.store');
    Route::get('/admin/struktur-edit/{id_struktur}', [StrukturController::class, 'edit'])->name('struktur.edit');
    Route::put('/admin/struktur-update/{id_struktur}', [StrukturController::class, 'update'])->name('struktur.update');
    Route::get('/admin/struktur-editStatus/{id_struktur}', [StrukturController::class, 'editStatus'])->name('struktur.editStatus');
    Route::put('/admin/struktur-updateStatus/{id_struktur}', [StrukturController::class, 'updateStatus'])->name('struktur.updateStatus');
    Route::get('/admin/struktur-editGambar/{id_struktur}', [StrukturController::class, 'editGambar'])->name('struktur.editGambar');
    Route::put('/admin/struktur-updateGambar/{id_struktur}', [StrukturController::class, 'updateGambar'])->name('struktur.updateGambar');
    Route::delete('/admin/struktur-delete/{id_struktur}', [StrukturController::class, 'destroy'])->name('struktur.delete');

    Route::get('/admin/penghargaan', [PenghargaanController::class, 'index'])->name('penghargaan.index');
    Route::get('/admin/penghargaan-create', [PenghargaanController::class, 'create'])->name('penghargaan.create');
    Route::post('/admin/penghargaan-store', [PenghargaanController::class, 'store'])->name('penghargaan.store');
    Route::get('/admin/penghargaan-detail/{id_penghargaan}', [PenghargaanController::class, 'detail'])->name('penghargaan.detail');
    Route::get('/admin/penghargaan-edit/{id_penghargaan}', [PenghargaanController::class, 'edit'])->name('penghargaan.edit');
    Route::put('/admin/penghargaan-update/{id_penghargaan}', [PenghargaanController::class, 'update'])->name('penghargaan.update');
    Route::delete('/admin/penghargaan-delete/{id_penghargaan}', [PenghargaanController::class, 'destroy'])->name('penghargaan.delete');

    Route::get('/admin/faq', [FaqController::class, 'index'])->name('faq.index');
    Route::get('/admin/faq-create', [FaqController::class, 'create'])->name('faq.create');
    Route::post('/admin/faq-store', [FaqController::class, 'store'])->name('faq.store');
    Route::get('/admin/faq-detail/{id_faq}', [FaqController::class, 'detail'])->name('faq.detail');
    Route::get('/admin/faq-edit/{id_faq}', [FaqController::class, 'edit'])->name('faq.edit');
    Route::put('/admin/faq-update/{id_faq}', [FaqController::class, 'update'])->name('faq.update');

    Route::get('/admin/pesan', [PesanController::class, 'index'])->name('pesan.index');
    Route::get('/admin/pesan-edit/{id_pesan}', [PesanController::class, 'edit'])->name('pesan.edit');
    Route::put('/admin/pesan-update/{id_pesan}', [PesanController::class, 'update'])->name('pesan.update');
    Route::get('/admin/pesan-detail/{id_pesan}', [PesanController::class, 'detail'])->name('pesan.detail');
    Route::delete('/admin/pesan-delete/{id_pesan}', [PesanController::class, 'destroy'])->name('pesan.delete');




    Route::get('/admin/permintaan/tabungan', [TabunganController::class, 'index'])->name('tabungan.index');
    Route::get('/admin/permintaan/tabungan-detail/{id_eform_tabungan}', [TabunganController::class, 'detail'])->name('tabungan.detail');
    Route::get('/admin/permintaan/tabungan-editStatus/{id_eform_tabungan}', [TabunganController::class, 'editStatus'])->name('tabungan.editStatus');
    Route::put('/admin/permintaan/tabungan-editStatus/{id_eform_tabungan}', [TabunganController::class, 'updateStatus'])->name('tabungan.updateStatus');

    Route::get('/admin/permintaan/deposito', [DepositoController::class, 'index'])->name('deposito.index');
    Route::get('/admin/permintaan/deposito-detail/{id_eform_deposito}', [DepositoController::class, 'detail'])->name('deposito.detail');
    Route::get('/admin/permintaan/deposito-editStatus/{id_eform_deposito}', [DepositoController::class, 'editStatus'])->name('deposito.editStatus');
    Route::put('/admin/permintaan/deposito-updateStatus/{id_eform_deposito}', [DepositoController::class, 'updateStatus'])->name('deposito.updateStatus');


    Route::get('/admin/permintaan/kredit', [KreditController::class, 'index'])->name('kredit.index');
    Route::get('/admin/permintaan/kredit-detail/{id_eform_kredit}', [KreditController::class, 'detail'])->name('kredit.detail');
    Route::get('/admin/permintaan/kredit-editStatus/{id_eform_kredit}', [KreditController::class, 'editStatus'])->name('kredit.editStatus');
    Route::put('/admin/permintaan/kredit-updateStatus/{id_eform_kredit}', [KreditController::class, 'updateStatus'])->name('kredit.updateStatus');




    Route::get('/admin/informasi', [InformasiController::class, 'index'])->name('informasi.index');
    Route::get('/admin/informasi-create', [InformasiController::class, 'create'])->name('informasi.create');
    Route::post('/admin/informasi-store', [InformasiController::class, 'store'])->name('informasi.store');
    Route::get('/admin/informasi-edit/{id_informasi}', [InformasiController::class, 'edit'])->name('informasi.edit');
    Route::get('/admin/informasi-detail/{id_informasi}', [InformasiController::class, 'show'])->name('informasi.detail');
    Route::put('/admin/informasi-update/{id_informasi}', [InformasiController::class, 'update'])->name('informasi.update');
    Route::delete('/admin/informasi-delete/{id_informasi}', [InformasiController::class, 'destroy'])->name('informasi.delete');

    Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

    // profile
    Route::resource('visions', VisionController::class)->except(['show']);
    Route::resource('missions', MissionController::class)->except(['show']);
    Route::resource('emails', EmailController::class)->except(['show']);
    Route::resource('countries', CountryController::class)->only(['index']); // numbers related
    Route::resource('phone-numbers', PhoneNumberController::class)->except(['show']); // numbers related
    Route::resource('whatsapps', WhatsappController::class)->except(['show']); // numbers related
    Route::resource('addresses', AddressController::class)->except(['show']);
    Route::resource('excellences', ExcellenceController::class)->except(['show']);
    Route::resource('company-profile-videos', CompanyProfileVideoController::class)->except(['show']);

    // client
    Route::resource('contact-forms', ContactFormController::class)->except(['show']); // numbers related
    Route::resource('company-values', CompanyValueController::class)->except(['show']);
    Route::resource('clients', ClientController::class)->except(['show']);
    Route::resource('testimonies', TestimonyController::class)->except(['show']);

    // team
    Route::resource('teams', TeamController::class)->except(['show']);
    Route::resource('positions', PositionController::class)->except(['show']);

    // post
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::resource('post-types', PostTypeController::class)->except(['show']);
    Route::resource('posts', PostController::class);
    Route::resource('tags', TagController::class)->except(['show']);

    // product
    Route::resource('products', ProductController::class)->except(['show']);
    Route::resource('features', FeatureController::class)->except(['show']);
    Route::resource('benefits', BenefitController::class)->except(['show']);
    Route::resource('advantages', AdvantageController::class)->except(['show']);
    Route::resource('supports', SupportController::class)->except(['show']);

    Route::controller(LaporanController::class)->group(function () {
        Route::get('admin/laporans', 'index')->name('admin.laporans.index');
        Route::get('admin/laporans/create', 'create')->name('admin.laporans.create');
        Route::post('admin/laporans', 'store')->name('admin.laporans.store');
        Route::get('admin/laporans/{report}', 'show')->name('admin.laporans.show');
        Route::get('admin/laporans/{report}/edit', 'edit')->name('admin.laporans.edit');
        Route::put('admin/laporans/{report}', 'update')->name('admin.laporans.update');
        Route::delete('admin/laporans/{report}', 'destroy')->name('admin.laporans.destroy');
    });
});
