
<!DOCTYPE html>
<html>
<head>
	<title>Bet Small,Win Big</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href={{asset('bootstrap/css/bootstrap.min.css')}} rel="stylesheet">
	<script src={{asset('bootstrap/jquery/jquery-3.5.1.min.js')}}></script>
<style type="text/css">
 .selected {
    background-color: lawngreen; /* Change the background color to the desired selected color */
    color: white; /* Change the text color to the desired selected color */
  }
	
	#slip{
		display: none;

	}
	@media (min-width:500px){
		#slip{
			display: block;
		}
	}
	.betslip{
		display:none;
			/*background-color: red;*/

	}
	@media (max-width:500px){
		.betslip{
			display: block;
		}
	}
	/*#first:hover{
		background-color: lawngreen;
	}*/
	
</style>
</head>
<body>
	<!-- sports modal -->
	<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <select class="form-control">
							          <option>Football</option>
							          <option>Baskeball</option>
						            </select>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							      		<div class="column">
							<a href="{{url('/')}}" class="text-dark">HOME</a>
							<hr>
							<a href="{{url('live')}}" class="text-dark">LIVE NOW</a>
							<hr>
							<a href="{{url('upcoming')}}" class="text-dark">UPCOMING</a>
							<hr>
							<a href="{{url('virtual')}}" class="text-dark">VIRTUAL SPORTS</a>
							<hr>
							<a href="{{url('jackpot')}}" class="text-dark">JACKPOT</a>
							<hr>
							<a href="{{url('popular')}}" class="text-dark">POPULAR</a>
							<hr>
							<h4 class="font-weight-bold mx-auto">TOURNAMENTS</h4>
						</div>
							      	</div>
                            </div>
                        </div>
                    </div>
                    <!-- menu modal -->
                    <div class="modal fade" id="menu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog modal-fullscreen" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							       <!-- header data -->
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							      		<div class="column">
							<a href="{{url('messages')}}" class="text-dark">MESSAGES</a>
							<hr>
							@if(session('user'))
							@foreach(session('user') as $value)
							<a href="{{url('bets/active/'.$value->id)}}" class="text-dark">MY BETS</a>
							@endforeach
							@endif
							<hr>
							<a href="{{url('deposit')}}" class="text-dark">DEPOSIT</a>
							<hr>
							<a href="{{url('withdraw/')}}" class="text-dark">WITHDRAW</a>
							<hr>
							<a href="{{url('statement')}}" class="text-dark">STATEMENT</a>
							<hr>
							<a href="{{url('changepin/user/id')}}" class="text-dark">CHANGE PIN</a>
							<hr>
							<a href="{{url('help')}}" class="text-dark">HELP</a>
							<hr>
							<a href="{{url('playstore/app/id/223332')}}" class="text-dark">DOWNLOAD APP</a>
							<hr>
							
							<a href="{{url('news')}}" class="text-dark">NEWS</a>
							<hr>
							@if(session('user'))
							<a href="{{url('logout')}}" class="text-dark">LOG OUT</a>
							@endif
							<hr>
						</div>
							      	</div>
                            </div>
                        </div>
                    </div>
                    <!-- end of modals -->
                     <!-- menu modal -->
                    <div class="modal fade" id="bets" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog modal-fullscreen" role="document">
							    <div class="modal-content">
							      <div class="modal-header" style="background-color: black">
							      	<div class="row">
							       <p class="text-white font-weight-bold">BETSLIP</p>
							       <p class="text-white">Balance KSH 16.00</p>
							   </div>
							        <button type="button" class="close" style="color: white" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							      	<div class="row justify-content-around">
							      		<p>Sport {{count((array)session('cart'))}}</p>
							      		<p>Virtual 0</p>
							      	</div>
							      	<div class="row">
							      		<span>Your bet is placed  - good luck. </span><a href="" class="mx-1">  Check out the details here</a>
							      	</div>
							      	<div class="row mb-2 justify-content-between" style="border:.1px solid grey">
							      		<a href="" class="m-3 text-dark font-weight-bold" >Booking code</a>
							      		<a href="" class="btn font-weight-bold m-2 " style="background-color: lawngreen;border-radius: 0%;color: black">CREATE CODE</a>
							      	</div>
							      	<div class="row mb-2"style="border:.1px solid grey">
							      		<a href="" class="m-3 text-dark font-weight-bold" >Share your bet</a>
							      	</div>
							      	<div class="row mb-2"style="border:.1px solid grey">
							      		<a href="" class="m-3 text-dark font-weight-bold" >Re-use selections</a>
							      	</div>
							      	<div class="row mb-2"style="border:.1px solid grey">
							      		<a href="" class="m-3 text-dark font-weight-bold" >Place a new bet</a>
							      	</div>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- end of modals -->
