<?php


use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Notifications\ResetPassword;
use App\Http\Controllers\VerificationController;
use App\Mail\VerifyMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// get all Categories ( true ) from tag
Route::get('getCategories','NewsController@getCategories');

// get all articles that belongs to specific tag
Route::post('getArticlesTag','NewsController@getArticlesTag');

// get all articles that belongs to specific newspaper
Route::post('getArticlesNews','NewsController@getArticlesNews');

// get count of likes for every article
Route::get('countLikes','NewsController@countLikes');

// get count of likes for every article
Route::get('countFollows','NewsController@countFollows');

// get all articles in random ( home )
Route::get('getAllArticles','NewsController@getAllArticles');



Route::group([
    'middleware' => 'api'

], function ($router) {
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/login', [UserController::class, 'login']);

//    Route::post('email/verification-notification', [VerificationController::class, 'sendVerificationEmail']);
//    Route::get('verify-email/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');

    Route::get('/verifyuser','VerificationController@verifyuser');
    Route::post('/getcodeemail','VerificationController@getcodeemail');

    Route::put('/updateprofile', [UserController::class, 'updateprofile']);
    Route::put('/updatepassword', [UserController::class, 'updatepassword']);

    Route::post('addLike','UserController@addLike');
    Route::post('addFollow','UserController@addFollow');

    Route::post('addToSaved','UserController@addToSaved');
    Route::post('getAllSaved','UserController@getAllSaved');

    Route::post('/logout', [UserController::class, 'logout']);
    Route::post('/refresh', [UserController::class, 'refresh']);
//    Route::get('test', [UserController::class, 'test']);

});

//Route::post('password/email', 'ForgotPasswordController@forgot');
//Route::post('password/reset', 'ForgotPasswordController@reset');

// verify , active,non active

//Route::post('forgot-password', [UserController::class, 'forgotPassword']);
//Route::post('reset-password', [UserController::class, 'reset']);

Route::post('forgot-password', [VerificationController::class, 'forgotPassword']);
Route::post('reset-password', [VerificationController::class, 'reset']);

//returen all tags
//media == null
