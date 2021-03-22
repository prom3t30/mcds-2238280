<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Carbon\Carbon;

// use Illuminate\Support\Facades\Auth;

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



Route::get('allusers', function () {
    $users = App\Models\User::take(5)->get();
    dd($users);
});

Route::get('showuser/{id}', function (Request $request) {
    $id = $request->id;
    $user = App\Models\User::find($id);
    return view('showuser')->with('user', $user);
});

Route::get('challengue', function () {
    foreach(App\Models\User::all()->take(10) as $user){
        $years = Carbon::createFromDate($user->birthdate)->diff()->format('%y years old');
        $since = Carbon::parse($user->created_at);
        $results[] = $user->fullname . " - " . $years . " - created ". $since->diffForHumans() . "<br>";
    }
    dd($results);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/viewusers', function () {
        $users = App\Models\User::all();
        return view('viewusers')->with('users', $users);
});

Route::get('examples', function () {
    return view('examples');
});


Route::get('locale/{locale}', [App\Http\Controllers\LocaleController::class, 'index']);
