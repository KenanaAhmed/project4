<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Manager\AccountController;
use App\Http\Controllers\Manager\CompanyProfileManager;
use App\Http\Controllers\User\SubscribeController;
use App\Http\Controllers\User\TransferBalance;
use App\Http\Controllers\WebSite;
use App\Models\Subscribe;

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




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('updateProfile/{id}',[App\Http\Controllers\HomeController::class,'updateProfile'])->name('updateProfile');
//Admin

Route::group(['middleware'=>['admin','auth'],'prefix'=>'admin'],function(){

    Route::get('/',[AdminController::class,'index'])->name('admin.home');
    Route::get('/profile/{id}',[AdminController::class,'profile'])->name('admin.profile');
    Route::get('/statistical',[AdminController::class,'counts'])->name('statistical');
    Route::resource('cities', CityController::class);
    Route::resource('companies', CompanyController::class);
    Route::resource('users',AdminUserController::class);
    //Requests For Join
    Route::get('/managersIndexRequest',[AdminUserController::class,'managers'])->name('managers.index');
    Route::delete('/managersDelete/{id}',[AdminUserController::class,'managersDelete'])->name('managers.delete');
    Route::get('/managers/edit/{id}',[AdminUserController::class,'managerEdit'])->name('managers.edit');
    Route::post('/manager/create/{id}',[AdminUserController::class,'managerCreate'])->name('managers.create');


    Route::get('/comment/Store',[CommentController::class,'index'])->name('comments.index');
    Route::delete('/comment/delete/{id}',[CommentController::class,'delete'])->name('comments.delete');


});
//Manager

Route::group(['middleware'=>['manager','auth']],function(){

    Route::get('/manager',[ManagerController::class,'index'])->name('manager.home');
    Route::get('/profile/{id}',[ManagerController::class,'profile'])->name('manager.profile');
    Route::put('/companyInfo/{id}',[CompanyProfileManager::class,'update'])->name('companiesInfo.update');
    Route::get('/subscribe/index',[SubscribeController::class,'index'])->name('subscribe.index');
    //Accept
    Route::get('/subscribe/accept/{id}',[SubscribeController::class,'accept'])->name('subscribe.accept');
    Route::post('/subscribe/accepted/{id}',[SubscribeController::class,'accepted'])->name('subscribe.accepted');

    //un accept
    Route::get('/subscribe/un-accept/{id}',[SubscribeController::class,'unaccept'])->name('subscribe.Unaccept');
    //remove
    Route::delete('/subscribe/delete/{id}',[SubscribeController::class,'destroy'])->name('subscribe.delete');
    //accounts:subscribers
    Route::get('/accounts',[AccountController::class,'index'])->name('accounts.index');
    //account active
    Route::get('accounts/active/{id}',[AccountController::class,'active'])->name('accounts.active');
    //account decline
    Route::get('accounts/decline/{id}',[AccountController::class,'decline'])->name('accounts.decline');
    //transfer
    Route::get('transfer/index',[TransferBalance::class,'index'])->name('transfer.index');
    //accept transfer
    Route::get('transfer/accept/{id}',[TransferBalance::class,'accept'])->name('transfer.accept');



    //decline transfer

});

//User

Route::group(['middleware'=>['user','auth']],function(){

    //accounts + home
    Route::get('/user',[UserController::class,'index'])->name('user.home');

    //subscribe.store
    Route::post('/subscribe/store',[SubscribeController::class,'store'])->name('subscribe.store');

    //transfer
    Route::get('/transfer/create/{id}',[TransferBalance::class,'create'])->name('transfer.create');
    //store
    Route::post('/transfer/store/{id}',[TransferBalance::class,'store'])->name('transfer.store');

});

//Site

Route::get('/',[WebSite::class,'index'])->name('site.welcome');
Route::get('/companyDetalis/{id}',[WebSite::class,'show'])->name('companyDetalis.show');
Route::post('/comment/Store',[CommentController::class,'store'])->name('comments.store');
Route::get('/companies/cities/{id}',[WebSite::class,'companiesCity'])->name('companies.cities');



//For Manager To Register His Company
Route::get('/registerManager',[WebSite::class,'registerManager'])->name('regester.manager');
Route::post('/managerRegister',[WebSite::class,'registerManagerStore'])->name('manager.store');


//
