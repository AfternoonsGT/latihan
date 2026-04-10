<?php

use App\Http\Controllers\DestinationController;
use Illuminate\Support\Facades\Route;
use App\Models\Destination;
use App\Http\DestinationControllers;

Route::get('/', function () {
    return view(view: 'welcome');
});
Route::get("/halo", function () {
    $nama = "arif";
    $hobis = ["membaca", "menulis", "coding"];
    return view('halo', compact('nama', 'hobis'));
});

Route::get("/switch", function () {
    $role = "admin";
    return view('switch', compact('role'));
});

Route::get("/master", function () {
    return view('pages.home');
});

Route::get("/about", function () {
    return view('pages.about');
});

Route::get("/detaildestinasi", function () {
    $destinasi = [
        "nama" => "Bali",
        "harga" => 10000000,
        "lokasi" => "Denpasar, Bali",
        "durasi" => "4 Hari 3 Malam",
        "transportasi" => "Pesawat",
        "hotel" => "Bintang 4",
        "rating" => 4.8,
        "fasilitas" => ["Hotel", "Sarapan", "Tour Guide", "Transport Lokal"],
        "gambar" => "https://blog.bookingtogo.com/wp-content/uploads/2020/12/pura-ulun-danu-bratan-bali-bedugul-scaled.jpg",
    ];
    return view('pages.detaildestinasi', compact('destinasi'));
});

// Route::get("/indexDestinasi", function () {
//     $destinations = Destination::all();
//     return view('pages.indexDestinasi', compact('destinations'));
// });

// Route::get("/detaildestinasi1/{id}", function ($id) {
//     $destinations = Destination::find($id);
//     return view('pages.detaildestinasi1', compact('destinations'));
// });

Route::get(
    "/destinations",
    [DestinationController::class, 'index']
);

Route::get(
    "/detaildestinasi1/{id}",
    [DestinationController::class, 'show']
);

Route::get("/destinations/create", [DestinationController::class, 'create']);
Route::post("/destinations", [DestinationController::class, 'store']);
Route::delete('/destinations/{id}', [DestinationController::class, 'delete']);
Route::get('/destinations/{id}/edit', [DestinationController::class, 'edit'])->name('destination.edit');
Route::put('/destinations/{id}/update', [DestinationController::class, 'update'])->name('destination.update');
