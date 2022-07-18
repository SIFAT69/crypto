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
Route::get('/link/{id}', [DappController::class, 'ads_click'])->name('history.index');
Route::get('/category/{id}', [DappController::class, 'dapps_category'])->name('category.dapps');
Route::post('/search/', [SearchController::class, 'search_result'])->name('search.result');
Route::get('/ads/{id}', [AdvertisementController::class, 'ads_click'])->name('ads.click');
// Route::get('/dapp/{id}', [DappController::class, 'ads_click'])->name('dapp.click');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
   Route::get('/dashboard/dapp/', [DappController::class, 'index'])->name('dashboard.dapp.index');
   Route::get('/dashboard/dapp/step-1/', [DappController::class, 'dapp_create_one'])->name('dashboard.dapp.create.step_one');
   Route::get('/dashboard/dapps/list/', [DappController::class, 'usersdapp'])->name('dashboard.dapp.dapps');
   Route::post('/dashboard/dapp/save', [DappController::class, 'store'])->name('dashboard.dapp.store');
   Route::post('/dashboard/dapp/update/{id}', [DappController::class, 'edit'])->name('dashboard.dapp.update');
   Route::get('/dashboard/dapp/delete/{id}', [DappController::class, 'delete'])->name('dashboard.dapp.delete');
   Route::get('/dashboard/dapp/favorite/{id}', [DappController::class, 'add_favorite'])->name('dashboard.dapp.favorite');

   Route::get('/dashboard/dapp/category/', [CategoryController::class, 'category'])->name('dashboard.dapp.category');
   Route::get('/dashboard/dapp/web3/', [CategoryController::class, 'web3'])->name('dashboard.dapp.web3');
   Route::post('/dashboard/dapp/category/save/', [CategoryController::class, 'category_save'])->name('dashboard.dapp.category.save');
   Route::post('/dashboard/dapp/category/update/{id}', [CategoryController::class, 'category_update'])->name('dashboard.dapp.category.update');
   Route::get('/dashboard/dapp/category/delete/{id}', [CategoryController::class, 'category_delete'])->name('dashboard.dapp.category.delete');

   Route::get('/dashboard/ads/', [AdvertisementController::class, 'index'])->name('dashboard.ads.index');

   Route::get('/dashboard/ads/create/step-1/', [AdvertisementController::class, 'create_step_one'])->name('dashboard.ads.create.one');
   Route::post('/dashboard/ads/create/step-1/ad-details/', [AdvertisementController::class, 'create_step_one_details'])->name('dashboard.ads.create.one.details');

   Route::get('/dashboard/ads/create/step-2/{ads}', [AdvertisementController::class, 'create_step_two'])->name('dashboard.ads.create.two');
   Route::post('/dashboard/ads/create/step-2/targeting/{ads}', [AdvertisementController::class, 'create_step_two_targeting'])->name('dashboard.ads.create.two.targeting');

   Route::get('/dashboard/ads/create/step-3/{ads}', [AdvertisementController::class, 'create_step_three'])->name('dashboard.ads.create.three');
   Route::post('/payment', [AdvertisementController::class, 'create_step_three_payment'])->name('dashboard.ads.create.three.payment');

   Route::get('/dashboard/ads/all', [AdvertisementController::class, 'all_ads'])->name('dashboard.ads.all');
   Route::post('/dashboard/ads/save/', [AdvertisementController::class, 'save'])->name('dashboard.ads.save');
   Route::post('/dashboard/ads/update/{id}', [AdvertisementController::class, 'update'])->name('dashboard.ads.update');
   Route::get('/dashboard/ads/delete/{id}', [AdvertisementController::class, 'delete'])->name('dashboard.ads.delete');

 });

Route::get('/logout', function () {
  Auth::logout();
  return redirect()->route('login')->with('success', 'Successfully Logged Out.');
})->name('logout');

require __DIR__.'/auth.php';
