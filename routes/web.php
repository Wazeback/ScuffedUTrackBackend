<?php
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/login', function () {
    return \Laravel\Socialite\Facades\Socialite::driver('azure')->redirect();
});
Route::get('/callback', function () {
    $azureUser = \Laravel\Socialite\Facades\Socialite::driver('azure')->user();
    $user = User::firstOrCreate(
        ['email' => $azureUser->getEmail()],
        ['name' => $azureUser->getName()]
    );

    if ($user) {
        \Illuminate\Support\Facades\Auth::login($user, false);
    }

    return redirect('https://localhost:3000');
});

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});

//Route::get('/orders', function () {
//
//    })->middleware(['auth:sanctum']);

//Route::resource('/issues', '\App\Http\Controllers\IssueController')->names('issues');
//Route::resource('/sprint', '\App\Http\Controllers\ApiPostController')->names('sprint')->only('sprint1');