<div class="container-fluid sticky-top"style="border-bottom: .1px solid white;background-color: rgb(0,0,0);">
	<div class="row d-flex justify-content-between mx-2 " >
<!-- <div class="col-md-12 d-flex "> -->

		<div class="row ">
		<a href="#" class="text-white  mb-2 mt-3 font-weight-bold" data-toggle="modal" data-target="#Modal" style="font-size: 11px">SPORT</a>
		<!-- modal -->
		
		<a href="{{url('virtual')}}" class="text-white mb-3 mt-3 m-2 font-weight-bold" style="font-size: 11px">VIRTUAL</a>
		<a href="{{url('jackpot')}}" class="text-white mb-3 mt-3 m-2 font-weight-bold" style="font-size: 11px">JACKPOT</a>
	
		<!-- <div class="col-md-5"></div> -->
	</div>
		<div class="row">
		<p onclick="search()" class="text-white mb-3 mt-3 font-weight-bold" style="cursor: pointer;float: right;font-size: 11px">SEARCH</p>
		<a href="" class="text-white mb-3 mt-3 m-2 font-weight-bold" data-toggle="modal" data-target="#menu" style="font-size: 11px">MENU</a>
		<!-- <input type="submit" name="" class="btn mt-3 mb-4 mx-1 text-dark font-weight-bold" value="Slip {{0}}" data-toggle="modal" data-target="#myModal">
 -->        
 <!-- <div class="betslip"> -->
 <a href="#passwordReset" data-toggle="modal" style="background-color: white;font-size: 13px"  class="text-dark betslip btn text-white  mt-1 mb-2">Bets {{count((array)session('cart'))}}</a>
     	
 </div>
     <!-- </div> -->
     </div>
</div>
<div class="container col-md-12" id="search" style="display: none;background-color: rgb(0,0,0);">
	<div class="row">
	<input type="search" name="search" placeholder="Team or competition....." class="form-control col-md-9 m-2">
	<input type="submit" name="search" class="btn bg-dark text-white col-md-1 font-weight-bold m-2" style="border:1px solid white" value="SEARCH">
</div>
</div>
<div class="container col-md-12">
	<div class="row">
	<div class="col-md-8" style="border-right: .1px solid gray;">
	<div class="row justify-content-between" style="background-color: rgb(0,0,0);">
		<div class="column" id="Col">
<h2><a href="{{url('/')}}" style="text-decoration: none;"><i><span class="font-weight-bold text-white mx-2">bet</span><span class="font-weight-bold" style="color:lawngreen;margin-left: -10px">Pawa</span></i></a></h2>
<a href="{{url('deposit')}}" class="text-white mx-2" style="text-decoration: underline;"><i>M-PESA Pay Bill:290020</i></a>
</div>
<!-- <div class="account"> -->
	<!-- <div class="row"> -->
	<a href="{{url('deposit')}}" class="row mx-auto" style="text-decoration: none;"><a href="{{url('deposit')}}" style="font-size: 13px;margin-right: 5px" class="text-white mt-3 ">
		@if(session('user'))
			@foreach(session('user') as $id)
			KSH {{$id['account']}}
			@endforeach
			@endif</a>
	<a href="{{url('deposit')}}" name="deposit" class="btn btn-success mt-2 mb-5" style="color:black;font-weight: bold;background-color: lawngreen;font-size: 12px">DEPOSIT</a></a>
