<!DOCTYPE html>
<html>

<head>
    <title>Bet Small,Win Big</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css">
    <link href={{ asset('bootstrap/css/bootstrap.min.css') }} rel="stylesheet">
    <script src={{ asset('bootstrap/jquery/jquery-3.5.1.min.js') }}></script>
    <style type="text/css">
        .selected {
            background-color: lawngreen;
            /* Change the background color to the desired selected color */
            color: white;
            /* Change the text color to the desired selected color */
        }

        #slip {
            display: none;

        }

        @media (min-width:800px) {
            #slip {
                display: block;
            }
        }

        #side {
            display: none;

        }

        @media (min-width:800px) {
            #side {
                display: block;
            }
        }

        #top {
            display: none;

        }

        @media (max-width:800px) {
            #top {
                display: block;
            }
        }

        #Top {
            display: block;

        }

        @media (max-width:800px) {
            #Top {
                display: none;
            }
        }

        #more {
            display: none;

        }

        @media (max-width:800px) {
            #more {
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

        #Search {
            display: block;
            /*background-color: red;*/

        }

        @media (max-width:800px) {
            #Search {
                display: none;
            }
        }

        #depo {
            display: block;
            /*background-color: red;*/

        }

        @media (max-width:800px) {
            #depo {
                display: none;
            }
        }

        @media (max-width:600px) {
            .more_btn {
                padding-left: 0px;
                padding-right: 3px;
            }
        }

        @media (min-width:601px) {
            .more_btn {
                padding-right: 5px;
                padding-left: 10px;

            }
        }

        #betslip_sid {
            position: sticky;
            top: 14vh;
            right: 0;
            z-index: 99;
        }

        /*#first:hover{
  background-color: lawngreen;
 }*/
    </style>
</head>

