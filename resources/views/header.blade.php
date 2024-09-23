<div class="container col-md-8 sticky-top"style="background-color: #252a2d;">
    <div class="row d-flex justify-content-between mx-2 ">
        <!-- <div class="col-md-12 d-flex "> -->

        <div class="row ">

                {{-- <a href="#" class="text-white  mb-2 mt-3  font-weight-bold" data-toggle="modal"
                    data-target="#Modal" style="font-size: 11px">SPORT</a> --}}
                    <a href="" class="p-2"><i class="fa fa-bars" style="color:grey"></i></a>
                    <a href="{{ url('/') }}" style="text-decoration: none;" class="p-2"><i><span
                        class="font-weight-bold text-white">bet</span><span
                        class="font-weight-bold"
                        style="color:#9ce800;">Pawa</span></i></a>
        </div>
        <div class="row">
            <div id="depo">
                <a href="{{ url('deposit') }}" class="mx-auto" style="text-decoration: none;"><a
                        href="{{ url('deposit') }}" style="font-size: 13px;margin-right: 5px"
                        class="text-white mt-4 font-weight-bold ">
                        @if (session('user'))
                            @foreach (session('user') as $id)
                                KSH {{ $id['account'] }}
                            @endforeach
                        @endif
                    </a>
                    {{-- <a href="{{ url('deposit') }}" name="deposit" class="btn btn-success mt-3 mb-4 p-2 "
                        style="color:black;font-weight: bold;background-color: lawngreen;font-size: 12px">DEPOSIT</a></a> --}}
            </div>
            {{-- <p onclick="search()" class="text-white mb-3 mt-3 font-weight-bold" style="cursor: pointer;float: right;font-size: 11px">SEARCH</p> --}}
            <a href={{url('login')}} class="text-white p-3 font-weight-bold " style="font-size: 11px">LOGIN</a>
            <a href={{url('register')}} c class="p-2 m-2 font-weight-bold " style="font-size: 11px;background-color:#9ce800;color: #252a2d;">JOIN NOW</a>
            <a href="" class="text-white p-3 font-weight-bold " data-toggle="modal"
                data-target="#menu" style="font-size: 11px"><i class="fa fa-user"></i>&nbsp;&nbsp;MENU</a>
            <!-- <input type="submit" name="" class="btn mt-3 mb-4 mx-1 text-dark font-weight-bold" value="Slip {{ 0 }}" data-toggle="modal" data-target="#myModal">
-->
            <!-- <div class="betslip"> -->
            <a href="#passwordReset" data-toggle="modal" style="background-color: white;font-size: 13px"
                class="text-dark betslip btn text-whit  mt-1 mb-5">Bets {{ count((array) session('cart')) }}</a>

        </div>
        <!-- </div> -->
    </div>
</div>
<div class="container col-md-8">
    <div class="row justify-content-around p-3" style="flex-wrap: nowrap;overflow-x:auto">
        <a href="" class="font-weight-bold" style="font-size:12px;color:#aaaeb0"><i></i>&nbsp;&nbsp;SPORTS</a>
        <a href="" class="font-weight-bold" style="font-size:12px;color:#aaaeb0"><i></i>&nbsp;&nbsp;CASINO</a>
        <a href="" class="font-weight-bold" style="font-size:12px;color:#aaaeb0"><i></i>&nbsp;&nbsp;VIRTUAL</a>
        <a href="" class="font-weight-bold" style="font-size:12px;color:#aaaeb0"><i></i>&nbsp;&nbsp;PAWA 6</a>
        <a href="" class="font-weight-bold" style="font-size:12px;color:#aaaeb0"><i></i>&nbsp;&nbsp;JACKPOT</a>
    </div>
</div>