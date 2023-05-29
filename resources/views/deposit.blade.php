<!DOCTYPE html>
<html>

<head>
    <title>Deposit here through M-pesa or ussd</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href={{ asset('bootstrap/css/bootstrap.min.css') }} rel="stylesheet">
    <style type="text/css">
        #slip {
            display: none;

        }

        @media (min-width:800px) {
            #slip {
                display: block;
            }
        }

        .betslip {
            display: none;
            /*background-color: red;*/

        }

        @media (max-width:800px) {
            .betslip {
                display: block;
            }
        }
    </style>
</head>

<body>
    <!-- sports modal -->
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                        <a href="{{ url('/') }}" class="text-dark">HOME</a>
                        <hr>
                        <a href="{{ url('live') }}" class="text-dark">LIVE NOW</a>
                        <hr>
                        <a href="{{ url('upcoming') }}" class="text-dark">UPCOMING</a>
                        <hr>
                        <a href="{{ url('virtual') }}" class="text-dark">VIRTUAL SPORTS</a>
                        <hr>
                        <a href="{{ url('jackpot') }}" class="text-dark">JACKPOT</a>
                        <hr>
                        <a href="{{ url('popular') }}" class="text-dark">POPULAR</a>
                        <hr>
                        <h4 class="font-weight-bold mx-auto">TOURNAMENTS</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- menu modal -->
    <div class="modal fade" id="menu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                        <a href="{{ url('messages') }}" class="text-dark">MESSAGES</a>
                        <hr>
                        @if (session('user'))
                            @foreach (session('user') as $value)
                                <a href="{{ url('bets/active/' . $value->id) }}" class="text-dark">MY BETS</a>
                            @endforeach
                        @endif
                        <hr>
                        <a href="{{ url('deposit') }}" class="text-dark">DEPOSIT</a>
                        <hr>
                        <a href="{{ url('withdraw/') }}" class="text-dark">WITHDRAW</a>
                        <hr>
                        <a href="{{ url('statement') }}" class="text-dark">STATEMENT</a>
                        <hr>
                        <a href="{{ url('changepin/user/id') }}" class="text-dark">CHANGE PIN</a>
                        <hr>
                        <a href="{{ url('help') }}" class="text-dark">HELP</a>
                        <hr>
                        <a href="{{ url('playstore/app/id/223332') }}" class="text-dark">DOWNLOAD APP</a>
                        <hr>

                        <a href="{{ url('news') }}" class="text-dark">NEWS</a>
                        <hr>
                        @if (session('user'))
                            <a href="{{ url('logout') }}" class="text-dark">LOG OUT</a>
                        @endif
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of modals -->
    <div class="container-fluid sticky-top"style="border-bottom: .1px solid white;background-color: rgb(0,0,0);">
        <div class="row d-flex justify-content-between mx-2 ">
            <!-- <div class="col-md-12 d-flex "> -->

            <div class="row ">
                <a href="#" class="text-white  mb-2 mt-3 font-weight-bold" data-toggle="modal"
                    data-target="#Modal" style="font-size: 11px">SPORT</a>
                <!-- modal -->

                <a href="{{ url('virtual') }}" class="text-white mb-3 mt-3 m-2 font-weight-bold"
                    style="font-size: 11px">VIRTUAL</a>
                <a href="{{ url('jackpot') }}" class="text-white mb-3 mt-3 m-2 font-weight-bold"
                    style="font-size: 11px">JACKPOT</a>

                <!-- <div class="col-md-5"></div> -->
            </div>
            <div class="row">
                <p onclick="search()" class="text-white mb-3 mt-3 font-weight-bold"
                    style="cursor: pointer;float: right;font-size: 11px">SEARCH</p>
                <a href="" class="text-white mb-3 mt-3 m-2 font-weight-bold" data-toggle="modal"
                    data-target="#menu" style="font-size: 11px">MENU</a>
                <!-- <input type="submit" name="" class="btn mt-3 mb-4 mx-1 text-dark font-weight-bold" value="Slip {{ 0 }}" data-toggle="modal" data-target="#myModal">
 -->
                <!-- <div class="betslip"> -->
                <a href="#passwordReset"id="betslip" data-toggle="modal"
                    style="background-color: white;font-size: 13px"
                    class="text-dark betslip btn text-white  mt-1 mb-2">Bets {{ count((array) session('cart')) }}</a>

            </div>
            <!-- </div> -->
        </div>
    </div>
    <div class="container col-md-6" id="search" style="display: none;background-color: rgb(0,0,0);">
        <div class="row">
            <input type="search" name="search" placeholder="Team or competition....."
                class="form-control mx-auto col-md-9">
            <input type="submit" name="search" class="btn bg-dark text-white col-md-2 font-weight-bold m-auto"
                style="border:1px solid white" value="SEARCH">
        </div>
    </div>
    <div class="container col-md-12">
        <div class="row" style="border-bottom: .1px solid gray;">
            <div class="col-md-8" style="border-right: .1px solid gray;">
                <div class="row justify-content-between" style="background-color: rgb(0,0,0);">
                    <div class="column" id="Col">
                        <h2><a href="{{ url('/') }}" style="text-decoration: none;"><i><span
                                        class="font-weight-bold text-white mx-2">bet</span><span
                                        class="font-weight-bold"
                                        style="color:lawngreen;margin-left: -10px">Pawa</span></i></a></h2>
                        <a href="{{ url('deposit') }}" class="text-white mx-2"
                            style="text-decoration: underline;"><i>M-PESA Pay Bill:290020</i></a>
                    </div>
                    <!-- <div class="account"> -->
                    <!-- <div class="row"> -->
                    <a href="{{ url('deposit') }}" class="row mx-auto" style="text-decoration: none;"><a
                            style="font-size: 13px;margin-right: 5px" class="text-white mt-3 ">
                            @if (session('user'))
                                @foreach (session('user') as $id)
                                    KSH {{ $id['account'] }}
                                @endforeach
                            @endif
                        </a>
                        <a href="" name="deposit" class="btn btn-success mt-2 mb-5"
                            style="color:black;font-weight: bold;background-color: lawngreen;font-size: 12px;border-radius: 0%">DEPOSIT</a></a>
                    <!-- </div> -->
                </div>

                <div class="column">
                    <div class="row text-center" style="border-bottom: .1px solid gray;background-color: grey">
                        <div class="row col-md-12 text-center" style="justify-content: center;">
                            <a href="" class="font-weight-bold mb-3 mt-3 text-center mx-5"
                                style="color: lawngreen">Online Deposit</a>
                            <a href="" class="font-weight-bold text-dark mb-3 mt-3 text-center">USSD</a>
                        </div>
                    </div>
                    <div class="row">
                        <h5 class="mx-3" style="color: black">Deposit Using M-pesa</h5>
                    </div>
                    <div class="">
                        <p>Easily deposit money on betpawa using M-pesa Mobile. Simply enter the amount you wish to
                            deposit below.</p>
                    </div>
                    <div class="col-md-12 mb-1" style="background-color:gray;">
                        <div class="row">
                            <div class="column col-md-2">
                                <p>Safaicom</p>
                            </div>
                            <div class="column col-md-10">
                                <p class="" style="">Your number</p>
                                @if (session('user'))
                                    @foreach (session('user') as $id)
                                        <p style="margin-top: -15px">+254 {{ $id->phone_number }}</p>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        @if (session('user'))
                            @foreach (session('user') as $id)
                                <form method="get" action="{{ url('credit/' . $id->id) }}">
                                    @if (session()->has('success'))
                                        <p class="" style="color: black;font-weight: bold">
                                            {{ session()->get('success') }}</p>
                                    @endif
                                    <label>Amount</label>
                                    <!-- <div class="row"> -->
                                    <!-- <p class="col-md-1">ksh</p> -->

                                    <input type="number" name="id" value="{{ $id->id }}" hidden>
                            @endforeach
                        @endif
                        <form method="get" action="{{ url('credit_account') }}">
                            <input type="number" name="account" class="form-control <?php echo $errors->has('account') ? 'border border-danger' : ''; ?>"
                                style="border-radius: 0%">
                            <!-- </div> -->
                            @if ($errors->has('account'))
                                <span class="text-danger">{{ $errors->first('account') }}</span><br>
                            @endif

                            <label>Min:1, Max:1000</label>
                            <input type="submit" name="submit" value="DEPOSIT"
                                style="border-radius: 0%;background-color: lawngreen;color: black;border:none"
                                class="font-weight-bold form-control">
                        </form>
                    </div>
                    <div class="col-md-12">
                        <p><span class="" style="color: black;font-weight: bold;">What happen next?</span>
                            Confirm the deposit request to Gaming international on your phone to complete the deposit.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4" id="slip">
                @if (!session('user'))
                    <div class="row">
                        <p class="mx-2">Not loggedin - <a class="text-dark" style="text-decoration: underline;"
                                href="{{ url('register') }}">Join Now</a><span> or </span><a class="text-dark"
                                style="text-decoration: underline;" href="{{ url('login') }}">Log in</a></p>
                    </div>
                @endif
                <div class="row" style="border-bottom: 0.1px solid gray">
                    <div class="column">
                        <h5>Your Balance</h5>
                        @if (session('user'))
                            @foreach (session('user') as $id)
                                <h4>KSH {{ $id['account'] }}</h4>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="row d-flex justify-content-around mt-2">
                    <h4 class="text-center font-weight-bold">Sport {{ count((array) session('cart')) }}</h4>
                    <div style="">
                        <h4 class="text-center font-weight-bold" style="">Virtual</h4>
                    </div>
                </div>
                <!-- php -->
                <?php if (count((array)session('cart'))<=0){
		?>
                <div id="slip">
                    <div class="row mx-auto">
                        <div class="col-md-12">
                            <form>
                                <label>Booking Code :</label>
                                <div class="row">
                                    <input type="text" name="code" class="col-md-8 form-control">
                                    <input type="submit" name="load"
                                        class="col-md-3 btn bg-dark text-white font-weight-bold mx-1" value="Load">
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
                            <a href=faqs class="btn bg-dark font-weight-bold text-white form-control">LEARN HOW TO
                                PLACE BET</a>
                        </div>
                    </div>
                </div>
                <!-- php -->
                <?php
}else{
?>
                <div class="row justify-content-between"
                    style="border-bottom: .1px solid grey;border-top: .1px solid grey">

                    <div class="mx-2 mb-2 mt-2">
                        <a href="{{}}" class=""
                            style="text-decoration:underline;color:black">Booking code</a>
                    </div>
                    <div class="mx-2 mb-2 mt-2">
                        <a href=../delete class=""style="text-decoration:underline;color:black">Clear
                            Betslip</a>
                    </div>
                </div>

                <!-- php -->
                <?php
 $total = 1;
 $amount = " ";

 
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

                        <form action=remove method='post'>
                            @if (session('user'))
                                @foreach (session('user') as $d)
                                    <form method="post" action="{{ url('bet/' . $d->id) }}">
                                @endforeach
                            @endif
                            @csrf
                            <input type="hidden" class="col-md-6" name="id" value="<?php echo $id; ?>">
                            <button type="submit" class="btn btn-danger mt-2 mb-2">X</button>
                        </form>
                    </div>

                    @csrf
                    <div class="col-md-11">
                        <div class="column">

                            <!-- <input type="text" name="team_1" class="col-md-3" style="border:none" value="<?php echo $details['team_1']; ?>" readonly> -->
                            <a class="" name="team_1"><?php echo $details['team_1']; ?></a>
                            <a class=""> </a>
                            <a class="">-</a>
                            <a class=""> </a>
                            <a class="" name="team_2"><?php echo $details['team_2']; ?></a>
                        </div>
                        <div class="col-md-12 ">
                            <div class="row justify-content-between">
                                <!-- <input type="text" name="team_2" class="col-md-3" style="border:none" value="'.$details['team_2'].'" readonly> -->
                                <a class="" name="pick">1X2 - FT (<?php echo $details['pick']; ?>)</a>
                                <!-- <input type="text" name="pick" class="col-md-1" style="border:none" value="'.$details['pick'].'" readonly> -->
                                <a class="" name="odds"><?php echo $details['odds']; ?></a>
                                <!-- <input type="text" name="odds" class="col-md-2" style="border:none" value="'.$details['odds'].'" readonly> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- php -->
                <?php 
}}
?>
                <div class="col-md-12">
                    <div class="row">
                        <input type="checkbox" class="">
                        <a class="col-md-10">Accept odds change - Learn more</a>
                    </div>
                    <div class="row mt-3">
                        <p class="font-weight-bold">Stake</p>
                    </div>
                    <div class="col-md-12">
                        <!-- <form action="" method="post"> -->
                        <input type="number" id="num" name="amount" onkeyup="Update()" class="form-control"
                            placeholder="Amount ....1000">
                        @if ($errors->has('amount'))
                            <span class="text-danger">{{ $errors->first('amount') }}</span><br>
                        @endif
                        <!-- </form> -->
                        <div id="re"></div>
                    </div>
                    <div class="row">
                        <p>Min Stake 1</p>
                    </div>

                    <div class="row justify-content-between">
                        <a class=" font-weight-bold">Odds:</a>
                        <input type="text" name="total" class="col-md-3" style="border:none"
                            value="<?php echo round($total, 2); ?>">
                    </div>
                    <div class="row justify-content-between">
                        <a class=" font-weight-bold">Tax:</a>
                        <!-- <input type="text" name="tax" class="col-md-3" style="border:none" id="tax" value="-Ksh "> -->
                        <input type="text" name="tax" class="col-md-3" style="border:none"
                            value="-Ksh <?php echo round($tax, 2); ?>">
                    </div>
                    <div class="row justify-content-between">
                        <a class="font-weight-bold">Total PayOut:</a>
                        <input type="text" name="totalAmount" class="col-md-3" style="border:none"
                            value="Ksh <?php echo round($totalAmount, 2); ?>">
                    </div>
                    <div class="row justify-content-between">
                        <a class="font-weight-bold">Final pay:</a>
                        <input type="text" name="finalpay" class="col-md-3" style="border:none"
                            value="Ksh <?php echo round($finalpay, 2); ?>">
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            @if (session()->has('mssg'))
                                <p class="text-danger" style="color: ;font-weight: bold">{{ session()->get('mssg') }}
                                </p>
                                <?php
                                echo $amount; ?>
                            @endif
                            <?php
		if(session('user')){
			foreach(session('user') as $d){
		?>
                            <a href={{ url('bet/' . $d->id) }}><input type="submit" name="placeBet"
                                    style="background-color: lawngreen;color: black"
                                    class="btn font-weight-bold form-control" value="PLACE BET"></a>
                            <?php 
}}else{
?>
                            <a href={{ url('bet') }}><input type="submit" name="placeBet"
                                    style="background-color: lawngreen;color: black"
                                    class="btn font-weight-bold form-control" value="PLACE BET"></a>
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
        <!-- modal -->
        <div class="modal fade" id="passwordReset" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" style="font-size: 15px">BetSlip</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="container">
                        <div class="row">
                            <p class="mx-2">Not loggedin - <a class="text-dark" style="text-decoration: underline;"
                                    href="{{ url('register') }}">Join Now</a><span> or </span><a class="text-dark"
                                    style="text-decoration: underline;" href="{{ url('login') }}">Log in</a></p>
                        </div>
                        <div class="row" style="border-bottom: 0.1px solid gray">
                            <div class="column">
                                <h5>Your Balance</h5>
                                <h4>Ksh 7.00</h4>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-around mt-2">
                            <!-- <div class="col-md-6"> -->
                            <h4 class="text-center font-weight-bold">Sport {{ count((array) session('cart')) }}</h4>
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
                                            <input type="submit" name="load"
                                                class="col-md-3 btn bg-dark text-white font-weight-bold mx-1"
                                                value="Load">
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
                                    <a href=faqs class="btn bg-dark font-weight-bold text-white form-control">LEARN HOW
                                        TO PLACE BET</a>
                                </div>
                            </div>
                        </div>
                        <?php
}else{
?>
                        <div class="row justify-content-between"
                            style="border-bottom: .1px solid grey;border-top: .1px solid grey">

                            <div class="mx-2 mb-2 mt-2">
                                <a href="{{}}" class=""
                                    style="text-decoration:underline;color:black">Booking code</a>
                            </div>
                            <div class="mx-2 mb-2 mt-2">
                                <a href=delete class=""style="text-decoration:underline;color:black">Clear
                                    Betslip</a>
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

                                <form action=remove method='GET'>

                                    <form method="get" action="{{ url('../bet') }}">
                                        @csrf
                                        <input type="hidden" class="col-md-6" name="id"
                                            value="<?php echo $id; ?>">
                                        <button type="submit" class="btn btn-danger mt-2 mb-2">X</button>
                                    </form>
                            </div>

                            @csrf
                            <div class="col-md-11">
                                <div class="column">

                                    <!-- <input type="text" name="team_1" class="col-md-3" style="border:none" value="<?php echo $details['team_1']; ?>" readonly> -->
                                    <a class="" name="team_1"><?php echo $details['team_1']; ?></a>
                                    <a class=""> </a>
                                    <a class="">-</a>
                                    <a class=""> </a>
                                    <a class="" name="team_2"><?php echo $details['team_2']; ?></a>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="row justify-content-between">
                                        <!-- <input type="text" name="team_2" class="col-md-3" style="border:none" value="'.$details['team_2'].'" readonly> -->
                                        <a class="" name="pick">1X2 - FT (<?php echo $details['pick']; ?>)</a>
                                        <!-- <input type="text" name="pick" class="col-md-1" style="border:none" value="'.$details['pick'].'" readonly> -->
                                        <a class="" name="odds"><?php echo $details['odds']; ?></a>
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
                                    <input type="text" id="num" name="amount" onkeyup="Update()"
                                        class="form-control col-md-11" placeholder="Amount">
                                </form>
                            </div>
                            <div class="row">
                                <p>Min Stake 1</p>
                            </div>
                            <div class="row justify-content-between">
                                <a class=" font-weight-bold">Odds:</a>
                                <input type="text" name="total" class="" style="border:none"
                                    value="<?php echo round($total, 2); ?>">
                            </div>

                            <div class="row justify-content-between">
                                <a class=" font-weight-bold">Tax:</a>
                                <input type="text" name="tax" class="" style="border:none"
                                    value="-Ksh <?php echo round($tax, 2); ?>">
                            </div>
                            <div class="row justify-content-between">
                                <a class="font-weight-bold">Total PayOut:</a>
                                <input type="text" name="totalAmount" class="" style="border:none"
                                    value="Ksh <?php echo round($totalAmount, 2); ?>">
                            </div>
                            <div class="row justify-content-between">
                                <a class="font-weight-bold">Final pay:</a>
                                <input type="text" name="finalpay" class="" style="border:none"
                                    value="Ksh <?php echo round($finalpay, 2); ?>">
                            </div>
                            <!-- </div> -->
                            <div class="row">
                                <div class="col-md-12">
                                    <a href=bet><input type="submit" name="placeBet"
                                            style="background-color: lawngreen;color: black"
                                            class="btn font-weight-bold form-control" value="PLACE BET"></a>
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
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-around" style="">
            <h5>
                <a href="{{ url('bets/active') }}" name="submit" class="btn m-1"
                    style="background-color: black;color: white;border-radius: 0%;">HELP</a>
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
                <p style="color: gray">Developed by Dan Ndong &copy <?php echo date('Y'); ?></p>
            </h5>
        </div>
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        $("#num").on("input", function() {
            // var new = parseFloat($('$amount').val()) || 0;
            // alert('value changed');
            // var odds = $('#total').val();
            $('#tax').val("-Ksh " + (($('#total').val() * ($('#num').val())) * 20) / 100);
            $('#totalAmount').val("Ksh " + $('#total').val() * ($('#num').val()));
            $('#finalpay').val("Ksh " + (($('#total').val() * ($('#num').val())) - ((($('#total')
            .val() * ($('#num').val())) * 20) / 100)));




            // $('#tax').val("-Ksh " + (($('#total').val() * ($('#num').val())) * 20) /100).toFixed(2);
            // $('#totalAmount').val("Ksh " + $('#total').val() * ($('#num').val())).toFixed(2);
            // $('#finalpay').val("Ksh " + (($('#total').val() * ($('#num').val())) - ((($('#total').val() * ($('#num').val())) * 20) /100))).toFixed(2);

            // $('#finalpay').val("Ksh " + $('#total').val() * ($('#num').val()));
            // $('#re').text($(this).val());
        });
    });
</script>
<script src={{ asset('bootstrap/jquery/jquery-3.5.1.min.js') }}></script>
<script src={{ asset('bootstrap/js/bootstrap.min.js') }}></script>
<script src={{ asset('bootstrap/popper/popper.min.js') }}></script>
<script src={{ asset('bootstrap/js/bootstrap.js') }}></script>

</html>
