<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\DepositController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/',[GamesController::class,'show']);
Route::get('virtual',function(){
	return view('virtual');
});
//vie jackpot page
Route::get('jackpot',function(){
	return view('jackpot');
});
//view cart page
Route::get('cart',function(){
	return view('cart');
});
//deposit
Route::get('deposit',[GamesController::class,'depositView']);
//register page
Route::get('register',function(){
	return view('register');
});
//login page
Route::get('login',function(){
	return view('login');
});
//
//logout user route
Route::get('logout',[GamesController::class,'logout']);
//register user route
Route::get('register_user',[GamesController::class,'register']);
//login user route
Route::get('login',[GamesController::class,'login']);
//login user route
Route::get('login_process',[GamesController::class,'login_process']);
//betslip route
Route::get('betslip/{id}',[GamesController::class,'viewbetslip']);
//settled bets route
Route::get('bets/settled',[GamesController::class,'settledview'])->name('bets/settled');
//active bets route
Route::get('bets/active/{id}',[GamesController::class,'view'])->name('bets/active/{id}');
//add to cart
Route::get('add/{id}',[GamesController::class,'addToCart']);
//romove game from cart
// Route::get('remove',[GamesController::class,'delete'])->name('remove');
Route::get('/remove',[GamesController::class,'delete']);
//clear the entire cart
Route::get('delete',[GamesController::class,'clearCart'])->name('delete');
// place bet route when logged in
Route::get('bet/{id}',[GamesController::class,'placeBet']);
// place bet route when not logged in
Route::get('bet',[GamesController::class,'Bet']);
// deposit when loggedin
Route::get('credit/{id}',[GamesController::class,'deposit']);
// deposit when not logged in
Route::get('credit_account',[GamesController::class,'deposit_account']);

Route::get('/pay',[DepositController::class, 'stk']);

// fetch cart every .5 secs
Route::get('/cart/count',[GamesController::class, 'fetchCart']);
