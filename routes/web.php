<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TreatmentController;


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

// Route::get('test', function () {
// 	return view('pages.order.modal');
// });

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/', [FrontController::class, 'index']);
Route::get('cards/{id}', [FrontController::class, 'viewcategory']);
Route::get('details-treatment/{id}', [FrontController::class, 'detailTreatment']);
Route::get('details-product/{id}', [FrontController::class, 'detailProduct']);

//cart treatment
Route::post('add-to-cart', [CartController::class, 'addtocart']);
Route::get('/load-cart-data', [CartController::class, 'cartloadbyajax']);
Route::get('/cart', [CartController::class, 'index']);
Route::post('update-to-cart', [CartController::class, 'updatetocart']);
Route::delete('delete-from-cart', [CartController::class, 'deletefromcart']);

//check-out

Route::get('check-out', [CheckoutController::class, 'index']);
Route::get('thank_you', [CheckoutController::class, 'done']);
Route::post('place_order', [CheckoutController::class, 'store']);

//cart product
// Route::post('add-to-cart', [CartController::class, 'addtocart']);
// Route::get('/load-cart-data', [CartController::class, 'cartloadbyajax']);
// Route::get('/cart', [CartController::class, 'index']);
// Route::post('update-to-cart', [CartController::class, 'updatetocart']);
// Route::delete('delete-from-cart', [CarCartControllertController::class, 'deletefromcart']);
// Route::get('check-out', [CartController::class, 'index']);


Route::get('admin', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Auth::routes();
Route::group(['middleware' => 'auth'], function () {

	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

	// routes categories
	Route::get('category', [CategoryController::class, 'index']);
	Route::get('add_category', [CategoryController::class, 'add']);
	Route::post('update_category', [CategoryController::class, 'insert']);
	Route::get('edit_category/{id}', [CategoryController::class, 'edit']);
	Route::put('update_category/{id}', [CategoryController::class, 'update']);
	Route::get('delete_category/{id}', [CategoryController::class, 'delete']);

	//routes treatment

	Route::get('treatment', [TreatmentController::class, 'index']);
	Route::get('add_treatment', [TreatmentController::class, 'add']);
	Route::post('insert_treatment', [TreatmentController::class, 'insert']);
	Route::get('edit_treatment/{treatment_id}', [TreatmentController::class, 'edit']);
	Route::put('update_treatment/{treatment_id}', [TreatmentController::class, 'update']);
	Route::get('delete_treatment/{treatment_id}', [TreatmentController::class, 'delete']);

	// route product
	Route::get('product', [ProductController::class, 'index']);
	Route::get('add_product', [ProductController::class, 'add']);
	Route::post('insert_product', [ProductController::class, 'insert']);
	Route::get('edit_product/{id}', [ProductController::class, 'edit']);
	Route::put('update_product/{id}', [ProductController::class, 'update']);
	Route::get('delete_product/{id}', [ProductController::class, 'delete']);

	// route user
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('add_user', [UserController::class, 'add']);
	// Route::resource('user', [UserController::class], 'index');

	// route order
	Route::get('orders', [OrderController::class, 'index']);
	Route::get('view_order/{order_id}', [OrderController::class, 'view']);
	Route::get('process_order/{order_id}', [OrderController::class, 'process']);
	Route::get('download-pdf', [OrderController::class, 'laporan']);

	// Route::get('table-list', function () {
	// 	return view('pages.tables');
	// })->name('table');
});
