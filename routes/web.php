<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

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

############################## News Page ##################################
// Route::get('/', [NewsController::class, 'index'])->name('news.parent');

// Route::get('/conatct', function () {
//     return view('pages.contact');
// })->name('news.conatct');
// Route::prefix('news')->group(function () {
//     Route::get('local', 'newsController@local')->name('thread.local');
//     Route::get('sport', 'newsController@sport')->name('thread.sport');
//     Route::get('international', 'newsController@international')->name('thread.international');
//     Route::get('details/{id}', 'newsController@details')->name('thread.details');
// });


######################orgnaization content###################################

Route::get('/', function () {
    return view('pages.org.home');
})->name('home');
Route::get('/about', function () {
    return view('pages.org.about');
})->name('about');
Route::get('/activities', function () {
    return view('pages.org.activities');
})->name('activities');
Route::get('/team', function () {
    return view('pages.org.team');
})->name('team');
Route::get('/contact', function () {
    return view('pages.org.contact');
})->name('contact');


############################# Dashboard Just For Verification Emails ####################################

Route::prefix('dash')->middleware(['auth:admin,user', 'verified'])->group(function () {

    ### Dashboard Page ###
    Route::get('/', 'DashboardController@index')->name('dashboard');

    ### Team  Methods ###
    Route::resource('team', TeamController::class);
    ### Trash Method For team Controller ###
    Route::prefix('team/trash')->group(function () {
        Route::get('/read', 'TeamController@trash')->name('team.trash');
        Route::get('/{id}', 'TeamController@restore')->name('team.restore');
        Route::delete('/{id}', 'TeamController@forceDelete')->name('team.forceDelete');
    });
    ### Posts  Methods ###
    Route::resource('posts', PostController::class);

    ### Pages Methods ###
    Route::resource('pages', PageController::class);
    Route::get('page/{page}/posts/edit', 'PageController@editPagePosts')->name('page-posts.edit');
    Route::put('page/{page}/posts', 'PageController@updatePagePosts')->name('page-posts.update');
    // pages/{{ $page->id }}/posts
    // /dash/pages/{{ $page->id }}/posts
    ### Trash Method For Admin Controller ###
    Route::prefix('posts/trash')->group(function () {
        Route::get('/read', 'postController@trash')->name('posts.trash');
        Route::get('/{id}', 'postController@restore')->name('posts.restore');
        Route::delete('/{id}', 'PostController@forceDelete')->name('posts.forceDelete');
    });


    ### Admin Methods ###
    Route::resource('admin', AdminController::class);

    ### Trash Method For Admin Controller ###
    Route::prefix('admin/trash')->group(function () {
        Route::get('/read', 'AdminController@trash')->name('admin.trash');
        Route::get('/{id}', 'AdminController@restore')->name('admin.restore');
        Route::delete('/{id}', 'AdminController@forceDelete')->name('admin.forceDelete');
    });

    ### Change Password ###
    Route::prefix('admin/password')->group(function () {

        Route::get('change', 'auth\authController@changePassword')->name('password.change');
        Route::post('update', 'auth\authController@updatePassword')->name('password.update');
    });

    ### Permissions and Roles ###
    Route::resource('Roles', RoleController::class);
    Route::resource('permission', PermissionsController::class);
    Route::get('role/{role}/permissions/edit', 'RoleController@editRolePermissions')->name('role-permissions.edit');
    Route::put('role/{role}/permissions', 'RoleController@updateRolePermissions')->name('role-permissions.update');
});

############################################ Email Verification ###########################

Route::prefix('dash')->middleware(['auth:admin,user'])->group(function () {
    Route::get('logout', 'auth\authController@logout')->name('auth.logout');
    Route::get('email-verification', 'auth\authController@showVerification')->name('verification.notice');
    Route::get('email-verification/send', 'auth\authController@sendEmailVerification')->name('verification.send');
    Route::get('email-verification/{id}/{hash}', 'auth\authController@verify')->name('verification.verify');
});

#################################### Auth Page For Dashboard ##########################################

Route::prefix('auth')->middleware(['guest:admin,user'])->group(function () {

    Route::get('{guard}/login', 'auth\authController@showLogin')->name('auth.show-login');
    Route::post('login', 'auth\authController@login')->name('auth.login');
    Route::get('forget', 'auth\authController@forgetPassword')->name('password.forget');
    Route::post('forget', 'auth\authController@sendResetEmail')->name('password.email');
    Route::get('forget/{token}', 'auth\authController@resetPassword')->name('password.reset');
    Route::post('recover', 'auth\authController@recoverPassword')->name('password.recover');
});
// Pa$$w0rd!



#################### Maintainance Mood ############################

// Route::get('down', function () {
//     Artisan::call('down');
// });
