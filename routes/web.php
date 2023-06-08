<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

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
Route::get('/test', [Controller::class, 'test']);
Route::get('/up', [Controller::class, 'up']);

Route::get('/', [Controller::class, 'welcome']);
Route::get('/logout', [Controller::class, 'logout']);
Route::get('/map', [Controller::class, 'map']);

Route::get('/shop', [RestaurantController::class, 'index'])->name('shop');
Route::post('/search', [RestaurantController::class, 'search']);
Route::post('/shop/show/{id}', [RestaurantController::class, 'show']);
Route::get('/shop/create', [RestaurantController::class, 'create'])->name('shopCreate');
Route::post('/shop/create/result/', [RestaurantController::class, 'createResult']);
Route::match(['get', 'post'], '/shop/store/', [RestaurantController::class, 'store']);
Route::get('/shop/edit/{id}', [RestaurantController::class, 'edit']);
Route::post('/shop/edit/result/{id}', [RestaurantController::class, 'editResult']);
Route::match(['get', 'post'], '/shop/edit/store/{id}', [RestaurantController::class, 'editStore']);
Route::post('/shop/del/{id}', [RestaurantController::class, 'delete']);

Route::get('/shop/category', [CategoryController::class, 'index'])->name('category');
Route::post('/shop/category/store', [CategoryController::class, 'store']);
Route::post('/shop/category/del/{id}', [CategoryController::class, 'delete']);
Route::get('/shop/category/edit/{id}', [CategoryController::class, 'edit']);
Route::post('/shop/category/update/{id}', [CategoryController::class, 'update']);

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    
    Route::get('/dashboard', function () {
        $user = Auth::user();
        return view('dashboard', ['user' => $user]);
    })->name('dashboard');
});
