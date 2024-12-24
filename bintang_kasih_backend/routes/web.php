<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TeachersController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\StudentsController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\FormulirController;
use App\Models\Teachers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\LoginController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('admin')
    // ->middleware(['auth', 'admin'])
    ->group(function () { //prefix untuk menambahkan awalan URL ke semua rute yang didefinisikan di dalam grup, cth : http://example.com, rute ini akan menjadi http://example.com/admin.
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard'); //merujuk ke function index dari DashboardController dan route ini diberi nama 'dashboard' supaya tau route ini utk bagian apa

        Route::resource('students', StudentsController::class);
        Route::resource('teachers', TeachersController::class);
        Route::resource('gallery', GalleryController::class);
        Route::resource('transaction', TransactionController::class);
    });

// Route untuk menyimpan data pendaftaran (student dan parent)
Route::post('/formulir/store', [FormulirController::class, 'store']);

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [LoginController::class, 'logout']);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/{any}', function () {
    return view('pages.home');
})->where('any', '.*');  // This allows Vue Router to handle all front-end routes