<!-- </div> -->
</div>
<!-- </div> -->
@if(session()->has('success'))
            <p class="" style="color: black;font-weight: bold">{{session()->get('success')}}</p>
                @endif
<div class="container my-2">
	<div class="card">
		<div class="card-body">
			<a href="{{url('news/id')}}">News here
			</a>
		</div>
	</div>
</div>
<!-- <div class="container" > -->
	<div class="row" style="border-bottom: .1px solid gray;border-top: .1px solid gray">
<div class="col-md-12 d-flex justify-content-around mt-3 mb-3">
	<a href="{{url('virtual')}}" class="text-dark" style="border-right: 1px solid black;padding: 5px">VIRTUAL</a>
<!-- </div> -->
<!-- <div class="col-md-3"> -->
	<a href="{{url('jackpot')}}" class="text-dark" style="border-right: 1px solid black;padding: 5px">JACKPOT</a>
<!-- </div> -->
<!-- <div class="col-md-3"> -->
	<a href="{{url('upcoming')}}" class="text-dark" style="border-right: 1px solid black;padding: 5px">UPCOMING</a>
<!-- </div> -->
<!-- <div class="col-md-3"> -->
	<a href="{{url('popular')}}" class="text-dark" style="border-right: 1px solid black;padding: 5px" >POPULARL</a>
</div>
</div>
<!-- </div> -->
<div class="row" style="border-bottom: .1px solid gray;">
	<div class="col-md-12">
		<h4 class="font-weight-bold text-center mt-2 mb-2">FOOTBALL</h4>
	</div>
</div>
<!--  -->
<!--  -->
<?php 
     	// $json = \File::get(public_path() . "/football.json");
$j = '{"name":"dan","age":23,"gender":"male"}';
$r = json_decode($j,true);
$ga = [
    
            "start_time" => "14:30 pm Sat 17/04",
            "game_id"=> 1000,
            "team_1"=> "Tottenham",
            "team_2"=> "Chelsea",
            "one_odds"=> 2.34,
            "two_odds"=> 3.80,
            "draw_odds"=> 3.54,
            "football_league"=> "England/English-premear league",

    
];
var_dump($ga);
     	$json = file_get_contents(public_path() ."/football.json");
     	// $json = json_decode(Storage::get('public/football.json'),true);
     	$data = json_decode($json,true);
     	// var_dump($data);
     	// foreach ($data as $key =>$value) {
     	// var_dump($data);
     	
     	print_r($r);
     	// echo $r['name'];

     	
?>
<p><?php ?></p>
<?php
// }
?>
@foreach($games as $game)
<!-- <div class="container"> -->
	<div class="row mx-1">
		<p><?php date_default_timezone_set('Africa/Nairobi');

		
        $date_added=strtotime("current");
        $date_added = date('H:i a');
        $date = date('D d/m');
echo $date_added."  "."<a class='font-weight-bold'>" .$date."</a>";
        ?></p>
        
    </div>
    <div class="row" style="margin-top: -15px">
    <div class="column col-md-12">
    	<a href="{{url('event/id/'.$game['game_id'])}}" style="text-decoration: none;" class="text-dark font-weight-bold">
    	<h5 class="font-weight-bold">{{$game['team_1']}}</h5>
    	<h5 class="font-weight-bold" style="margin-top: -5px">{{$game->team_2}}</h5>
    </a>
</div>
</div>
<div class="row mx-1"style="margin-top: -5px">
	<p>Football {{$game['football_league']}}</p>
</div>
<div class="row" style="border-bottom: .1px solid gray;margin-top: -10px">
	<!-- <div class="col-md-3"> -->
		<!-- <div class="col-md-12 "> -->
			<form action="{{url('add/'.$game->id)}}" class="mb-2" id="gamesForm" method="get">
				@csrf
	<!-- <a href="{{url('add/'.$game->id)}}"> -->
		<input type="submit" name="one" value="1         <?php echo $game['one_odds'];?>" id="first" onclick="Change()" class="box   font-weight-bold" style="margin-left: 20px">
	<!-- </a> -->
