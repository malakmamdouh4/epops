<?php

use App\Http\Controllers\admin\AdminProfileController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\NewsPapersController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\admin\UpdateUserController;
use App\Http\Controllers\UserController;
use App\Mail\VerifyMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Vedmant\FeedReader\Facades\FeedReader;


Route::get('/', function () {return redirect('admin/home');});

Auth::routes();



    // admins management by super_admin
Route::resource('admins', 'admin\AdminController' , ['except' => ['show']])->middleware('auth');


Route::prefix('admin')->middleware('auth')->group(function ()
{

        //  get into dashboard as a admin
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        // edit admin profile
    Route::get('editprofile',[AdminProfileController::class,'editprofile'])->name('editprofile');
    Route::put('updateprofile',[AdminProfileController::class,'updateprofile'])->name('updateprofile');
    Route::put('updatepassword',[AdminProfileController::class,'upadate_profile_password'])->name('updatePassword');
    Route::put('updateimage',[AdminProfileController::class,'upadate_profile_image'])->name('updateImage');

    // edit users by admin
     Route::get('showusers',[UpdateUserController::class,'showUsers'])->name('showusers');
     Route::delete('deleteuser/{userid}',[UpdateUserController::class,'deleteUser'])->name('deleteuser');
     Route::put('edituserstatus/{userid}',[UpdateUserController::class,'editUserStatus'])->name('edituserstatus');
        //articles
     Route::resource('articles', admin\ArticleController::class);
        //newspapers
     Route::resource('newspapers', admin\NewsPapersController::class);
        //Tags
    Route::resource('tags', admin\TagController::class);


});

Route::view('forgot_password', 'auth.reset_password')->name('password.reset');

Route::get('/read-rss/{id}', [NewsPapersController::class,'readrss']);


            // notes
// no validation in articles                 Done
// no validation in newspapers               Done
// no validation in tags                     Done
// no id to newspaper in articles.....       Done
// newspaper i will add select contain tags  Done
// media in atricle should be null           Done

//Route::get('reset-password/{token}', [UserController::class, 'reset']);

Route::get('/verifyemail/{code}',[\App\Http\Controllers\VerificationController::class,'hi'])->name('hi');