<body style="background-color: #293136">
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
                            <hr>
                        @endif
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of modals -->
    <!-- menu modal -->
    <div class="modal fade" id="bets" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                        <p>Sport {{ count((array) session('cart')) }}</p>
                        <p>Virtual 0</p>
                    </div>
                    <div class="row">
                        <span>Your bet is placed - good luck. </span><a href="" class="mx-1"> Check out the
                            details here</a>
                    </div>
                    <div class="row mb-2 justify-content-between" style="border:.1px solid grey">
                        <a href="" class="m-3 text-dark font-weight-bold">Booking code</a>
                        <a href="" class="btn font-weight-bold m-2 "
                            style="background-color: lawngreen;border-radius: 0%;color: black">CREATE CODE</a>
                    </div>
                    <div class="row mb-2"style="border:.1px solid grey">
                        <a href="" class="m-3 text-dark font-weight-bold">Share your bet</a>
                    </div>
                    <div class="row mb-2"style="border:.1px solid grey">
                        <a href="" class="m-3 text-dark font-weight-bold">Re-use selections</a>
                    </div>
                    <div class="row mb-2"style="border:.1px solid grey">
                        <a href="" class="m-3 text-dark font-weight-bold">Place a new bet</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of modals -->
    {{-- header --}}
    @include('header')
    @include('footer')

    <div class="container col-md-8 bg-white">
        <div class="row">
            <div class="col-md-8 p-0" style="overflow: auto;border-right:1px solid grey;height:87.4vh">
                <h4 class="text-dark font-weight-bold text-center"
                    style="font-size:22px;margin:0px;padding:10px;background-color: rgb(235, 234, 234)"><i
                        class="fa fa-football"></i>&nbsp;&nbsp;Football</h4>
                <div class="container">
                    @foreach ($games as $game)
                        <div class="row" style="padding-left:10px;">
                            <p style="margin: 2px">
                                <?php date_default_timezone_set('Africa/Nairobi');
                                
                                $date_added = strtotime('current');
                                $date_added = date('H:i a');
                                $date = date('D d/m');
                                echo $date_added;
                                ?>
                                <span class="font-weight-bold"><?php echo $date; ?></span>
                            </p>
                        </div>
                        <a href="{{ url('event/id=12345') }}" style="text-decoration: none;color:black">
                            <div class="row" style="padding-left:10px;">
                                <p style="margin: 2px" class="font-weight-bold">{{ $game['team_1'] }}</p>
                            </div>
                            <div class="row" style="padding-left:10px;">
                                <p style="margin: 2px" class="font-weight-bold">{{ $game['team_2'] }}</p>
                            </div>
                        </a>
                        <div class="row" style="padding-left:10px;">
                            <p style="margin: 2px">Footaball&nbsp;{{ $game['football_league'] }}</p>
                        </div>

                        <div class="row" style="padding-left:10px;flex-wrap:nowrap;border-bottom:.1px solid grey">
                            <div class="col-11 col-md-11 mb-2">
                                <div class="row" style="flex-wrap:nowrap">
                                    <button id="<?php echo $game['id']; ?>/<?php echo $game['one_odds']; ?>/1" class=" col-md-4 selection"
                                        style="border:1px solid #252a2d;margin-right:5px;cursor:pointer">
                                        <div class="row justify-content-between p-1">
                                            <span>1</span>
                                            <span><?php echo $game['one_odds']; ?></span>
                                        </div>
                                    </button>
                                    <button id="<?php echo $game['id']; ?>/<?php echo $game['draw_odds']; ?>/X" class=" col-md-4 selection"
                                        style="border:1px solid #252a2d;margin-right:5px;cursor:pointer">
                                        <div class="row justify-content-between p-1">
                                            <span>X</span>
                                            <span><?php echo $game['draw_odds']; ?></span>
                                        </div>
                                    </button>
                                    <button id="<?php echo $game['id']; ?>/<?php echo $game['two_odds']; ?>/2" class=" col-md-4 selection"
                                        style="border:1px solid #252a2d;margin-right:5px;cursor:pointer">
                                        <div class="row justify-content-between p-1">
                                            <span>2</span>
                                            <span><?php echo $game['two_odds']; ?></span>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="col-1 col-md-1 more_btn mb-2">
                                <button class="col-12 col-md-12" style="border:1px solid #252a2d;cursor:pointer;">
                                    <div class="row justify-content-center p-1">
                                        <span>+46</span>
                                    </div>
                                </button>
                            </div>

                        </div>
                    @endforeach

                </div>
                {{-- footer --}}
                <div class="container" style="background-color: #252a2d;position:absolute;bottom:0px">
                    <div class="row justify-content-center d-flex nowrap" style="margin: 0px">
                        <p class="text-white p-1 m-0"><a href=""
                                style="text-decoration: none;color:white">Football</a></p>
                        <p class="text-white p-1 m-0"><a href=""
                                style="text-decoration: none;color:white">Basketball</a></p>
                        <p class="text-white p-1 m-0"><a href=""
                                style="text-decoration: none;color:white">Tennis</a></p>
                    </div>
                    <div class="row justify-content-center d-flex nowrap" style="margin: 0px">
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-instagram"></i>
                    </div>
                    <div class="row justify-content-center d-flex nowrap" style="margin: 0px">
                        <p class="text-white p-1 m-0"><a href=""
                                style="text-decoration: none;color:white">Join Now</a></p>
                        <p class="text-white p-1 m-0"><a href=""
                                style="text-decoration: none;color:white">Login</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" id="betslip_sid">
                <div class="header-part">

                </div>
                <div class="body-part">

                </div>
                <div class="footer-odds">

                </div>
            </div>
        </div>
    </div>
</body>
<script>
    // function totalAm(amount){
    //         console.log("called ",amount)
    //         localStorage.setItem('amount_placed',amount)
    //     }
    //     document.getElementById('amount_placed').addEventListener('change', function (event) {
    //         console.log("called ",200)
    //     })
