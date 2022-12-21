<?php
use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return \Laravel\Socialite\Facades\Socialite::driver('azure')->redirect();
});
Route::get('/callback', function () {
    $user = \Laravel\Socialite\Facades\Socialite::driver('azure')->user();
//    dd($user->getEmail());
    User::firstOrCreate(
        ['email' => $user->getEmail()],
        ['name' => $user->getName()]
    );

});

//\App\Models\User::findOrCreate


//Route::resource('/issues', '\App\Http\Controllers\IssueController')->names('issues');
//Route::resource('/sprint', '\App\Http\Controllers\ApiPostController')->names('sprint')->only('sprint1');
