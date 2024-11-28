<?php

use App\Http\Controllers\adsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/', function(){
//     return view('welcome');
// })->middleware('verified');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/profile', function () {
    // Only verified users may access this route...
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('verified')->group(function () {
Route::get('/', [adsController::class, 'liste_ads'])->name('annonces');
Route::get('/listeIndex', [adsController::class, 'listeIndex'])->name('listeIndex');
Route::get('/listeAdsUser', [adsController::class, 'liste_user_ads'])->name('liste_annonces_utilisateur');
Route::get('/search', [adsController::class, 'search'])->name('search');
Route::get('/ajoutAds', [adsController::class, 'ajouter_ads'])->name('ajoutAds');
Route::post('/ajoutAds/traitementAds', [adsController::class, 'traitement_ads']);
Route::get('/update/{id}', [adsController::class,'update_ads']);
Route::post('/update/traitementAds', [adsController::class,'update_ads_traitement']);
Route::get('/delete/{id}', [adsController::class,'delete_ads']);});
// Route::get('/deconnexion', [adsController::class, 'deconnexion'])->name('deconnexion');


require __DIR__.'/auth.php';
