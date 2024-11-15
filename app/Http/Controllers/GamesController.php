<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Game;
use App\Models\User;
use App\Models\Bet;
use App\Models\Betslip;


// use Illuminate\Support\Facades\App;



class GamesController extends Controller
{
	//
	public function index()
	{

		return view('index');
	}

	public function show()
	{
		$json = json_decode(file_get_contents(public_path() . "/football.json"), true);
		// $json = json_decode(Storage::get('public/football.json'),true);
		// dd($json);
		$games = Game::all();
		return view('index', compact('games'));
	}

	public function cart()
	{
		return view('cart');
	}
	public function register(Request $request)
	{
		$request->validate(
			[
				'phone_number' => 'required|unique:users,phone_number',
				'password' => 'required'

			],
			[
				'phone_number.required' => 'Mobile number is required',
				'password.required' => 'Password is required'
			]
		);
		$user = new User;
		$user->phone_number = $request->phone_number;
		$user->account = 0;
		$user->password = $request->password;

		$user->save();
		return redirect("login")->with('message', 'User added successfully.');
	}
	public function login(Request $request)
	{
		return view("login");
	}
	public function login_process(Request $request)
	{
		$user = session()->get('user', []);
		$request->validate([
			'phone_number' => "required",
			'password' => "required",
		]);
		// $users = User::all();

		// $users->phone_number = $request->phone_number;
		// $users->password = $request->password;
		// return User::where('password','=',$request->password)->get();
		$user = User::where('phone_number', $request->phone_number)->get();

		foreach ($user as $key) {
			if ($key['password'] == $request->password) {
				session()->put('user', $user);
				return redirect('/');
			} elseif ($key['phone_number'] != $request->phone_number && $key['password'] != $request->password) {
				return redirect("login")->with("error", "This number is not registered");
			} elseif ($key['password'] != $request->password) {
				return redirect("login")->with("error", "Your password is incorrect");
			}
		}
		// if ($user[0]['password'] == $request->password){

		// 	return redirect("/");
		// }
		// elseif ($user[0]['password'] != $request->password) {
		// 	 return redirect("login")->with("error","Your passord is incorrect");
		// }
		// // elseif ($user[0]['phone_number'] == $request->phone_number) {
		// // 	return redirect("login")->with("error","This number is not registered");
		// // }
		// else{
		// 	return redirect("login")->with("error","Please provide valid credentials");
		// }



	}
	public function logout()
	{
		session()->forget('user');
		return redirect("login");
	}

