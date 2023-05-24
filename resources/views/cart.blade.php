<!DOCTYPE html>
<html>
<head>
	<title>cart items</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href={{asset('bootstrap/css/bootstrap.min.css')}} rel="stylesheet">
</head>
<body>
	<table id="cart" class="table table-hover table-condensed">
		<thead>
			<tr>
				<td>#</td>
				<td>Team 1</td>
				<td>Team 2</td>
				<td>League</td>
				<td>Pick</td>
				<td>Odds</td>
				<td>Total Odds</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody>
			<?php $total = 1;?>
			@if(session('cart'))
			@foreach(session('cart') as $id =>$details)
			<?php $total *=$details['odds'];?>
			<tr>
				<td>{{$id}}</td>
				<td>{{$details['team_1']}}</td>
				<td>{{$details['team_2']}}</td>
				<td>{{$details['league']}}</td>
				<td>{{$details['pick']}}</td>
				<td>{{$details['odds']}}</td>
				<td>{{$total}}</td>
				<form action="{{route('remove')}}" method="post">
					@csrf
					<input type="hidden" name="id" value="{{$id}}">
				<td><button class="btn btn-danger ">Delete</button></td>
			</form>
			</tr>
			@endforeach
			@endif
			<form action="{{route('delete')}}" method="get">
				@csrf
			<tr><td><button class="btn btn-danger ">Clear slip</button></td></td></tr></form>
		</tbody>
		
	</table>

</body>
<!-- <script type="text/javascript">
	$(".remove").click(function(e){
		e.preventDefault();

		var ele = $(this);
		if (confirm("are you sure to delete?")) {
			$.ajax({
				url:'{{url('delete')}}',
				method: "DELETE",
				data:{_token:'{{csrf_token()}}',id:ele.attr("data-id")},
				success:function(response){
					window.location.reload();
				}
			});
		}
	});

</script> -->
</html>