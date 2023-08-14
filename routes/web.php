<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Users\homeController;

use App\Http\Controllers\Users\Account\registerController;
use App\Http\Controllers\Users\Account\loginController;
use App\Http\Controllers\Users\Account\logoutController;
use App\Http\Controllers\Users\Account\ForgotPasswordController;
use App\Http\Controllers\Users\premium_Controller;
use App\http\Controllers\Users\moviess;
use App\Http\Controllers\Users\Account\AccountMangerController;
use App\Http\Controllers\AccountVerificationController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\CommentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


/*
|--------------------------------------------------------------------------
| FONT END ROUTE
|--------------------------------------------------------------------------
*/

Route::get('/', [homeController::class, 'home'])->name('home');

Route::middleware('web')->group(function () {
    // Các route cần lưu trữ session ở đây
    Route::get('/login', [loginController::class, 'get_login'])->name('get_login');
    Route::post('/login', [loginController::class, 'post_login'])->name('post_login');

    Route::get('/register', [registerController::class, 'get_register'])->name('get_register');
    Route::post('/register', [registerController::class, 'post_register'])->name('post_register');

    Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    
    Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');
    
    Route::get('/login', [LoginController::class, 'get_login'])->name('get_login');
    
    Route::get('/logout', [logoutController::class, 'logout'])->name('logout');

    Route::get('/movies', [registerController::class, 'get_movies'])->name('get_movies');
    Route::get('/movies/{id}', [moviess::class,'show'])->name('movies.show');

    Route::get('/detail', [moviess::class, 'get_detail'])->name('get_detail');

    Route::get('/watch/{id}', [moviess::class, 'watch'])->name('movies.watch');
    Route::get('/watch/{id}', [moviess::class, 'watch'])->name('movies.watch');

    Route::get('/trailler/{id}', [moviess::class, 'trailler'])->name('trailler.watch');

    Route::post('/search', [moviess::class, 'search'])->name('movies.search');

    Route::get('/category/{categoryId}/movies', [moviess::class, 'getMoviesByCategory'])
    ->name('category.movies');

    //Route::get('/movies/{id}/comments', [moviess::class, 'CommentsForMovie'])->name('movies.comments');
    Route::get('/movies/{id}/comments', [CommentController::class, 'CommentsForMovie'])->name('movies.comments');

    Route::get('/random-movies', [moviess::class, 'randomMovies'])->name('random.movies');

    Route::post('/comment', [moviess::class, 'comment'])->name('comment');

    Route::get('/manager_account', [AccountMangerController::class, 'show'])->name('account.show');
    Route::post('/manager_account', [AccountMangerController::class ,'updateImage'])->name('update_image');

});

Route::get('/manager_account', [AccountMangerController::class, 'show'])->name('account.show');
Route::post('/manager_account', [AccountMangerController::class ,'updateImage'])->name('update_image');

// web.php



Route::get('/api/movies/category/{category_id}', function ($category_id) {
    $movies = App\Models\Movie::where('category_id', $category_id)->get();
    return $movies;
});

use App\Models\Category;

Route::get('/api/category/{category_id}', function ($category_id) {
    $category = Category::find($category_id);
    return $category;
});




// route chuc nang tai khoan nguoi dung //
Route::prefix('auth')->group(function () {

});

Route::get('/account/verify/{token}', [AccountVerificationController::class, 'verify'])->name('account.verify');


use App\Http\Controllers\Users\Pay\PayController;
Route::get('/pay', [PayController::class, 'getpay'])->name('pay.index');
Route::post('/pay', [PayController::class, 'postpay'])->name('postpay');
Route::get('/display', [PayController::class, 'display'])->name('display');

/*
|--------------------------------------------------------------------------
| BACK END ROUTE
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Admin\Admin_page\AdminAccountController;

Route::get('/admin-accounts', [AdminAccountController::class, 'index'])->name('admin-accounts.index');
Route::get('/admin-accounts/create', [AdminAccountController::class, 'create'])->name('admin-accounts.create');
Route::post('/admin-accounts', [AdminAccountController::class, 'store'])->name('admin-accounts.store');
Route::get('/admin-accounts/{id}', [AdminAccountController::class, 'show'])->name('admin-accounts.show');
Route::get('/admin-accounts/{id}/edit', [AdminAccountController::class, 'edit'])->name('admin-accounts.edit');
Route::put('/admin-accounts/{id}', [AdminAccountController::class, 'update'])->name('admin-accounts.update');
Route::delete('/admin-accounts/{id}', [AdminAccountController::class, 'destroy'])->name('admin-accounts.destroy');

Route::get('/ss', function () {
    return view('admin.page/movie/index');
});

Route::get('/s', function () {
    return view('admin.page/movie/edit');
});

Route::get('/demo', function () {
    return view('users.page.account.verification');
});

Route::get('/sa', function () {
    return view('users.page.account.manager-account');
});


// routes/web.php

use App\Http\Controllers\Admin\AdminLoginController;

Route::get('admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminLoginController::class, 'login'])->name('admin.post.login');
Route::get('admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
Route::middleware(['auth:admin'])->group(function () {
    // Account routes
    Route::get('/accounts', [AccountController::class, 'index'])->name('accounts.index');
    Route::get('/accounts/create', [AccountController::class, 'create'])->name('accounts.create');
    Route::post('/accounts', [AccountController::class, 'store'])->name('accounts.store');
    Route::get('/accounts/{account}', [AccountController::class, 'show'])->name('accounts.show');
    Route::get('/accounts/{account}/edit', [AccountController::class, 'edit'])->name('accounts.edit');
    Route::put('/accounts/{account}', [AccountController::class, 'update'])->name('accounts.update');
    Route::delete('/accounts/{account}', [AccountController::class, 'destroy'])->name('accounts.destroy');
    
    // Payment routes
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::delete('/payments/{payment}', [PaymentController::class, 'destroy'])->name('payments.destroy');
    
    // Comment routes
    Route::resource('comments', CommentController::class)->only(['index', 'destroy']);
});




