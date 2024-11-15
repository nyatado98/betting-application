    <style>
        #footers {
            position: fixed;
            bottom: 0px;
            z-index: 99;
            height: 80px;
            transition: transform 0.3s ease-in-out;
        }

        .footer-hidden {
            transform: translateY(100%);
        }

        @media (max-width:800px) {
            #footers {
                display: block;
            }
            #user_menu{
                display: none;
            }
        }

        @media (min-width:770px) {
            #footers {
                display: none;
            }
            #user_menu{
                display: block;
            }
        }
    </style>
    <div class="row justify-content-center">
        <div class="container col-md-8 " id="footers" style="background-color: #252a2d;">
            <div class="row" style="flex-wrap: nowrap">
                <div class="col-md-2">
                    <div class="column">
                        <i class="fa fa-bars text-white"></i>
                        <p style="color: white">Menu</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="column">
                        <i class="fa fa-football text-white"></i>
                        <p style="color: white">Sports</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <a href="#passwordReset" data-toggle="modal">
                        <div class="column">
                            <i
                                class="fa fa-list-alt text-white" >&nbsp;&nbsp;&nbsp;<span class="cart-count">{{ count((array) session('cart')) }}</span></i>
                            <p style="color: white">Betslip</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-2">
                    <div class="column">
                        <i class="fa fa-edit text-white"></i>
                        <p style="color: white">Join</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="column" data-toggle="modal"
                    data-target="#menu">
                        <i class="fa fa-user text-white"></i>
                        <p style="color: white">Account</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let lastScrollTop = 0;
        const footer = document.getElementById("footers");

        window.addEventListener("scroll", function() {
            let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

            if (currentScroll > lastScrollTop) {
                // Scrolling down
                footer.classList.add("footer-hidden");
            } else {
                // Scrolling up
                footer.classList.remove("footer-hidden");
            }
            lastScrollTop = currentScroll;
        });
    </script>