</script>
<script>
    $(document).on('input', '#amount_placed', function() {
        let newValue = $(this).val();
        localStorage.setItem('amount_placed', newValue)
        console.log("New amount placed:", newValue);
        $("#amount_placed").attr("focused", "true");
        $("#amount_placed").attr("outline", "none");
        updateUserArea();
        // Add event listener to store focus state
        document.getElementById('amount_placed').addEventListener('focus', () => {
            inputField.dataset.keepFocus = "true";
        });
        // Your code to handle the change
        // e.g., update a calculated field, send an AJAX request, etc.
    });

    // remove from cart
    function removeSelection(e) {
        console.log('cliked')
        var id = e;
        console.log(id)
        $.ajax({
            url: 'remove',
            method: 'GET',
            data: {
                game_id: id
            },
            success: function(data) {
                // Get the current cart from localStorage
                var cart = JSON.parse(localStorage.getItem('cart_details')) || {};

                // Check if the game exists in the cart
                if (cart.hasOwnProperty(id)) {
                    // Remove the game from the cart
                    delete cart[id];

                    // Update localStorage with the modified cart
                    localStorage.setItem('cart_details', JSON.stringify(cart));

                    // Optionally, log to see the updated cart
                    console.log('Updated Cart:', cart);

                    // Refresh the cart display
                    updateUserArea(); // Assuming this function updates the cart UI
                }
            }
        })
    }
    // $(document).ready(function() {
    var CartLength = 0;
    // cliking on the selection buttton
    $('.selection').on('click', function(e) {
        e.preventDefault();
        var game_id_odds = $(this).attr('id');
        console.log(game_id_odds)
        var game_id_odds_split = game_id_odds.split('/');
        var game_id = game_id_odds_split[0];
        var game_odds = game_id_odds_split[1];
        var game_choice = game_id_odds_split[2];
        $.ajax({
            url: 'add/' + game_id,
            method: 'GET',
            data: {
                choice: game_choice,
                odds: game_odds
            },
            success: function(data) {
                updateCartCountEvery();
                updateUserArea();
                // alert(data)
                // $('.cart-count').text(data.cart_count);
            }
        })
    })


    // update cart count every time the selection button is clicked
    function updateCartCountEvery() {
        $.ajax({
            url: '/cart/count', // URL to fetch cart count
            type: 'GET', // Method type
            success: function(data) {
                // Update the cart count in the frontend
                $('.cart-count').text(data
                    .cartCount); // Assuming you have an element with id="cart-count"
                CartLength = data.cartCount;
                console.log(CartLength)
                console.log(data.cartCount)
                // $('.total_odds').val(data.odds);
                console.log(data.odds)
                console.log(data)
                localStorage.setItem('cart_details', JSON.stringify(data.cart));
            }
        });
    }

    // call the function below every time the window loads
    // window.onload = updateUserArea;
    $(window).on('load', function() {
        updateUserArea({
            preventDefault: () => {}
        })
        console.log('function called');
    })

    // updateUserArea({
    //     preventDefault: () => {}
    // })
    // update the view when the selection butons are clicked
    function updateUserArea() {
        var cart_count = <?php echo count((array) session('cart')); ?>;
        var session_user = '<?php echo session('user'); ?>';
        // console.log(cart_count)
        var header_area = '';
        var cart_area = '';
        var betslipLength = 0;
        $.ajax({
            url: '/cart/count', // URL to fetch cart count
            type: 'GET', // Method type
            success: function(data) {
                // Update the cart count in the frontend
                $('.cart-count').text(data
                    .cartCount); // Assuming you have an element with id="cart-count"
                betslipLength = data.cartCount;


                // cart game loop
                var cart = JSON.parse(localStorage.getItem('cart_details')) || {};
                // Get the length of the cart (number of keys)
                var cartLength = Object.keys(cart).length;
                console.log('cart---length = ', cartLength)
                var amount = 10; // The value of amount, you can dynamically set this too
                console.log(cart)
                // Initialize total
                var total = 1;
                var tax = 1;
                var Amount_payout = 1;

                // Loop through the cart items using JS
                var games_list = '';
                var game_codes = '';
                var footer_odds = '';
                for (var id in cart) {
                    if (cart.hasOwnProperty(id)) {
                        total *= parseFloat(cart[id].odds); // Multiply odds to total
                        var total_fixed = total.toFixed(2);
                        // console.log(total_fixed)
                        var placed_amount = localStorage.getItem('amount_placed');
                        tax = (20 * (placed_amount * total)) / 100;
                        var tax_fixed = tax.toFixed(2);
                        Amount_payout = (total * placed_amount) - (tax);
                        var amount_fixed = Amount_payout.toFixed(2);
                        game_codes = `
                     <div class="row justify-content-around">
                        <div class="col-md-6" style="height:50px;">
                            <p style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);color:black">Sport&nbsp;&nbsp;<span class="cart-count" style="height:30px;width:30px;border-radius:;background-color:#9ec800">${betslipLength}</span></p>
                            </div>
                            <div class="col-md-6" style="height:50px;background-color:rgb(219, 219, 219)">
                                  <p style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);color:black">Virtual 0</p>
                                </div>
                    </div>
                    <div class="row mt-1 justify-content-between p-1"
                        style="border-bottom: .1px solid grey;border-top: .1px solid grey">

                        <div class="mb-2 mt-2">
                            <a href="" class="" style="text-decoration:underline;color:black">Booking
                                code</a>
                        </div>
                        <div class=" mb-2 mt-2">
                            <a href=delete class=""style="text-decoration:underline;color:black">Clear
                                Betslip</a>
                        </div>
                    </div>
                    `;

                        games_list += `
            <div class="row"style="border-bottom: .1px solid grey;flex-wrap:nowrap"
                        id="cart-item-${id}">
                        <span
                            class="d-flex align-items-center justify-content-center text-center p-2 m-0" onclick="removeSelection(${id})"
                            id="" game-id="${id}"
                            style="background-color: rgb(219, 219, 219);cursor: pointer;">
                            X
                        </span>
                        <div class="col-md-11" style="padding-left:5px">
                            <div class="column">
                                <a href="" style="text-decoration:none;color:black">
                                <p class="m-0 font-weight-bold" style="font-size: 12px;text-decoration:underline">
                                   ${cart[id].team_1} - ${cart[id].team_2}
                                </p> 
                                </a>
                                <div class="col-md-12 ">
                                    <div class="row justify-content-between">
                                        <!-- <input type="text" name="team_2" class="col-md-3" style="border:none" value="'.$details['team_2'].'" readonly> -->
                                        <a class="font-weight-bold" style="font-size: 12px" name="pick">1X2 - FT
                                            (${cart[id].pick})</a>
                                        <!-- <input type="text" name="pick" class="col-md-1" style="border:none" value="'.$details['pick'].'" readonly> -->
                                        <a class="px-3 font-weight-bold" style="font-size: 12px"
                                            name="odds">${cart[id].odds}</a>
                                        <!-- <input type="text" name="odds" class="col-md-2" style="border:none" value="'.$details['odds'].'" readonly> -->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                  
            `;
                        footer_odds = `
              <div class="row" style="background-color: rgb(219, 219, 219);padding:0px 15px">
                                <input type="checkbox" class="">
                                    <span style="font-size:12px" class="mx-3">Accept odds change. <a href="">Learn More</a></span>
                        </div>
                        <div class="row"  style="background-color: rgb(219, 219, 219);padding:0px 15px">
                            <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" id="amount_placed" class="form-control" placeholder="Amount" value=${placed_amount}>
                            </div>
                            <div class="row" style="background-color: rgb(219, 219, 219);padding:0px 15px">
                            <span>Min Stake is 1</span>
                            </div>
                            <div class="row justify-content-between" style="background-color: rgb(219, 219, 219);padding:0px 15px">
                            <span>Odds:</span>
                            <span>${total_fixed}</span>
                            </div>
                            <div class="row justify-content-between" style="background-color: rgb(219, 219, 219);padding:0px 15px">
                            <span>Tax:</span>
                            <span>${tax_fixed}</span>
                            </div>
                            <div class="row justify-content-between" style="background-color: rgb(219, 219, 219);padding:0px 15px">
                            <span>Payout:</span>
                            <span>${amount_fixed}</span>
                            </div>
                            <div class="row" style="background-color: rgb(219, 219, 219);padding:0px 15px">
                                ${session_user != '' ? `<p class="btn text-center form-control" style="border-radius:0px;background-color:#9ce800;color:black" id="place_bet">PLACE BET</p>` : `<p class="btn text-center form-control" style="border-radius:0px;background-color:#9ce800;color:black" id="login">LOGIN TO PLACE BET</p> <div class="p-0 row justify-content-center"><span>Dont have an account? <a href=register>Join Now.</a></span></div>` }
                                </div>
            `;
                    }
                }
                // end of the loop
                if (cartLength == 0) {
                    cart_area = `
                    <div class="row justify-content-around">
                        <div class="col-md-6"  style="height:50px;background-color:rgb(219, 219, 219)">
                            <a href="">
                            <span style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);color:black">Sports</span>
                                                        </a>
                            </div>
<div class="col-md-6"  style="height:50px;">
                        <a href="">
                            <span style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);color:black">Virtuals</span>
                                                        </a>
                            </div>
                        </div>
                 <div class="container mx-auto mt-2"  style="background-color:rgb(219, 219, 219)">
                        <div class="row">
                                <p class="p-1 m-0">Booking Code</p>
                                </div>
                                <div class="row p-1">
                                    <input type="text" name="code" class="p-1 form-control" placeholder="Enter booking code" style="border-radius:0px">
                                </div>
                                <div class="row p-1">
                                    <p class="btn font-weight-bold text-center form-control" style="border-radius:0px;background-color:#9ce800;color:black" id="load_slip">LOAD</p>
                                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="text-center p-2">Betslip is empty</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        </div>
                    </div>
                            <a id="faqs" class="btn bg-dark text-white col-md-12" style="border-radius:0px">LEARN HOW TO
                                PLACE BET</a>
                `;
                } else {
                    cart_area = `
                ${game_codes}
                ${games_list}
                
                `;
                }
                $('.body-part').empty();
                $('.body-part').html(cart_area);

                $('.footer-odds').empty();
                $('.footer-odds').html(footer_odds);
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                console.log('Response:', xhr.responseText);
            }
        });
        if (session_user != '') {
            var session_json = JSON.parse(session_user)
            header_area = `
            <h5>Your Balance</h5>
            <h4>KSH ${session_json[0].account}</h4>
            `;
        } else {
            header_area = `<div class="row p-2" style="border-bottom:.1px solid grey">
                        <p class="mx-2" style="font-size:15px">Not loggedin - <a class="text-dark" style="text-decoration: underline;"
                                href="{{ url('register') }}">Join
                                Now</a><span> or </span><a class="text-dark" style="text-decoration: underline;"
                                href="{{ url('login') }}">Log in</a></p>
                    </div>
                    <div class="row">
                        
                        </div>
                    `;
        }
        // update header-part
        $('.header-part').empty();
        $('.header-part').append(header_area);
        // upcdate cart-area part

    }
    // })