	public function addToCart(Request $request, $id)
	{
		$games = Game::findOrFail($id);
		$cart = session()->get('cart', []);
		$odds = $_GET['odds'];
		$pick = $_GET['choice'];

		if (!$cart) {
			$cart = [
				$id => [
					"team_1" => $games->team_1,
					"team_2" => $games->team_2,
					"league" => $games->football_league,
					"pick" => $pick,
					"odds" => $odds
				]
			];
			session()->put('cart', $cart);
			return response()->json(['cart_count' => count($cart),'message'=>'success']);
		} // Check if the game is already in the cart
		elseif (isset($cart[$id])) {
			// If the pick is the same as the one already in the cart, remove the item
			if ($cart[$id]['pick'] == $pick) {
				unset($cart[$id]);
				session()->put('cart', $cart);
				return response()->json(['cart_count' => count($cart),'message'=>'success']);
			} else {
				// If the item already exists, update the existing item in the cart
				$cart[$id]['pick'] = $pick;
				$cart[$id]['odds'] = $odds;
				session()->put('cart', $cart);
				return response()->json(['cart_count' => count($cart),'message'=>'success']);
			}
		} else {
			$cart[$id] = [
				"team_1" => $games->team_1,
				"team_2" => $games->team_2,
				"league" => $games->football_league,
				"pick" => $pick,
				"odds" => $odds,
				"quantity" => 1,
			];
			session()->put('cart', $cart);
			return response()->json(['cart_count' => count($cart),'message'=>'success']);
		}
	}
	public function addToCarts(Request $request, $id)
	{
		$games = Game::findOrFail($id);
		$cart = session()->get('cart', []);
		// $option = session()->get('option',[]);
		// $quantity=0;
		$games->one = $request->one;
		$games->draw = $request->draw;
		$games->two = $request->two;



		//if cart is empty then this is the first game in the list 
		if (!$cart && $games->one) {
			$cart = [
				$id => [
					"team_1" => $games->team_1,
					"team_2" => $games->team_2,
					"league" => $games->football_league,
					"pick" => 1,
					"odds" => $games->one_odds
				]
			];
			// 		$option =[
			// 			$id =>[
			// "pick" => $games->one[0],
			// 			// "odds" => $games->one[1]
			// 			]

			// 		];
			session()->put('cart', $cart);
			// session()->put('option',$option);

			return redirect()->back()->with('success', 'game added succesfully');
		} elseif (!$cart && $games->draw) {
			$cart = [
				$id => [
					"team_1" => $games->team_1,
					"team_2" => $games->team_2,
					"league" => $games->football_league,
					"pick" => 'X',
					"odds" => $games->draw_odds
				]
			];
			// 		$option =[
			// 			$id =>[
			// "pick" => $games->one[0],
			// 			// "odds" => $games->one[1]
			// 			]

			// 		];
			session()->put('cart', $cart);
			// session()->put('option',$option);

			return redirect()->back()->with('success', 'game added succesfully');
		} elseif (!$cart && $games->two) {
			$cart = [
				$id => [
					"team_1" => $games->team_1,
					"team_2" => $games->team_2,
					"league" => $games->football_league,
					"pick" => 2,
					"odds" => $games->two_odds
				]
			];
			// 		$option =[
			// 			$id =>[
			// "pick" => $games->one[0],
			// 			// "odds" => $games->one[1]
			// 			]

			// 		];
			session()->put('cart', $cart);
			// session()->put('option',$option);

			return redirect()->back()->with('success', 'game added succesfully');
		}



		//removed the code 5/18/2023
		//if cart not empty then check if this product exist then increment quantity
		// if (isset($cart[$id])) {
		// 	// $cart =[
		// 	// 	$id => [
		// 	// 		"team_1" => $games->team_1,
		// 	// 		"team_2" => $games->team_2,
		// 	// 		"league" => $games->football_league,
		// 	// 		"pick" =>1,
		// 	// 		"odds" => $games->one_odds
		// 	// 	]
		// 	// ];
		// 	// $cart[$id]['quantity']++;
		// 	session()->put('cart',$cart);
		// 	return redirect()->back()->with('success','game added to cart succesfully');
		// }
		//end of the removed code
		if ($games->one) {


			//if item does not exist in the cart add to cart with quantity  1
			// if (isset($cart[$id])) {
			$cart[$id] = [
				"team_1" => $games->team_1,
				"team_2" => $games->team_2,
				"league" => $games->football_league,
				"pick" => 1,
				"odds" => $games->one_odds,
				"quantity" => 1,
			];
			session()->put('cart', $cart);
			return redirect()->back()->with('success', 'game added succesfully');
		} elseif ($games->two) {


			//if item does not exist in the cart add to cart with quantity  1
			// if (isset($cart[$id])) {
			$cart[$id] = [
				"team_1" => $games->team_1,
				"team_2" => $games->team_2,
				"league" => $games->football_league,
				"pick" => 2,
				"odds" => $games->two_odds,
				"quantity" => 1,
			];
			session()->put('cart', $cart);
			return redirect()->back()->with('success', 'game added succesfully');
		} elseif ($games->draw) {


			//if item does not exist in the cart add to cart with quantity  1
			// if (isset($cart[$id])) {
			$cart[$id] = [
				"team_1" => $games->team_1,
				"team_2" => $games->team_2,
				"league" => $games->football_league,
				"pick" => 'X',
				"odds" => $games->draw_odds,
				"quantity" => 1,
			];
			session()->put('cart', $cart);
			return redirect()->back()->with('success', 'game added succesfully');
		} else {
			// if (isset($cart[$id])) {
			// $cart =[
			// 	$id => [
			// 		"team_1" => $games->team_1,
			// 		"team_2" => $games->team_2,
			// 		"league" => $games->football_league,
			// 		"pick" =>1,
			// 		"odds" => $games->one_odds
			// 	]
			// ];
			// $cart[$id]['quantity']++;
			session()->put('cart', $cart);
			return redirect()->back()->with('success', 'game added to cart succesfully');
			// }
		}
		// }

	}
	//when not logged in
	public function Bet()
	{
		return redirect('login')->with("error", "Please login first");
	}
	//when logged in
	public function placeBet(Request $request, $id)
	{
		// $request->validate(
		//            [
		//                'amount' => 'required',
		//            ],
		//            [
		//                'amount.required'=>'Amount is required'
		//            ]
		//            );
		echo ($request->amount);
		if (session('user')) {
			if (session('cart')) {
				$total = 1;

				$amount = 10;


				$lastinsertedId = session()->get('lastinsertedId', '');


				$bet_id = 'BT' . (random_int(10000, 99999));
				//
				$users = User::find($id);
				if ($users->account <= 0 || $users->account < $request->amount) {
					$err = "Your account balance is insufficient please deposit to place a bet";
					return redirect('deposit')->with("mssg", $err);
				} else {
					$bets = new Bet;
					$bets->bet_id = $bet_id;
					$bets->total = 0;
					$bets->finalpay = 0;
					$bets->phone_number = $users->phone_number;
					$bets->save();

					$lastinsertedId = $bets['id'];
					session()->put('lastinsertedId', $lastinsertedId);
					$lastinsertedId = session()->get('lastinsertedId', $lastinsertedId);

					foreach (session('cart') as $id => $key) {
						$team_1 = $key['team_1'];
						$team_2 = $key['team_2'];
						$league = $key['league'];
						$pick = $key['pick'];
						$odds = $key['odds'];


						$total *= $key['odds'];
						// $amount=$_POST['amount'];
						$totalAmount = $total * (int)$amount;
						$tax = (20 * $totalAmount) / 100;
						$finalpay = $totalAmount - $tax;

						$betslip = new Betslip;
						$betslip->id = $lastinsertedId;
						$betslip->bet_id = $bet_id;
						$betslip->team_1 = $team_1;
						$betslip->team_2 = $team_2;
						$betslip->league = $league;
						$betslip->pick = $pick;
						$betslip->odds = $odds;
						$betslip->total = $total;
						$betslip->totalAmount = $totalAmount;
						$betslip->tax = $tax;
						$betslip->finalpay = $finalpay;
						$betslip->save();
					}

					$Bets = Bet::find($lastinsertedId);
					$Bets->total = $total;
					$Bets->finalpay = $finalpay;

					$Bets->update();

					$user = User::find($id);
					$user->account -= $amount;
					$user->update();

					$request->session()->flush('success', 'All games removed');
					session()->forget('cart');
					return redirect('/');
				}
			}
		} else {
			return redirect('login')->with("error", "Please login first");
		}
	}

