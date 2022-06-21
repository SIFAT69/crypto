<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
  DappController,
  CategoryController,
  MasterController,
  HistoryController,
  SearchController,
  AdvertisementController,
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MasterController::class, 'index'])->name('welcome');
Route::get('/link/{id}', [HistoryController::class, 'history_index'])->name('history.index');
Route::get('/category/{id}', [DappController::class, 'dapps_category'])->name('category.dapps');
Route::post('/search/', [SearchController::class, 'search_result'])->name('search.result');
Route::get('/ads/', [AdvertisementController::class, 'ads_click'])->name('ads.click');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
   Route::get('/dashboard/dapp/', [DappController::class, 'index'])->name('dashboard.dapp.index');
   Route::post('/dashboard/dapp/save', [DappController::class, 'store'])->name('dashboard.dapp.store');
   Route::post('/dashboard/dapp/update/{id}', [DappController::class, 'edit'])->name('dashboard.dapp.update');
   Route::get('/dashboard/dapp/delete/{id}', [DappController::class, 'delete'])->name('dashboard.dapp.delete');
   Route::get('/dashboard/dapp/favorite/{id}', [DappController::class, 'add_favorite'])->name('dashboard.dapp.favorite');

   Route::get('/dashboard/dapp/category/', [CategoryController::class, 'category'])->name('dashboard.dapp.category');
   Route::post('/dashboard/dapp/category/save/', [CategoryController::class, 'category_save'])->name('dashboard.dapp.category.save');
   Route::post('/dashboard/dapp/category/update/{id}', [CategoryController::class, 'category_update'])->name('dashboard.dapp.category.update');
   Route::get('/dashboard/dapp/category/delete/{id}', [CategoryController::class, 'category_delete'])->name('dashboard.dapp.category.delete');

   Route::get('/dashboard/ads/', [AdvertisementController::class, 'index'])->name('dashboard.ads.index');
   Route::post('/dashboard/ads/update/', [AdvertisementController::class, 'update'])->name('dashboard.ads.update');

 });

Route::get('/logout', function () {
  Auth::logout();
  return redirect()->route('login')->with('success', 'Successfully Logged Out.');
})->name('logout');

require __DIR__.'/auth.php';
