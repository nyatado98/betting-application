<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bet;

class BetsController extends Controller
{
    //
    public function placeBet(Request $request){
	$bet_id = 'BT'.(random_int(10000, 99999));
	// $request->$validate([

	// // ])
	$bet =new Game;
	$bet->bet_id = $request->bet_id;
	// $game->team_2 = $request->team_2;
	// $game->pick = $request->pick;
	// $game->odds = $request->odds;
	$bet = save();

	$request->session()->flush('success','All games removed');
    	session()->forget('cart');
	return redirect('/');

}
}
