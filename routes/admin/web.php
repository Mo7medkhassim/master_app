<?php



use App\Http\Controllers\Admin\HomeController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


// Route::group(['prefix' => 'dashboard', 'name' => 'dashboard.'], function () {

Route::name('dashboard.')->prefix('dashboard')->group(function () {

    Route::group(['namespace' => 'Auth'], function () {
        Route::get('/login',  'LoginController@login');
    });


    Route::group(['middleware' => 'signGuard:admin'], function () {

        //
        Route::match(['get', 'post'], '/home', 'HomeController@index')->name('dashboard.home');

        // Admin routes
        Route::resource('admins', 'AdminController');


        // Role routes
        Route::resource('roles', 'RoleController');

        // product routes
        Route::resource('products', 'ProductController');

        // Invoice Route
        Route::resource('invoice', 'InvoicesController');
    });
});


Route::resource('admin/section', SectionController::class);


Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