<!-- </div> -->
<!-- <div class="col-md-3"> -->
	<input type="submit" name="draw" value="X        <?php echo $game->draw_odds;?>" id="second" onclick="color()" class="box  font-weight-bold">
<!-- </div> -->
<!-- <div class="col-md-3"> -->
	<input type="submit" name="two" value="2         <?php echo $game->two_odds;?>" id="third" onclick="change()"class="box font-weight-bold">
<!-- <div class="col-md-2"> -->
	<input type="submit" name="more" value="+20" class="box  font-weight-bold" style="background-color:white;border:solid .5px grey">
</form>
<!-- </div> -->
</div>
<!-- </div> -->
@endforeach
</div>
<div class="col-md-4 slip" id="slip">
		@if(!session('user'))
<div class="row">
		<p class="mx-2">Not loggedin - <a class="text-dark" style="text-decoration: underline;" href="{{url('register')}}">Join Now</a><span> or </span><a class="text-dark" style="text-decoration: underline;" href="{{url('login')}}">Log in</a></p>
	</div>
	@endif
	<div class="row" style="border-bottom: 0.1px solid gray">
		<div class="column">
			<h5>Your Balance</h5>
			@if(session('user'))
			@foreach(session('user') as $id)
			<h4>KSH {{$id['account']}}</h4>
			@endforeach
			@endif
		</div>
	</div>
	<div class="row d-flex justify-content-around mt-2">
		<!-- <div class="col-md-6"> -->
			<h4 class="text-center font-weight-bold">Sport {{count((array)session('cart'))}}</h4>
		<!-- </div> -->
		<!-- <div class="col-md-6" style=""> -->
			<h4 class="text-center font-weight-bold">Virtual</h4>
		<!-- </div> -->
	</div>
	<?php if (count((array)session('cart'))<=0){
		?>
	 <div id="slip">
	<div class="row mx-auto">
		<div class="col-md-12">
		<form>
			<label>Booking Code :</label>
			<div class="row">
			<input type="text" name="code" class="col-md-8 form-control">
			<input type="submit" name="load" class="col-md-3 btn bg-dark text-white font-weight-bold mx-1" value="Load">
		</div>
		</form>
	</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		<h5 class="text-center p-2">Betslip is empty</h5>
	</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<a href=faqs class="btn bg-dark font-weight-bold text-white form-control">LEARN HOW TO PLACE BET</a>
	</div>
</div>
</div>
<?php
}else{
?>
<div class="col-md-4" id="checkout" style="display: none">
	<div>
	<div class="row">
							       <p class="text-white font-weight-bold">BETSLIP</p>
							       <p class="text-white">Balance KSH 16.00</p>
							   </div>
							        <button type="button" class="close" style="color: white" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							      	<div class="row justify-content-around">
							      		<p>Sport {{count((array)session('cart'))}}</p>
							      		<p>Virtual 0</p>
							      	</div>
							      	<div class="row">
							      		<span>Your bet is placed  - good luck. </span><a href="" class="mx-1">  Check out the details here</a>
							      	</div>
							      	<div class="row mb-2 justify-content-between" style="border:.1px solid grey">
							      		<a href="" class="m-3 text-dark font-weight-bold" >Booking code</a>
							      		<a href="" class="btn font-weight-bold m-2 " style="background-color: lawngreen;border-radius: 0%;color: black">CREATE CODE</a>
							      	</div>
							      	<div class="row mb-2"style="border:.1px solid grey">
							      		<a href="" class="m-3 text-dark font-weight-bold" >Share your bet</a>
							      	</div>
							      	<div class="row mb-2"style="border:.1px solid grey">
							      		<a href="" class="m-3 text-dark font-weight-bold" >Re-use selections</a>
							      	</div>
							      	<div class="row mb-2"style="border:.1px solid grey">
							      		<a href="" class="m-3 text-dark font-weight-bold" >Place a new bet</a>
							      	</div>
                            </div>
                        </div>
	<div id="desktop" style="display:block;">
	<div class="row justify-content-between" style="border-bottom: .1px solid grey;border-top: .1px solid grey">
	
	<div class="mx-2 mb-2 mt-2">
	<a href="{{}}" class="" style="text-decoration:underline;color:black">Booking code</a>
	</div>
	<div class="mx-2 mb-2 mt-2">
		<a href=delete class=""style="text-decoration:underline;color:black">Clear Betslip</a>
	</div>
		</div>
		<!-- </div> -->
<?php
 $total = 1;
 // $totalAmount = 0;
 $amount = "10";
 $amount = $amount;

 
			if(session('cart')){
			foreach(session('cart') as $id =>$details){
			// foreach(session('option') as $id =>$detail){

			 $total *=$details['odds'];
            // $amount=$_POST['amount'];
			 $totalAmount = $total * (int)$amount;
			 $tax = (20*$totalAmount)/100;
			 $finalpay = $totalAmount - $tax;
			 ?>
		<div class="row"style="border-bottom: .1px solid grey;">
		<div class="col-md-1 " style="background-color:">

		<form action=remove method='POST'>
		@if(session('user'))
		@foreach(session('user') as $d)
		<form method="post" action="{{url('bet/'.$d->id)}}">
			@endforeach
			@endif
		 @csrf 
		<input type="hidden" class="col-md-6" name="id" value="<?php echo $id;?>">
	    <button type="submit" class="btn btn-danger mt-2 mb-2">X</button>
	     </form>
	     </div>

		@csrf
	<div class="col-md-11" >
		<div class="column">

	<!-- <input type="text" name="team_1" class="col-md-3" style="border:none" value="<?php echo $details['team_1'];?>" readonly> -->
	<a  class="" name="team_1"><?php echo $details['team_1'];?></a>
		<a  class=""> </a>
		<a  class="">-</a>
		<a  class=""> </a>
	<a  class="" name="team_2"><?php echo $details['team_2'];?></a>
		</div>
		<div class="col-md-12 ">
		<div class="row justify-content-between">
	<!-- <input type="text" name="team_2" class="col-md-3" style="border:none" value="'.$details['team_2'].'" readonly> -->
	<a  class="" name="pick">1X2 - FT (<?php echo $details['pick'];?>)</a>
	<!-- <input type="text" name="pick" class="col-md-1" style="border:none" value="'.$details['pick'].'" readonly> -->
	<a  class="" name="odds"><?php echo $details['odds'];?></a>
	<!-- <input type="text" name="odds" class="col-md-2" style="border:none" value="'.$details['odds'].'" readonly> -->
		</div>
		</div>
		</div>
		</div>
<?php 
}}
?>
           <div class="container-fluid">
           <div class="row">
           <input type="checkbox" class="">
           <a class="col-md-10">Accept odds change - Learn more</a>
       </div>
           <div class="row mt-3">
           <p class="font-weight-bold">Stake</p>
           </div>
           <div class="col-md-12">
		           <form action="" method="POST">
           <input type="number" id="num" name="amount" onkeyup="Update()" class="form-control" placeholder="Amount">
           @if ($errors->has('amount'))
        <span class="text-danger">{{$errors->first('amount')}}</span><br>
        @endif
		           </form>
	           <div id="re"></div>
           </div>
           <div class="row">
           <p>Min Stake 1</p>
           </div>
           
           <div class="row justify-content-between">
           <a class=" font-weight-bold">Odds:</a>
           <input type="text" name="total" class="col-md-4" style="border:none" id="total" value="<?php echo round(($total),2);?>">
           </div>
           <div class="row justify-content-between">
           <a class=" font-weight-bold">Tax:</a>
           <input type="text" name="tax" class="col-md-4" style="border:none" id="tax" value="-Ksh ">
           </div>
           <div class="row justify-content-between">
           <a class="font-weight-bold">Total PayOut:</a>
           <input type="text" name="totalAmount" class="col-md-4" style="border:none" id="totalAmount" value="Ksh ">
           </div>
           <div class="row justify-content-between">
           <a class="font-weight-bold">Final pay:</a>
           <input type="text" name="finalpay" class="col-md-4" style="border:none" id="finalpay" value="Ksh ">
           </div>
<!-- </div> -->
<div class="row">
	<div class="col-md-12">
		<?php
		if(session('user')){
			foreach(session('user') as $d){
		?>
	<a href={{url('bet/'.$d->id)}}><input type="submit" name="placeBet" style="background-color: lawngreen;color: black" class="btn font-weight-bold form-control" value="PLACE BET"></a>
	<?php 
}}else{
?>
			<a href={{url('bet')}}><input type="submit" name="placeBet" style="background-color: lawngreen;color: black" class="btn font-weight-bold form-control" value="PLACE BET"></a>
		<?php }?>
     </form>
	</div>
</div>
<?php
}
?>
</div>
</div>
</div>
</div>
<!--  -->
<div class="modal fade" id="passwordReset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    	<!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" style="font-size: 15px">BetSlip</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
<div class="container">
	<div class="row">
		<p class="mx-2">Not loggedin - <a class="text-dark" style="text-decoration: underline;" href="{{url('register')}}">Join Now</a><span> or </span><a class="text-dark" style="text-decoration: underline;" href="{{url('login')}}">Log in</a></p>
	</div>
	<div class="row" style="border-bottom: 0.1px solid gray">
		<div class="column">
			<h5>Your Balance</h5>
			@if(session('user'))
			@foreach(session('user') as $id)
			<h4>KSH {{$id['account']}}</h4>
			@endforeach
			@endif
		</div>
	</div>
	<div class="row d-flex justify-content-around mt-2">
		<!-- <div class="col-md-6"> -->
			<h4 class="text-center font-weight-bold">Sport {{count((array)session('cart'))}}</h4>
		<!-- </div> -->
		<!-- <div class="col-md-6" style=""> -->
			<h4 class="text-center font-weight-bold">Virtual</h4>
		<!-- </div> -->
	</div>
	<!-- </div> -->
	<?php if (count((array)session('cart'))<=0){?>
	<div id="slip">
	<div class="row mx-auto">
		<div class="col-md-12">
		<form>
			<label>Booking Code :</label>
			<div class="row">
			<input type="text" name="code" class="col-md-8 form-control">
			<input type="submit" name="load" class="col-md-3 btn bg-dark text-white font-weight-bold mx-1" value="Load">
		</div>
		</form>
	</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		<h5 class="text-center p-2">Betslip is empty</h5>
	</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<a href=faqs class="btn bg-dark font-weight-bold text-white form-control">LEARN HOW TO PLACE BET</a>
	</div>
</div>
</div>
<?php
}else{
?>
	<div class="row justify-content-between" style="border-bottom: .1px solid grey;border-top: .1px solid grey">
	
	<div class="mx-2 mb-2 mt-2">
	<a href="{{}}" class="" style="text-decoration:underline;color:black">Booking code</a>
	</div>
	<div class="mx-2 mb-2 mt-2">
		<a href=delete class=""style="text-decoration:underline;color:black">Clear Betslip</a>
	</div>
		</div>
		<!-- </div> -->
<?php
 $total = 1;
 // $totalAmount = 0;
 $amount = "10";

 
			if(session('cart')){
			foreach(session('cart') as $id =>$details){
			// foreach(session('option') as $id =>$detail){

			 $total *=$details['odds'];
            // $amount=$_POST['amount'];
			 $totalAmount = $total * (int)$amount;
			 $tax = (20*$totalAmount)/100;
			 $finalpay = $totalAmount - $tax;
			 ?>
		<div class="row"style="border-bottom: .1px solid grey;">
		<div class="col-md-1 " style="background-color:">

		<form action=remove method='POST'>
		
		<form method="post" action="{{url('bet')}}">
		 @csrf 
		<input type="hidden" class="col-md-6" name="id" value="<?php echo $id;?>">
	    <button type="submit" class="btn btn-danger mt-2 mb-2">X</button>
	     </form>
	     </div>

		@csrf
	<div class="col-md-11" >
		<div class="column">

	<!-- <input type="text" name="team_1" class="col-md-3" style="border:none" value="<?php echo $details['team_1'];?>" readonly> -->
	<a  class="" name="team_1"><?php echo $details['team_1'];?></a>
		<a  class=""> </a>
		<a  class="">-</a>
		<a  class=""> </a>
	<a  class="" name="team_2"><?php echo $details['team_2'];?></a>
		</div>
		<div class="col-md-12 ">
		<div class="row justify-content-between">
	<!-- <input type="text" name="team_2" class="col-md-3" style="border:none" value="'.$details['team_2'].'" readonly> -->
	<a  class="" name="pick">1X2 - FT (<?php echo $details['pick'];?>)</a>
	<!-- <input type="text" name="pick" class="col-md-1" style="border:none" value="'.$details['pick'].'" readonly> -->
	<a  class="" name="odds"><?php echo $details['odds'];?></a>
	<!-- <input type="text" name="odds" class="col-md-2" style="border:none" value="'.$details['odds'].'" readonly> -->
		</div>
		</div>
		</div>
		</div>
		<?php

}}
?>
   <div class="container-fluid">
           <div class="row">
           <input type="checkbox" class="">
           <p class="mt-3 mx-2">Accept odds change - Learn more</p>
       </div>
           <div class="row mt-3">
           <p class="font-weight-bold">Stake</p>
           </div>
           <div class="row mx-auto">
		           <form action="">
           <input type="text" id="num" name="amount" onkeyup="Update()" class="form-control col-md-11" placeholder="Amount">
		           </form>
           </div>
           <div class="row">
           <p>Min Stake 1</p>
           </div>
           <div class="row justify-content-between">
           <a class=" font-weight-bold">Odds:</a>
           <input type="text" name="total" class="" style="border:none" value="<?php echo round(($total),2);?>">
           </div>
      
           <div class="row justify-content-between">
           <a class=" font-weight-bold">Tax:</a>
           <input type="text" name="tax" class="" style="border:none" value="-Ksh <?php echo round(($tax),2);?>">
           </div>
           <div class="row justify-content-between">
           <a class="font-weight-bold">Total PayOut:</a>
           <input type="text" name="totalAmount" class="" style="border:none" value="Ksh <?php echo round(($totalAmount),2);?>">
           </div>
           <div class="row justify-content-between">
           <a class="font-weight-bold">Final pay:</a>
           <input type="text" name="finalpay" class="" style="border:none" value="Ksh <?php echo round(($finalpay),2);?>">
           </div>
<!-- </div> -->
<div class="row">
	<div class="col-md-12">
	<a href=bet data-toggle="modal" data-target="#bets" ><input type="submit" name="placeBet" style="background-color: lawngreen;color: black" class="btn font-weight-bold form-control" value="PLACE BET"></a>
     </form>
	</div>
</div>
	<?php
}
?>
    </div>
   </div>
  </div>
