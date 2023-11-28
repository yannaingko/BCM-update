<div>
    <div class="navbar navbar-expand-sm header-menu">
        <div class="hamburger">
            <div class="hamburger__container">
              <div class="hamburger__inner"></div>
              <div class="hamburger__hidden"></div> 
            </div>
        </div>
        <h3 class="nav-brand menu-header-c">
            <img class="logo" src="{{asset('./assets/image/logo/logo.png')}}" alt="">
           <span class="logo-c">BCM Bank</span> 
        </h3>
    </div> 
    <div class="header"> 
        <div class="menu-container">
            @guest
                <div class="list-group  slide-login">
                    <a href="{{route('login')}}" class="list-group-item btn btn-primary bg-primary">Login</a>
                </div>
            @endguest
            @auth
                <div class="slide-menu-header mt-3 mb-4">
                    <div><span class="user-icon"><i class="fa fa-user"></i></span></div>
                    <h2 class="user-name mt-2">{{auth()->user()->name}}</h2>
                    <h5 class="amount">{{auth()->user()->amount}}<span>Kyat</span></h5>
                    <h5 class="user-level"> Level ?</h5>
                </div>
            @endauth
            <div class="list-group ">
                @auth
                    <a href="" class="list-group-item menu-list"><i id="menu-icon" class="fa fa-user"></i><span class="slide-menu-content">Profile</span> </a>
                @endauth
                <a href="" class="list-group-item menu-list"><i id="menu-icon" class="fa-solid fa-money-bill-1-wave"></i><span class="slide-menu-content">Fees</span></a>
                <a href="" class="list-group-item menu-list"><i id="menu-icon" class="fa-solid fa-question"></i><span class="slide-menu-content">Help</span></a>
                <a href="" class="list-group-item menu-list"><i id="menu-icon" class="fa-solid fa-book"></i><span class="slide-menu-content">Tutorials</span></a>
                <a href="" class="list-group-item menu-list"><i id="menu-icon" class="fa-solid fa-scale-balanced"></i><span class="slide-menu-content">Terms & Conditions</span></a>
                <a href="" class="list-group-item menu-list"><i id="menu-icon" class="fa-solid fa-gear"></i><span class="slide-menu-content">Settings</span></a>
                @auth
                    <form method="POST" action="{{route('logout')}}">
                        @csrf
                        <button type="submit" class="list-group-item menu-list"><i id="menu-icon" class="fa-solid fa-right-from-bracket"></i><span class="slide-menu-content">Logout</span></button>
                    </form>
                @endauth
            </div>
            <div class="menu-footer">
                <p>Version 0.1</p>
            </div>
        </div>
        <div class="menu">
        </div>
        @auth
            <div class="container-fluid main-profile">
                <div class="d-flex ps-5">
                    <div class="profile-icon me-3">
                        <div class="user-icon mx-auto"><i class="fa fa-user"></i></div>
                    </div>
                    <div class="profile-content ">
                        <h3 class="profile-user-name">{{auth()->user()->name}}</h3>
                        <h5 class="profile-amount">{{auth()->user()->amount}} kyat</h5>
                        <h6 class="profile-user-level">LEVEL ?</h6>
                    </div>
                </div>
            </div>
        @endauth
    </div>
    {{-- {!! QrCode::size(100)->backgroundColor(255,90,0)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-8') !!} --}}
    <div class="content-body">
        <div class="container-fluid ">
            <div class="row exchange-tools">
                <div class="col">
                    <button class="btn btn-white send-money">
                        <div>
                            <i class="fa-solid fa-money-bill exchange-tools-icon"></i>
                            <p class="exchange-tools-content">Send Money</p>
                        </div>
                    </button>
                </div>
                <div class="col-1">
                    <div class="outer">
                        <div class="inner"></div>
                    </div>
                </div>
                <div class="col">
                    <button  class="btn btn-white history-btn">
                        <div>
                            <i class="fa-solid fa-clock-rotate-left exchange-tools-icon"></i>                            
                            <p class="exchange-tools-content">History</p>
                        </div>
                    </button>
                </div>
                <div class="col-1">
                    <div class="outer">
                        <div class="inner"></div>
                    </div>
                </div>
                <div class="col">
                    <a href="" class="btn btn-white ">
                        <div>
                            <i class="fa-solid fa-wallet exchange-tools-icon"></i>                            
                            <p class="exchange-tools-content">Cash In/Out</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="functions row">
                <div class="col-4" >
                    <a href="" class="btn btn-white">
                        <div>
                            <img class="function-img" src="{{asset('./assets/image/icons/prepaid.png')}}" alt="" srcset="">
                            <p class="exchange-tools-content">Topup</p>
                        </div>
                    </a>
                </div>
                <div class="col-4" >
                    <a href="" class="btn btn-white">
                        <div>
                            <img class="function-img" src="{{asset('./assets/image/icons/online-shopping.png')}}" alt="" srcset="">                            
                            <p class="exchange-tools-content">Shopping</p>
                        </div>
                    </a>
                </div>
                <div class="col-4" >
                    <a href="" class="btn btn-white">
                        <div>
                            <img class="function-img" src="{{asset('./assets/image/icons/airplane-ticket.png')}}" alt="" srcset="">                       
                            <p class="exchange-tools-content">Tickets</p>
                        </div>
                    </a>
                </div>
                <div class="col-4" >
                    <a href="" class="btn btn-white">
                        <div>
                            <img class="function-img" src="{{asset('./assets/image/icons/personal.png')}}" alt="" srcset="">                        
                            <p class="exchange-tools-content">Loan</p>
                        </div>
                    </a>
                </div>
                <div class="col-4" >
                    <a href="" class="btn btn-white">
                        <div>
                            <img class="function-img" src="{{asset('./assets/image/icons/cashless-payment.png')}}" alt="" srcset="">                            
                            <p class="exchange-tools-content">Online Payments</p>
                        </div>
                    </a>
                </div>
                <div class="col-4" >
                    <a href="" class="btn btn-white">
                        <div>
                            <img class="function-img" src="{{asset('./assets/image/icons/more.png')}}" alt="">                          
                            <p class="exchange-tools-content">More</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- for send money login condition --}}
    @auth
        @if(auth()->user()->phone === Null)
            <div class="send-money-bg">
            </div>
            <div class="for-send-money">
                <div class="row">
                    <button class="col-2 send-money btn btn-white">X</button>
                    <div class="col text-center">
                        <img class="send-money-h-icon" src="{{asset('./assets/image/icons/dollar.png')}}" alt="">
                        <p class="send-money-h-c">Send Money</p>
                    </div>
                    <button class="col-2 btn btn-white"><i class="fa-solid fa-question"></i></button>
                </div>
                <div class="p-5">
                    <strong>Register Your Mobile Number</strong>
                    <small>to continue the process</small>
                    <form class="send-money-form mt-5" wire:submit.prevent="registerPhone" >
                        <div class="input-group">
                            <div class="d-flex btn">
                                <img class="phone-flag me-1" src="{{asset('./assets/image/logo/pngegg.png')}}" width="30" alt="">
                                <small class="my-auto">+95</small>
                            </div>
                            <input class="form-control" type="text" name="phone" wire:model.defer="phone" required>      
                            <button class="btn btn-secondary" type="submit">Go</button>                      
                        </div>
                    </form>
                </div>
            </div>
        @else
            <div class="send-money-bg">
            </div>
            <div class="for-send-money">
                <div class="row">
                    <button class="col-2 send-money btn btn-white">X</button>
                    <div class="col text-center">
                        <img class="send-money-h-icon" src="{{asset('./assets/image/icons/dollar.png')}}" alt="">
                        <p class="send-money-h-c">Send Money</p>
                    </div>
                    <button class="col-2 btn btn-white"><i class="fa-solid fa-question"></i></button>
                </div>
                <form action="" class="send-money-form">
                    <div class="input-group send-money-menu receiver-btn">
                        <div class="send-money-icon-bg">
                            <img class="send-money-icon" src="{{asset('./assets/image/icons/user.png')}}" alt="">
                        </div>
                        <div class="send-money-contact">
                            <strong for="" >Receiver</strong>
                            <p class="text-muted">Enter Phone Number</p>
                            <input type="hidden" name="phone" value="">

                            {{-- @if(Session::has('contact'))
                                <strong for="" >{{Session::get('contact')['name']}}</strong>
                                <p class="text-muted">{{Session::get('contact')['phone']}}</p>
                                <input type="hidden" name="phone" value="{{Session::get('contact')['phone']}}">
                            @else
                                <strong for="" >Receiver</strong>
                                <p class="text-muted">Enter Phone Number</p>
                            @endif --}}
                        </div>
                        <div class="send-money-right-arrow">
                            <span class="float-end">
                                <img class="send-money-icon-right" src="{{asset('./assets/image/icons/right-arrow.png')}}" alt="">
                            </span>
                        </div>
                    </div>
                    <div class="input-group send-money-menu amount-btn">
                        <div class="send-money-icon-bg">
                            <img class="send-money-icon" src="{{asset('./assets/image/icons/dollar.png')}}" alt="">
                        </div>
                        <div style="width: 182px;">
                            <strong for="" >Amount</strong>
                            <p class="text-muted">Enter Amount</p>
                            <input type="hidden" name="amount">
                        </div>
                        <div class="send-money-right-arrow">
                            <span class="float-end">
                                <img class="send-money-icon-right" src="{{asset('./assets/image/icons/right-arrow.png')}}" alt="">
                            </span>
                        </div>
                    </div>
                    <div class="input-group send-money-menu">
                        <div class="send-money-icon-bg">
                            <img class="send-money-icon" src="{{asset('./assets/image/icons/more.png')}}" alt="">
                        </div>
                        <div style="width: 182px;">
                            <strong for="" >More Payment Methods</strong>
                            <p class="text-muted">Choose Payment Type</p>
                            <input type="hidden" name="amount">
                        </div>
                        <div class="send-money-right-arrow">
                            <span class="float-end">
                                <img class="send-money-icon-right" src="{{asset('./assets/image/icons/right-arrow.png')}}" alt="">
                            </span>
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-secondary send-money-btn">Confirm</button>
                </form>
            </div>

            {{-- for receiver --}}
            <div class="receiver">  
                <div class="row receiver-header">
                    <div class="col-2">
                        <button id="prev" class="btn receiver-btn">
                            <img src="{{asset('./assets/image/icons/left-arrow.png')}}" width="20" height="20" alt="">
                        </button>
                    </div>
                    <div class="col">
                        <button class="btn history-h-t">
                            Receiver
                        </button>
                    </div>
                </div>

                <div class="container">
                        <div class="search-contact bg-info">
                            <label for=""><b>Receiver</b></label>
                            <div class="input-group">
                                <img src="{{asset('./assets/image/icons/pngwing.com.png')}}" width="30" alt="">
                                <input type="text" class="form-control bg-info" id="search" name="search" placeholder="09-XXX-XXXXXX-XX">
                            </div>
                        </div>
                        <hr>
                        <div id="buttonContainer"></div>
                        {{-- <form action="{{route('contact-search')}}">
                        <div class="search-contact bg-info">
                            <label for=""><b>Receiver</b></label>
                            <div class="input-group">
                                <img src="{{asset('./assets/image/icons/pngwing.com.png')}}" width="30" alt="">
                                <input type="text" class="form-control bg-info" placeholder="09-XXX-XXXXXX-XX" name="q">
                                <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                        </div>
                    </form> --}}
                    
                    {{-- @if(Session::has('contact'))
                        <a wire:click.prevent="throwId({{Session::get('contact')['id']}})" >
                            <div class="result-contact d-flex p-3 mx-5 mb-2">
                                <div class="profile-icon-bg bg-info my-auto">
                                    <img src="{{asset('./assets/image/icons/user.png')}}" width="30" alt="">
                                </div>
                                <div class="phone-num ms-3 my-auto">
                                    <small class="my-auto">{{Session::get('contact')['phone']}}</small>
                                    <p class="my-auto"><strong>{{Session::get('contact')['name']}}</strong></p>
                                </div>
                            </div>
                        </a>
                    @endif --}}
                </div>
            </div>
        @endif
    @endauth
    @guest
        <div class="pls-login-bg">
        </div>
        <div class="pls-login">
            <button class="send-money btn"><strong>X</strong></button>
            <div class="text-center mt-5">
                <h3>Mingalarbar</h3>
                <p>I guess you may need to <strong>Register</strong></p>
                <p>or</p>
                <p><strong>Login</strong> with this device.</p>
            </div>
            <a href="{{route('login')}}" class="btn btn-primary pls-login-btn mt-4">Login</a>
            <a href="{{route('register')}}" class="btn btn-white pls-register-btn mt-2">Register</a>
        </div>
    @endguest

    {{-- for history --}}
    @auth
        <div class="history">
            <div class="row" style="background: yellow">
                <div class="col-2">
                    <button class="btn history-btn">
                        <img src="{{asset('./assets/image/icons/left-arrow.png')}}" width="20" height="20" alt="">
                    </button>
                </div>
                <div class="col">
                    <button class="btn history-h-t">
                        History
                    </button>
                </div>
            </div>
            <div class="list-group">
                <div class="list-group-item">
                    <div>27 Apr 2023</div>
                    <div class="row">
                        <div class="col-2">
                            <img class="history-icon" src="{{asset('./assets/image/icons/income.png')}}" alt="">
                        </div>
                        <div class="col">
                            <strong>Receive Money</strong>
                            <p>From- 09876512</p>
                            <p>Transaction ID - 123456789</p>
                        </div>
                        <div class="col-3">
                            <p>+6500 Kyat</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="list-group">
                <div class="list-group-item">
                    <div>27 Apr 2023</div>
                    <div class="row">
                        <div class="col-2">
                            <img class="history-icon" src="{{asset('./assets/image/icons/coin.png')}}" alt="">
                        </div>
                        <div class="col">
                            <strong>Send Money</strong>
                            <p>To- 09876512</p>
                            <p>Transaction ID - 123456789</p>
                        </div>
                        <div class="col-3">
                            <p> <span class="text-danger">-12000</span>  Kyat</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
    @guest
        <div class="pls-login-bg">
        </div>
        <div class="pls-login">
            <button class="send-money btn"><strong>X</strong></button>
            <div class="text-center mt-5">
                <h3>Mingalarbar</h3>
                <p>I guess you may need to <strong>Register</strong></p>
                <p>or</p>
                <p><strong>Login</strong> with this device.</p>
            </div>
            <a href="{{route('login')}}" class="btn btn-primary pls-login-btn mt-4">Login</a>
            <a href="{{route('register')}}" class="btn btn-white pls-register-btn mt-2">Register</a>
        </div>
    @endguest

    {{-- for my qr --}}
    @auth
        <div class="my-qr">
            <div class="row" style="background: yellow">
                <div class="col-2">
                    <button class="btn my-qr-btn">
                        <img src="{{asset('./assets/image/icons/left-arrow.png')}}" width="20" height="20" alt="">
                    </button>
                </div>
                <div class="col">
                    <button class="btn history-h-t">
                        Receive
                    </button>
                </div>
            </div>
            <div class="container">
                <div class="qr-body bg-dark mx-5 mt-5 p-5"> 
                    <p class="text-muted">{{auth()->user()->name}}({{auth()->user()->phone}})</p>
                    <p class="text-white text-center"><strong>Scan to pay me</strong></p>
                    <div class="qr">
                        {!! QrCode::size(300)->backgroundColor(255,255,255)->margin(1)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-8') !!}
                    </div>
                </div>
                <div>
                    <div class="pay-logo">
                        <img src="{{asset('./assets/image/logo/logo.png')}}" width="10%" alt="">
                        <strong class="qr-logo my-auto">BCM PAY</strong> 
                    </div>
                </div>
            </div>
        </div>
    @endauth

    <div class="footer">
        <div class="row footer-menu">
            <div class="col footer-menu-btn">
                <a href="" class="btn">
                    <div>
                        <img class="footer-menu-icon" src="{{asset('./assets/image/icons/logo-home-png-7412.png')}}" alt="">
                        <p class="footer-menu-content">Home</p>
                    </div>
                </a>
            </div>
            @auth
                <div class="col footer-menu-btn">
                    <button class="btn my-qr-btn">
                        <div>
                            <img class="footer-menu-icon" src="{{asset('./assets/image/icons/qr-code-21362.png')}}" alt="">
                            <p class="footer-menu-content">My QR</p>
                        </div>
                    </button>
                </div>
            @endauth
            <div class="col footer-menu-btn">
                <a href="" class="btn btn-white">
                    <div>
                        <img class="footer-menu-icon" src="{{asset('./assets/image/icons/qr-code-21360.png')}}" alt="">
                        <p class="footer-menu-content">QR Pay</p>
                    </div>
                </a>
            </div>
            <div class="col footer-menu-btn">
                <a href="" class="btn btn-white">
                    <div>
                        <img class="footer-menu-icon" src="{{asset('./assets/image/icons/—Pngtree—shopping on mobile_5354478.png')}}" alt="">
                        <p class="footer-menu-content">Stores</p>
                    </div>
                </a>
            </div>
            <div class="col footer-menu-btn">
                <a href="" class="btn btn-white">
                    <div>
                        <img class="footer-menu-icon" src="{{asset('./assets/image/icons/—Pngtree—email vector icon_3876244.png')}}" alt="">
                        <p class="footer-menu-content">Inbox</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript">

        $('#search').keyup(function() {
            var searchText = $(this).val();
            $.ajax({
                url : '{{URL::to('search')}}',
                method: 'get',
                data: { searchText: searchText },
                success: function(response) {
                    var buttons = '';
                    $.each(response.data, function(index, item) {
                        // buttons += '<button class="myButton" data-id="' + item.id + '">' + item.name + '</button>';
                        buttons += '<div id="next" class="btn result-contact d-flex p-3 mx-5 mb-2" data-id = "'+ item.id + '" >'+
                                        '<div class="profile-icon-bg my-auto">'+
                                            '<i class="fa fa-user">'+'</i>'+
                                        '</div>'+
                                        '<div class="phone-num ms-3 my-auto">'+
                                            '<small class="my-auto">'+ item.phone +'</small>'+
                                            '<p class="my-auto">'+'<strong>'+ item.name +'</strong>'+'</p>'+
                                        '</div>'+
                                    '</div>';   
                    });
                    $('#buttonContainer').html(buttons);
                },
            });
        });

        $('#buttonContainer').on('click', '.result-contact', function() {
            // var buttonId = $(this).data('id');
            var id = $(this).attr("data-id")
            $.ajax({
                url: '{{URL::to('process')}}/' +id,
                method: 'get',
                data: { $id: id },
                success: function (response) {
                    
                    var result = '';
                    // alert(response.data);
                    // $('.receiver').hide();
                    result = '<div class="send-money-contact">'+
                                '<strong for="" >'+response.data.name + '</strong>' +
                                '<p class="text-muted">' + response.data.phone + '</p>' +
                                '<input type="hidden" name="phone" value="'+ response.data.phone + '">'+
                                '</div>';
                    $('.send-money-contact').html(result);
                },
            });
        });
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

        // {{-- for search contact --}}
        // $('#search').on('keyup',function(){
        //     $value=$(this).val();
        //     $.ajax({
        //         method : 'get',
        //         url : '{{URL::to('search')}}',
        //         data:{'search':$value},
        //         success:function(data){
        //             $('.result-contact-2').html(data);
        //         }
        //     });
        // });

        // // for search contact result btn 
        // $('#result-contact').on('click', function () {
        //     $.ajax({
        //         url: '{{URL::to('process')}}',
        //         method: 'post',
        //         data: {
        //             _token: '{{ csrf_token() }}',
        //         },
        //         success: function (response) {
        //             alert(response.info);
        //         },
        //     });
        // });

    </script>

</div>
