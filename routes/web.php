<?php

use App\Http\Controllers\DestinationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Destination;
use App\Http\DestinationControllers;
use App\Models\Attraction;
use App\Http\Controllers\AttractionController;
use App\Models\Review;
use App\Http\Controllers\ReviewController;


require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    return view('destinations.indexDestinasi');
})->middleware(['auth', 'verified'])->name('dashboard');



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

Route::get("/indexDestinasi", function () {
    $destinations = Destination::all();
    return view('pages.indexDestinasi', compact('destinations'));
});

Route::get("/detaildestinasi1/{id}", function ($id) {
    $destinations = Destination::find($id);
    return view('pages.destinations.detaildestinasi1', compact('destinations'));
});
Route::prefix('destinations')->name('destinations.')->middleware('auth')->group(function () {
    Route::get("/", [DestinationController::class, 'index'])->name('index');
    Route::get("/create", [DestinationController::class, 'create'])->name('create');
    Route::get("/{id}/show", [DestinationController::class, 'show'])->name('show');
    Route::post("/", [DestinationController::class, 'store'])->name('store');
    Route::delete('/{id}', [DestinationController::class, 'delete'])->name('delete');
    Route::get('/{id}/edit', [DestinationController::class, 'edit'])->name('edit');
    Route::put('/{id}/update', [DestinationController::class, 'update'])->name('update');
});

Route::prefix('user')->name('user.')->middleware('auth')->group(function () {
    Route::get("/", [UserController::class, 'index'])->name('index');
    Route::get("/create", [UserController::class, 'create'])->name('create');
    Route::post("/", [UserController::class, 'store'])->name('store');
    Route::delete('/{id}', [UserController::class, 'delete'])->name('delete');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
    Route::put('/{id}/update', [UserController::class, 'update'])->name('update');
    Route::get('/{id}/show', [UserController::class, 'show'])->name('show');
});

Route::prefix('attractions')->name('attractions.')->middleware('auth')->group(function () {
    Route::get("/", [AttractionController::class, 'index'])->name('index');
    Route::get("/create", [AttractionController::class, 'create'])->name('create');
    Route::get('/{id}/show', [AttractionController::class, 'show'])->name('show');
    Route::post("/", [AttractionController::class, 'store'])->name('store');
    Route::delete('/{id}', [AttractionController::class, 'delete'])->name('delete');
    Route::get('/{id}/edit', [AttractionController::class, 'edit'])->name('edit');
    Route::put('/{id}/update', [AttractionController::class, 'update'])->name('update');
    
});

Route::resource('reviews', \App\Http\Controllers\ReviewController::class)->middleware('auth');


// <?php

// use App\Http\Controllers\ProfileController;
// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