</div>
<div class="container-fluid">
<div class="row justify-content-around" style="border-top: .1px solid black">
		<h5>
		<a href="{{url('bets/active')}}" name="submit" class="btn m-1" style="background-color: black;color: white;border-radius: 0%;">MY BETS</a>
	</h5>
</div>
<div class="row justify-content-around" style="background-color: black">
	<h5 style="text-align: center;">
		<a href="" class="text-white" style="font-size: 17x">Football</a>
		<a href="" class="text-white" style="font-size: 17x">Basketball</a>
	</h5>
	</div>
	<div class="row justify-content-around" style="background-color: black">
	<h5 style="text-align: center;">
		<a href="" class="text-white" style="font-size: 17x">facebook</a>
		<a href="" class="text-white" style="font-size: 17x">Twitter</a>
		<a href="" class="text-white" style="font-size: 17x">Instagram</a>
	</h5>
	</div>
	<div class="row justify-content-around" style="background-color: black">
	<h5 style="text-align: center;">
		<a href="" class="text-white" style="font-size: 17x">My bets</a>
		<a href="" class="text-white" style="font-size: 17x">Statements</a>
		<a href="" class="text-white" style="font-size: 17x">Deposit</a>
		<a href="" class="text-white" style="font-size: 17x">Withdraw</a>
		<a href="" class="text-white" style="font-size: 17x">Log out</a>
	</h5>
	</div>
	<div class="row justify-content-around" style="background-color: black">
	<h5 style="text-align: center;">
		<a href="" class="text-white" style="font-size: 17x">Home</a>
		<a href="" class="text-white" style="font-size: 17x">About</a>
		<a href="" class="text-white" style="font-size: 17x">Terms</a>
		<a href="" class="text-white" style="font-size: 17x">help</a>
		<a href="" class="text-white" style="font-size: 17x">News</a>
	</h5>
	</div>
	<div class="row justify-content-around" style="background-color: black">
	<h5 style="text-align: center;">
		<p style="color: gray">Developed by Dan Ndong &copy <?php echo date('Y');?></p>
	</h5>
	</div>
