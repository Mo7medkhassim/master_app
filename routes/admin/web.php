<?php



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::name('dashboard.')->prefix('dashboard')->group(function () {

            Route::group(['namespace' => 'Auth', 'middleware' => ['guest']], function () {
                Route::get('/login',  'LoginController@login');
            });


            Route::group(['middleware' => 'signGuard:admin'], function () {

                //
                Route::match(['get', 'post'], '/', 'HomeController@index')->name('home');

                // Admin routes
                Route::resource('admins', 'AdminController')->except(['show']);

                // Client with order routes
                Route::resource('clients', 'ClientController')->except(['show']);
                Route::resource('clients.orders', 'Clients\OrderController')->except(['show']);

                // Order routes
                Route::resource('orders', 'OrderController')->except(['show']);
                Route::get('/order/{order}/products', 'OrderController@products')->name('orders.products');

                // Role routes
                Route::resource('roles', 'RoleController')->except(['show']);

                // Category routes
                Route::resource('categories', 'CategoryController')->except(['show']);

                // product routes
                Route::resource('products', 'ProductController')->except(['show']);

                // Invoice Route
                Route::resource('invoice', 'InvoicesController')->except(['show']);
            });
        });


    }
);



// Route::resource('admin/section', SectionController::class);

Auth::routes(['register' => false]);

Route::get('/', function () {
    return view('welcome');
});

