<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AddAdminController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\StoreImageController;



Route::get('/', function () {
    return view('welcome');
});

// Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware('visitors')-> group (function(){
    Route::get('/register', [RegistrationController::class, 'register']);
    Route::post('/register', [RegistrationController::class, 'postregister']);
    
    Route::get('/login', [LoginController::class, 'login']);
    Route::post('/login', [LoginController::class, 'postlogin']);
});

//Controllers for user and admin login and register

Route::get('/forgot-password', [ForgotPasswordController::class, 'forgotPassword']);

Route::post('/forgot-password', [ForgotPasswordController::class, 'postForgotPassword']);

Route::post('/forgot-password', [ForgotPasswordController::class, 'postForgotPassword']);

Route::post('/logout', [LoginController::class, 'logout']);

// Route::get('/activate/{email}/{activationCode}','activationController@activate');

//This is the route to check and redirect the user according to their slugs
Route::get('/', function () {
	if(Sentinel::check())
	{
		  $slug=Sentinel::getUser()->roles()->first()->slug;
   
        if($slug=='admin')
         return redirect('/Admin_dashboard');
      elseif ($slug=='client')
         return redirect('/Client_dashboard');
	}
    else 
    	return view('welcome');
});

//This routes is to redirect all the pages of Client dashboard
Route::middleware('client')-> group (function(){
    Route::get('/Client_dashboard', [ClientController::class, 'showClientDashBoard']);
    Route::get('/bookNow', [ClientController::class, 'bookNow']);
    Route::post('/bookNow', [ClientController::class, 'postBook']);
    Route::get('/myBooking', [ClientController::class, 'myBooking']);
    Route::get('/availableTime', [ClientController::class, 'viewTime']);
    Route::delete('/myBooking/{id}', [ClientController::class, 'destroyMyBooking']);
    Route::get('/changePassword', [ClientController::class, 'showchangePassword']);
    Route::post('/changePassword', [ClientController::class, 'changePassword']);
    Route::get('/store_payment', [StoreImageController::class, 'payment']);
    Route::post('/store_image/insert_image', [StoreImageController::class, 'insert_image']);

});

//This routes is to redirect all the pages of Admin dashboard
Route::middleware('admin')-> group (function(){
    Route::get('/Admin_dashboard', [AdminController::class, 'showDashBoard']);
    Route::get('/viewBooking', [AdminController::class, 'showBookings']);
    Route::get('/addAdmin', [AddAdminController::class, 'showaddAdmins']);
    Route::post('/addAdmin', [AddAdminController::class, 'addAdmin']);
    Route::get('/Users', [AdminController::class, 'showUsers']);
    Route::delete('/Users/{id}', [AdminController::class, 'destroyUser']);
    Route::get('/viewAdmin', [AdminController::class, 'viewAdmin']);
    Route::get('/bookNowAdmin', [AdminController::class, 'bookNowAdmin']);
    Route::post('/bookNowAdmin', [AdminController::class, 'postBookNowAdmin']);
    Route::get('/adminBooking', [AdminController::class, 'viewBookTimeAdmin']);
    Route::delete('/viewBooking/{id}', [AdminController::class, 'destroyBooking']);
    Route::delete('/viewAdmin/{id}', [AdminController::class, 'destroyAdmin']);
    Route::get('/store_image', [StoreImageController::class, 'index']);
    Route::get('/store_image/fetch_image/{id}', [StoreImageController::class, 'fetch_image']);
    
});


    

    