</div>
</body>
<script type="text/javascript">
$(document).ready(function(){
	$('#gamesForm').on('click',function() {
		// e.preventDefault();
		document.getElementById("first").style.backgroundColor="lawngreen";
  });
});
	// function color(){
	// 	document.getElementById("second").style.backgroundColor="lawngreen";
	// 	document.getElementById("third").style.backgroundColor = '';
	// 	document.getElementById("first").style.backgroundColor = '';
	// }
	// function Change(){
	// 	document.getElementById("first").style.backgroundColor = 'lawngreen';
	// 	document.getElementById("second").style.backgroundColor = '';
	// 	document.getElementById("third").style.backgroundColor = '';
	// }
	// function change(){
	// 	document.getElementById("third").style.backgroundColor = 'lawngreen';
	// 	document.getElementById("second").style.backgroundColor = '';
	// 	document.getElementById("first").style.backgroundColor = '';
	// }

	$(document).ready(function(){
		$("#num").on("input",function(){
			// var new = parseFloat($('$amount').val()) || 0;
			// alert('value changed');
			// var odds = $('#total').val();
			$('#tax').val("-Ksh " + (($('#total').val() * ($('#num').val())) * 20) /100);
			$('#totalAmount').val("Ksh " + $('#total').val() * ($('#num').val()));
			$('#finalpay').val("Ksh " + (($('#total').val() * ($('#num').val())) - ((($('#total').val() * ($('#num').val())) * 20) /100)));
			
			


			// $('#tax').val("-Ksh " + (($('#total').val() * ($('#num').val())) * 20) /100).toFixed(2);
			// $('#totalAmount').val("Ksh " + $('#total').val() * ($('#num').val())).toFixed(2);
			// $('#finalpay').val("Ksh " + (($('#total').val() * ($('#num').val())) - ((($('#total').val() * ($('#num').val())) * 20) /100))).toFixed(2);
			
			// $('#finalpay').val("Ksh " + $('#total').val() * ($('#num').val()));
			// $('#re').text($(this).val());
		});
	});
	function search(){
		document.getElementById("search").style.display='block';
	}
	document.getElementById("num").addEventListener("input",multiPly);
	function multiPly(){
		document.getElementById("change").innerHTML = "20";
	}
	
// function update(){
// 	let text = document.getElementById("num").value;
// 	document.getElementById("re").innerText = text;
// }
num.oninput = changeSpan;
function changeSpan(){
	re.innerText = num.value;
}
function Check(){
	document.getElementById("desktop").style.display = 'none';
	document.getElementById("checkout").style.display = 'block';

}
	
</script>
<script src={{asset('bootstrap/js/bootstrap.min.js')}}></script>
<script src={{asset('bootstrap/popper/popper.min.js')}}></script> 
<script src={{asset('bootstrap/js/bootstrap.js')}}></script>
</html>