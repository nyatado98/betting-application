<!DOCTYPE html>
<html>
<head>
	<title>Bet Small,Win Big</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href={{asset('bootstrap/css/bootstrap.min.css')}} rel="stylesheet">
<style type="text/css">
	.modal.left.dade .modal-dialog{
		left:-320px;
		-webkit-transition:opacity 0.3s linear,left 0.3 ease-out;
		-moz-transition:opacity 0.3s linear, left 0.3 ease-out;
		-o-transition:opacity 0.3s linear, left 0.3 ease-out;
		transition: opacity 0.3s linear, left 0.3 ease-out;
	}
	.modal.left.fade.in .modal-dialog{
		left:0;
	}
</style>
</head>
<body>
<div class="container col-md-6 bg-dark sticky-top">
	<div class="row mx-auto">
		<a href="" class="text-white font-weight-bold mb-4 mt-4" data-toggle="modal" data-target="#Modal">SPORT</a>&nbsp&nbsp&nbsp
		<!-- modal -->
		<div class="modal left fade" id="Modal" tabindex="=-1" role="dialog" aria-labelledby="myModalLaabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<select class="form-control">
							<option>Football</option>
							<option>Baskeball</option>
						</select>
					<button type="button" class="close" data-dismis="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
					<div class="modal-body">
						<div class="column">
							<a href="{{url('/')}}" class="text-dark">HOME</a>
							<hr>
							<a href="{{url('live')}}" class="text-dark">LIVE NOW</a>
							<hr>
							<a href="{{url('upcoming')}}" class="text-dark">UPCOMING</a>
							<hr>
							<a href="{{url('virtual')}}" class="text-dark" >VIRTUAL SPORTS</a>
							<hr>
							<a href="{{url('jackpot')}}" class=""style="color: lawngreen">JACKPOT</a>
							<hr>
							<a href="{{url('popular')}}" class="text-dark">POPULAR</a>
							<hr>
							<h4 class="font-weight-bold mx-auto">TOURNAMENTS</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
		<a href="{{url('virtual')}}" class="text-white font-weight-bold mb-4 mt-4" >VIRTUAL</a>&nbsp&nbsp&nbsp
		<a href="{{url('jackpot')}}" class=" font-weight-bold mb-4 mt-4"style="color: lawngreen">JACKPOT</a>&nbsp&nbsp&nbsp
		<div class="col-md-5"></div>
		<p onclick="search()" class="text-white font-weight-bold mb-4 mt-4" style="cursor: pointer;">SEARCH</p>&nbsp&nbsp&nbsp
		<a href="" class="text-white font-weight-bold mb-4 mt-4" data-toggle="modal" data-target="#menu">MENU</a>&nbsp&nbsp&nbsp
		<!-- modal -->
		<div class="modal left fade" id="menu" tabindex="=-1" role="dialog" aria-labelledby="myModalLaabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<div class="column">
							<a href="{{url('messages')}}" class="text-dark">MESSAGES</a>
							<hr>
							<a href="{{url('mybets/active/')}}" class="text-dark">MY BETS</a>
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
							<a href="{{url('logout')}}" class="text-dark">LOG OUT</a>
							<hr>
						</div>
					</div>
				</div>
			</div>
		</div>
		<a href="" class="text-white font-weight-bold mb-4 mt-4">Betslots</a>
	</div>
</div>
<div class="container col-md-6 bg-dark" id="search" style="display: none">
	<div class="row">
	<input type="search" name="search" placeholder="Team or competition....." class="form-control mx-auto col-md-9">
	<input type="submit" name="search" class="btn bg-dark text-white col-md-2 font-weight-bold m-auto" style="border:1px solid white" value="SEARCH">
</div>
</div>
<div class="container col-md-6 bg-dark">
	<div class="row mx-auto">
		<div class="column">
<h2><a href="{{url('/')}}" style="text-decoration: none"><i><span class="font-weight-bold text-white">bet</span><span class="font-weight-bold" style="color:lawngreen">Pawa</span></i></a></h2>

</div>
<!-- <div class="account"> --><div class="col-md-6"></div>
	<a href="{{url('deposit')}}" class="row" style="text-decoration: none;"><h5 class="text-white mt-3 m-2">KSH 1.00</h5>
	<input type="submit" name="deposit" class="btn btn-success mt-2" value="DEPOSIT" style="color:black;font-weight: bold;background-color: lawngreen"></a>
</div>
<div class="row mx-auto">
	<a href="{{url('deposit')}}" class="text-white" style="text-decoration: underline;"><i>M-PESA Pay Bill:290020</i></a>
</div>
</div>
<div class="container col-md-6">
	<div class="card">
		<div class="card-body">
			<a href="{{url('news/id')}}">News here
			</a>
		</div>
	</div>
</div>
</body>
<script type="text/javascript">
	function search(){
		document.getElementById("search").style.display='block';
	}
	
</script>
   <script src={{asset('bootstrap/jquery/jquery-3.5.1.min.js')}}></script>
<script src={{asset('bootstrap/js/bootstrap.min.js')}}></script>
<script src={{asset('bootstrap/popper/popper.min.js')}}></script> 
<script src={{asset('bootstrap/js/bootstrap.js')}}></script>
</html>