	public function fetchCart(){
		 // Assuming session('cart') holds the cart items
		 $cart = session()->get('cart');
		 $cartCount = count($cart); // Get the cart count
		 $odds = 1;
		 foreach ($cart as $item) {
			if (isset($item['odds'])) {
				$odds *= floatval($item['odds']); // Convert odds to float and multiply
			}
		}
		 return response()->json(['cartCount' => $cartCount,'odds'=>$odds,'cart'=>$cart]); // Return as JSON
	}
	public function delete(Request $request)
	{
		$game_id = $_GET['game_id'];
		
			$cart = session()->get('cart');
			if (isset($cart[$game_id])) {
				unset($cart[$game_id]);
				session()->put('cart', $cart);
			}
			session()->put('cart', $cart);
			// Optionally calculate total price after item removal
            $odds = 0;
            foreach ($cart as $id => $details) {
                $odds *= $details['odds'];
            }
			return response()->json(['cart_count' => count($cart),'message'=>'success','odds'=>$odds]);
	}
	// the previous function
	public function delete_game(Request $request)
	{
		if ($request->id) {
			$cart = session()->get('cart');
			if (isset($cart[$request->id])) {
				unset($cart[$request->id]);
				session()->put('cart', $cart);
			}
			session()->flash('success', 'Product removed');
			return redirect('/');
		}
	}
	public function view(Request $request, $id)
	{
		$bet = User::find($id);
		$bets = DB::select("SELECT * FROM bets WHERE phone_number ='" . $bet->phone_number . "' and status = 'pending' order By id DESC ");
		// $bets = Bet::orderBy('id','DESC')->where('phone_number',$bet->phone_number AND 'status','pending')->get();

		// $bets = session()->get('bets');

		$val = 'active';

		return view('bets', compact('bets'));
	}
	public function settledview()
	{
		$bets = Bet::orderBy('id', 'DESC')->where('status', 'won')->orWhere('status', 'lost')->get();

		return view('bets', compact('bets'));
	}
	public function depositView()
	{
		// $user = User::find(1);
		// $user = DB::select("SELECT * FROM users WHERE id=2");
		return view("deposit");
	}
	public function deposit(Request $request, $id)
	{
		if (session('user')) {

			$request->validate(
				[
					"account" => "required"
				],
				[
					"account.required" => "The amount field should be filled"
				]
			);

			$Account = User::find($id);
			$Account->account += $request->account;
			$Account->update();
			return redirect("/")->with("success", "Your account was credited " . $request->account);
		} else {
			return redirect("login")->with('error', "Please login first");
		}
	}
	public function deposit_account(Request $request)
	{
		$request->validate(
			[
				"account" => "required"
			],
			[
				"account.required" => "The amount field should be filled"
			]
		);

		return redirect("login")->with('error', "Please login first");
	}
	public function viewbetslip(Request $request, $id)
	{
		// $id = $bet_id;
		// $betslip = Betslip::find($id);
		$betslips = DB::select("SELECT * FROM betslips WHERE id='" . $id . "'");


		return view('betslips.view', compact('betslips'));
	}
	public function clearCart(Request $request)
	{
		// $games = Game::clear();
		$request->session()->flush('success', 'All games removed');
		session()->forget('cart');
		return redirect('/');
	}
}