</script>
<script type="text/javascript">
    $(document).ready(function() {

        // update the betslip side depending on the cart count
        function updateBetside() {
            // updateCartCount()
            var cart_count = <?php echo count((array) session('cart')); ?>;
            var session_user = '<?php echo session('user'); ?>';
            console.log(cart_count)
            var login_area = '';
            var bal = '';
            if (session_user != '') {
                var session_json = JSON.parse(session_user)
                login_area = `    `;
                bal = `
            <h5>Your Balance</h5>
            <h4>KSH ${session_json[0].account}</h4>
            `;
            } else {
                login_area = `<div class="row" style="border-bottom:1px solid grey">
                        <p class="mx-2">Not loggedin - <a class="text-dark" style="text-decoration: underline;"
                                href="{{ url('register') }}">Join
                                Now</a><span> or </span><a class="text-dark" style="text-decoration: underline;"
                                href="{{ url('login') }}">Log in</a></p>
                    </div>`;
                bal = `
            
            `;
            }
            // console.log(cart_count)
            var html = '';
            // cart details
            var cart = JSON.parse(localStorage.getItem('cart_details'));
            var amount = 10; // The value of amount, you can dynamically set this too
            console.log(cart)
            // Initialize total
            var total = 1;

            // Loop through the cart items using JS
            var games_list = '';
            for (var id in cart) {
                if (cart.hasOwnProperty(id)) {
                    total *= parseFloat(cart[id].odds); // Multiply odds to total
                    games_list += `
            <div class="row"style="border-bottom: .1px solid grey;flex-wrap:nowrap"
                        id="cart-item-${id}">
                        <span
                            class="d-flex align-items-center justify-content-center text-center p-2 m-0 remove_selection"
                            id="" game-id="${id}"
                            style="background-color: rgb(219, 219, 219);cursor: pointer;">
                            X
                        </span>
                        <div class="col-md-11" style="padding-left:5px">
                            <div class="column">
                                <p class="m-0 font-weight-bold" style="font-size: 12px;text-decoration:underline">
                                   ${cart[id].team_1} - ${cart[id].team_2}
                                </p>
                                <div class="col-md-12 ">
                                    <div class="row justify-content-between">
                                        <!-- <input type="text" name="team_2" class="col-md-3" style="border:none" value="'.$details['team_2'].'" readonly> -->
                                        <a class="font-weight-bold" style="font-size: 12px" name="pick">1X2 - FT
                                            (${cart[id].pick})</a>
                                        <!-- <input type="text" name="pick" class="col-md-1" style="border:none" value="'.$details['pick'].'" readonly> -->
                                        <a class="px-3 font-weight-bold" style="font-size: 12px"
                                            name="odds">${cart[id].odds}</a>
                                        <!-- <input type="text" name="odds" class="col-md-2" style="border:none" value="'.$details['odds'].'" readonly> -->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
            `;
                }
            }
            $('#betslip_side').empty();

            // Calculate total amount
            var totalAmount = total * parseInt(amount);
            var tax = (20 * totalAmount) / 100;
            var finalPay = totalAmount - tax;

            // Output the results
            console.log("Total: " + total);
            console.log("Total Amount: " + totalAmount);
            console.log("Tax: " + tax);
            console.log("Final Pay: " + finalPay);

            if (cart_count == 0) {
                $('#betslip_side').empty();
                html += `
        
                <div id="slip">
                    <div class="row mx-auto ">
                        <div class="col-md-12 p-0">
                                <p class="p-0 m-0">Booking Code </p>
                                <div class="row">
                                    <input type="text" name="code" class="col-md-9 p-0 form-control" style="border-bottom-right-radius: 0px;border-top-right-radius:0px;border-right:none">
                                    <p class="col-md-3 btn bg-dark text-white m-0 font-weight-bold text-center" style="border-bottom-left-radius: 0px;border-top-left-radius:0px;border-left:none" id="load_slip">Load</p>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        sports
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
                        <div class="col-md-12 p-0 justify-content-center">
                            <a id="faqs" class="btn col-12 bg-dark font-weight-bold text-white m-0">LEARN HOW TO
                                PLACE BET</a>
                        </div>
                    </div>
                </div>
        `;
            } else {
                html += `
             <div id="desktop" style="display:block;">
                  ${login_area}
                    <div class="row" style="border-bottom: 0.1px solid gray">
                        <div class="column">
                            ${bal}
                        </div>
                    </div>
                    <div class="row justify-content-around p-1">
                        <p>Sport&nbsp;&nbsp;<span class="cart-count">${cart_count}</span></p>
                        <p>Virtual 0</p>
                    </div>
                    <div class="row justify-content-between"
                        style="border-bottom: .1px solid grey;border-top: .1px solid grey">

                        <div class="mb-2 mt-2">
                            <a href="" class="" style="text-decoration:underline;color:black">Booking
                                code</a>
                        </div>
                        <div class=" mb-2 mt-2">
                            <a href=delete class=""style="text-decoration:underline;color:black">Clear
                                Betslip</a>
                        </div>
                    </div>
                    <!-- </div> -->
                
                    ${games_list}
                    <div class="container p-1">
                        <div class="row p-1 " style="flex-wrap: nowrap">
                            <p class="p-0 m-0"><input type="checkbox" class=""></p>
                            <a class="" style="font-size: 14px">Accept odds change - Learn more</a>
                        </div>
                        <div class="row p-1">
                            <input type="number" id="num" name="amount" onkeyup="Update()"
                                class="form-control" placeholder="Amount">
                            // @if ($errors->has('amount'))
                            //     <span class="text-danger">{{ $errors->first('amount') }}</span><br>
                            // @endif
                            <div id="re"></div>
                        </div>
                        <div class="row p-1">
                            <p style="padding: 0px;font-size:14px;margin:0px">Min Stake 1</p>
                        </div>

                        <div class="row justify-content-between">
                            <a class="" style="font-size: 14px">Odds:</a>
                            <input type="text" name="total" class="col-md-4 px-0 total_odds"
                                style="border:none" id="total" value="${total}">
                        </div>
                        <div class="row justify-content-between">
                            <a class="" style="font-size: 14px">Tax:</a>
                            <input type="text" name="tax" class="col-md-4 px-0" style="border:none"
                                id="tax" value="-Ksh ">
                        </div>
                        <div class="row justify-content-between">
                            <a class="" style="font-size: 14px">Total PayOut:</a>
                            <input type="text" name="totalAmount" class="col-md-4 px-0" style="border:none"
                                id="totalAmount" value="Ksh ">
                        </div>
                        <div class="row justify-content-between">
                            <a class="" style="font-size: 14px">Final pay:</a>
                            <input type="text" name="finalpay" class="col-md-4 px-0" style="border:none"
                                id="finalpay" value="Ksh ">
                        </div>
                        <!-- </div> -->
                        <div class="row p-0">
                            <div class="col-md-12 p-0">
                                
                                <?php
							if(session('user')){
								foreach(session('user') as $d){
							?>
                                <a href={{ url('bet/' . $d->id) }}><input type="submit" name="placeBet"
                                        style="background-color: #9ce800;color: black"
                                        class="btn font-weight-bold form-control" value="PLACE BET"></a>
                                <?php 
									}}else{
									?>
                                <a href={{ url('bet') }}><input type="submit" name="placeBet"
                                        style="background-color: #9ce800;color: black"
                                        class="btn font-weight-bold form-control" value="PLACE BET"></a>
                                <?php }?>
                                </form>
                            </div>
                        </div>
                        {{-- the other codes --}}
                    </div>
                </div>
            </div>
            `;
            }
            $('#betslip_side').empty(); // Clears previous content
            $('#betslip_side').append(html);
        }
        // click on first team
        $('.team1').on('click', function(e) {
            e.preventDefault();
            var game_id_odds = $(this).attr('id').replace('team1', '');
            var game_id_odds_split = game_id_odds.split('/');
            var game_id = game_id_odds_split[0];
            var game_odds = game_id_odds_split[1]
            $.ajax({
                url: 'add/' + game_id,
                method: 'GET',
                data: {
                    _token: "{{ csrf_token() }}", // CSRF token for security
                    choice: '1',
                    odds: game_odds
                },
                success: function(data) {
                    updateBetside();
                    // alert(data)
                    $('.cart-count').text(data.cart_count);
                }
            })
        })

        // click on draw
        $('.draw').on('click', function(e) {

            e.preventDefault();
            var game_id_odds = $(this).attr('id').replace('draw', '');
            var game_id_odds_split = game_id_odds.split('/');
            var game_id = game_id_odds_split[0];
            var game_odds = game_id_odds_split[1]
            $.ajax({
                url: 'add/' + game_id,
                method: 'GET',
                data: {
                    choice: 'X',
                    odds: game_odds
                },
                success: function(data) {
                    updateBetside();
                    // alert(data)
                    $('.cart-count').text(data.cart_count);
                }
            })
        })
        // click on team2
        $('.team2').on('click', function(e) {

            e.preventDefault();
            var game_id_odds = $(this).attr('id').replace('team2', '');
            var game_id_odds_split = game_id_odds.split('/');
            var game_id = game_id_odds_split[0];
            var game_odds = game_id_odds_split[1]
            $.ajax({
                url: 'add/' + game_id,
                method: 'GET',
                data: {
                    choice: '2',
                    odds: game_odds
                },
                success: function(data) {
                    updateBetside();
                    // alert(data)
                    $('.cart-count').text(data.cart_count);
                }
            })
        })
        // remove from cart
        $('.remove_selection').on('click', function(e) {

            e.preventDefault();
            var id = $(this).attr('game-id');
            console.log(id)
            $.ajax({
                url: 'remove',
                method: 'GET',
                data: {
                    game_id: id
                },
                success: function(data) {
                    updateBetside();
                    // Remove the item from the cart UI
                    $('#cart-item-' + id).remove();

                    // Update the cart count
                    $('.cart-count').text(data.cart_count);

                }
            })
        })

        // update cart count evry time
        function updateCartCount() {
            $.ajax({
                url: '/cart/count', // URL to fetch cart count
                type: 'GET', // Method type
                success: function(data) {
                    // Update the cart count in the frontend
                    $('.cart-count').text(data
                        .cartCount); // Assuming you have an element with id="cart-count"
                    console.log(data.cartCount)
                    $('.total_odds').val(data.odds);
                    console.log(data.odds)
                    console.log(data)
                    localStorage.setItem('cart_details', JSON.stringify(data.cart));
                }
            });
        }

        // Call the function periodically, e.g., every 5 seconds
        // setInterval(updateCartCount, 500);

        // Also call it whenever an item is added/removed to update in real-time
        $('.team1, .remove_selection, .team2, .draw').on('click', function(e) {
            e.preventDefault();
            console.log('function called')
            updateCartCount();
            updateBetside();
        });
        // load the updateBetside function on load
        window.onload = updateBetside;

        // setInterval(updateBetside, 500);


        $('#gamesForm').on('click', function() {
            // e.preventDefault();
            document.getElementById("first").style.backgroundColor = "lawngreen";
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

    function search() {
        document.getElementById("search").style.display = 'block';
    }
    document.getElementById("num").addEventListener("input", multiPly);

    function multiPly() {
        document.getElementById("change").innerHTML = "20";
    }

    // function update(){
    // 	let text = document.getElementById("num").value;
    // 	document.getElementById("re").innerText = text;
    // }
    num.oninput = changeSpan;

    function changeSpan() {
        re.innerText = num.value;
    }

    function Check() {
        document.getElementById("desktop").style.display = 'none';
        document.getElementById("checkout").style.display = 'block';

    }
</script>
<script src={{ asset('bootstrap/js/bootstrap.min.js') }}></script>
<script src={{ asset('bootstrap/popper/popper.min.js') }}></script>
<script src={{ asset('bootstrap/js/bootstrap.js') }}></script>

</html>
