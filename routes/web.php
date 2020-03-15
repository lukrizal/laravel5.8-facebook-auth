<?php

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

use App\Services\SocialFacebookAccountService;
use Illuminate\Http\Request;

Route::middleware('auth')->get('/', function () {
    return redirect()->route('index');
});

Route::middleware('auth')->get('/home', function () {
    return view('home');
})->name('index');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

Route::get('/facebook/signin', function () {
    return Socialite::driver('facebook')->redirect();
})->name('facebook.auth');

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});

Route::get('/facebook/success', function (SocialFacebookAccountService $service, Request $request) {
    $user = $service->createOrGetUser(Socialite::driver('facebook')->user(), $request);
    auth()->login($user);
    return redirect()->route('index');
})->name('facebook.success');
