<?php

use App\Http\Controllers\PublicSiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicSiteController::class, 'home'])->name('home');
foreach (['profile'=>'profil','activities'=>'kegiatan','potential'=>'potensi','services'=>'layanan','structure'=>'struktur','facilities'=>'fasilitas','gallery'=>'galeri','transparency'=>'transparansi','contact'=>'kontak','complaint'=>'pengaduan'] as $view=>$path) {
    Route::get($path, fn (PublicSiteController $controller) => $controller->page($view))->name($view);
}
Route::get('/kegiatan/{slug}', [PublicSiteController::class, 'activity'])->name('activities.show');
Route::get('/potensi/{slug}', [PublicSiteController::class, 'potential'])->name('potential.show');
Route::get('/wisata', [PublicSiteController::class, 'tourism'])->name('tourism');
Route::get('/wisata/{slug}', [PublicSiteController::class, 'tourismDetail'])->name('tourism.show');
Route::get('/layanan/{slug}', [PublicSiteController::class, 'service'])->name('services.show');
Route::post('/pengaduan', [PublicSiteController::class, 'complaint'])->name('complaint.store');
