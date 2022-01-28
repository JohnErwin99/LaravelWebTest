<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use Illuminate\Routing\Route as RoutingRoute;
use App\Models\ServiceIndustry;


/** Auth */
Auth::routes();

/** Main */
Route::get('/', [HomeController::class, 'main'])->name('main');
Route::post('/home/search', [HomeController::class, 'searchBusiness'])->name('home.searchBusiness');

/** Login Routes*/
Route::post('/login/business', [LoginController::class, 'businessOwnerLogin'])->name("login.business");
Route::post('/login/customer', [LoginController::class, 'customerLogin'])->name('login.customer');

/** Register Routes*/
Route::get('/register/businessShow',[RegisterController::class, 'showBusinessOwnerRegisterForm'])->name('register.businessShow');
Route::get('/register/customerShow', [RegisterController::class, 'showCustomerRegisterForm'])->name('register.customerShow');
Route::post('/register/businessSubmit', [RegisterController::class, 'createBusinessOwner'])->name('register.businessSubmit');;
Route::post('/register/customerSubmit', [RegisterController::class, 'createCustomer'])->name('register.customerSubmit');;;



/** Business Owner */
Route::view('/customer', 'customer');
Route::view('/business_owner', 'business_owner');


/** Customer Routes */
Route::get('/customer/index', [CustomerController::class, 'index'])->name('customer.index');
// Route::get('/customer/index', function() {
//     return dd(Auth::user());
// });

Route::get('/customer/account', [CustomerController::class, 'account'])->name('customer.account');
Route::post('/customer/update', [CustomerController::class, 'update'])->name('customer.update');
Route::get('/customer/register_profile', [CustomerController::class, 'register_profile'])->name('customer.register_profile');

/** Site Routes */
Route::get('/site/register_site', [SiteController::class, 'show_register_form'])->name('site.show_register_form');
Route::post('/site/register_business', [SiteController::class, 'store_business_information'])->name('site.register_business');
Route::get('/site/index', [SiteController::class, 'index'])->name('site.index');
Route::view('contact_us', [SiteController::class, 'contact_us'])->name('contact_us');
Route::post('home', [SiteController::class, 'send_contact_us'])->name('contact_us');


Route::get('/site/setupBusiness', [SiteController::class, 'setupBusiness'])->name('site.setupBusiness');
