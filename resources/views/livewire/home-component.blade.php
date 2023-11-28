<div>
    <style>
        .nav ul {
        margin: 0;
        padding: 0;
        list-style: none;
        }

        .nav {
        text-align: center;
        }

        .nav ul {
        display: inline-block;
        vertical-align: top;
        font-size: 14px;
        }

        .nav ul li {
        position: relative;
        float: left;
        }

        .nav ul li + li {
        margin-left: 1px;
        }

        .nav ul li a {
        background: rgb(0, 0, 0);
        display: inline-block;
        color: #fff;
        text-decoration: none;
        cursor: pointer;
        padding: 11px 20px;
        -webkit-transition: all 0.1s ease-in;
        -o-transition: all 0.1s ease-in;
        transition: all 0.1s ease-in;
        }

        .nav ul li > ul {
        display: none;
        position: absolute;
        width: 150px;
        top: 100%;
        left: -1px;
        z-index: 1;
        text-align: left;
        }

        .nav ul li > ul li {
        float: none;
        margin: 0;
        }

        .nav ul li > ul li a {
        display: block;
        border-top: 1px solid #000;
        }

        .nav ul li > ul li a:hover {
        border-top: 1px solid #000;
        background: #000;
        }

        .nav ul li:hover a, .nav ul li.active a {
        background: #000;
        }

        .nav ul li.active {
        pointer-events: none;
        }
    </style>
    <div class="navbar navbar-expand-sm header-menu">
        <div class="hamburger slide-my-btn navbar-nav">
            <div class="hamburger__container ">
              <div class="hamburger__inner"></div>
              <div class="hamburger__hidden"></div> 
            </div>
        </div>
        <h3 class="nav-brand menu-header-c">
            <img class="logo" src="{{asset('./assets/image/logo/logo.png')}}" alt="">
           <span class="logo-c">BCM Bank</span> 
        </h3>
        <button type="button" class="icon-button inbox-btn">
             <span class="material-icons">notifications</span>
             @auth
                 @if($notifications->count() > 0)
                     <span class="icon-button__badge noti-amount">{{$notifications->count()}}</span>
                 @endif
             @endauth
        </button>
    </div> 
    <div class="header"> 
        <div class="menu-container">
            <button class="btn float-end text-white slide-my-btn"><b>X</b></button>
            @guest
                <div class="list-group  slide-login">
                    <a href="{{route('login')}}" class="list-group-item btn btn-primary bg-primary">Login</a>
                </div>
            @endguest
            @auth
                <div class="slide-menu-header mt-3 mb-4">
                    <div class="user-icon"><i class="fa fa-user"></i></div>
                    <h2 class="user-name mt-2">{{auth()->user()->name}}</h2>
                    <h5 class="amount">{{auth()->user()->amount}}<span>Kyat</span></h5>
                    <h5 class="user-level"> @lang('en.level') ?</h5>
                </div>
            @endauth
            <div class="list-group ">
                @auth
                    <a class="list-group-item menu-list profile-btn"><i id="menu-icon" class="fa fa-user"></i><span class="slide-menu-content"> @lang('en.profile') </span> </a>
                @endauth
                
                <a href="" class="list-group-item menu-list"><i id="menu-icon" class="fa-solid fa-money-bill-1-wave"></i><span class="slide-menu-content"><del>@lang('en.fees')</del></span></a>
                
                <nav class="nav">
                    <ul class="navigation">
                      <li><i id="menu-language-icon" class="fa-solid fa-language"></i><a href="javascript:void(0);">{{ Config::get('languages')[App::getLocale()] }}</a>
                        <ul>
                            @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                     <li><a href="{{ route('lang.switch', $lang) }}"> {{$language}}</a></li>   
                                @endif
                            @endforeach
                        </ul>
                      </li>
                    </ul>
                </nav>                
                <a href="" class="list-group-item menu-list"><i id="menu-icon" class="fa-solid fa-question"></i><span class="slide-menu-content"><del>@lang('en.help')</del></span></a>
                <a href="" class="list-group-item menu-list"><i id="menu-icon" class="fa-solid fa-book"></i><span class="slide-menu-content"><del>@lang('en.tutorials')</del></span></a>
                <a href="" class="list-group-item menu-list"><i id="menu-icon" class="fa-solid fa-scale-balanced"></i><span class="slide-menu-content"><del>@lang('en.terms & conditions')</del></span></a>
                <a href="" class="list-group-item menu-list"><i id="menu-icon" class="fa-solid fa-gear"></i><span class="slide-menu-content"><del>@lang('en.settings')</del></span></a>
                @auth
                    <form method="POST" action="{{url('/logot')}}">
                        @csrf
                        <button type="submit" class="list-group-item menu-list"><i id="menu-icon" class="fa-solid fa-right-from-bracket"></i><span class="slide-menu-content">@lang('en.logout')</span></button>
                    </form>
                @endauth
            </div>
            <div class="menu-footer">
                <p>@lang('en.version 0.1')</p>
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
                        <h3 class="profile-user-name">{{auth()->user()->name}}
                            @if(auth()->user()->position == 'agent')
                                <small class="badge bg-success rounded-pill " style="font-size: 12px">@lang('en.agent')</small>
                            @elseif(auth()->user()->position == 'user')
                                <small class="badge bg-primary rounded-pill " style="font-size: 12px">@lang('en.user')</small>
                            @endif
                        </h3>
                        <div class="input-group">
                            <input id="txt" class="profile-amount me-2" type="password" value="{{auth()->user()->amount}}" disabled id="password">
                            <b class="mt-1 me-1">Kyat</b>
                            <i class="fa fa-eye-slash" id="toggle-password"></i>
                        </div>
                        <h6 class="profile-user-level">@lang('en.level') ?</h6>
                    </div>
                </div>
            </div>
        @endauth
    </div>
    <div class="content-body">
        <div class="container-fluid ">
            <div class="row exchange-tools">
                <div class="col">
                    <button class="btn btn-white send-money">
                        <div>
                            <i class="fa-solid fa-money-bill exchange-tools-icon"></i>
                            <p class="exchange-tools-content">@lang('en.send money')</p>
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
                            <p class="exchange-tools-content">@lang('en.history')</p>
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
                            <img class="function-img" src="{{asset('./assets/image/icons/coming soon.png')}}" alt="" srcset="">                        
                            <p class="exchange-tools-content">@lang('en.cahs in/out')</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="functions row">
                <div class="col-4" >
                    <a href="" class="btn btn-white">
                        <div>
                            <img class="function-img" src="{{asset('./assets/image/icons/coming soon.png')}}" alt="" srcset="">
                            <p class="exchange-tools-content">@lang('en.topup')</p>
                        </div>
                    </a>
                </div>
                <div class="col-4" >
                    <button class="btn btn-white shopping-btn">
                        <div>
                            <img class="function-img shop-icon" src="{{asset('./assets/image/icons/online-shopping.png')}}" alt="" srcset="">                            
                            <p class="exchange-tools-content">@lang('en.shopping')</p>
                        </div>
                    </button>
                </div>
                <div class="col-4" >
                    <button href="" class="btn btn-white ticket-btn">
                        <div>
                            <img class="function-img" src="{{asset('./assets/image/icons/coming soon.png')}}" alt="" srcset="">                       
                            <p class="exchange-tools-content">@lang('en.Tickets')</p>
                        </div>
                    </button>
                </div>
                <div class="col-4" >
                    <a href="" class="btn btn-white">
                        <div>
                            <img class="function-img" src="{{asset('./assets/image/icons/coming soon.png')}}" alt="" srcset="">                        
                            <p class="exchange-tools-content">@lang('en.loan')</p>
                        </div>
                    </a>
                </div>
                <div class="col-4" >
                    <a href="" class="btn btn-white">
                        <div>
                            <img class="function-img" src="{{asset('./assets/image/icons/coming soon.png')}}" alt="" srcset="">                            
                            <p class="exchange-tools-content">@lang('en.online payments')</p>
                        </div>
                    </a>
                </div>
                <div class="col-4" >
                    <a href="" class="btn btn-white">
                        <div>
                            <img class="function-img" src="{{asset('./assets/image/icons/coming soon.png')}}" alt="">                          
                            <p class="exchange-tools-content">@lang('en.more')</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- for send money login condition --}}
        @auth
            {{-- for register phone first --}}
            @if(auth()->user()->phone === Null)
                <div class="send-money-bg">
                </div>
                <div class="for-send-money">
                    <div class="row">
                        <button class="col-2 send-money btn btn-white">X</button>
                        <div class="col text-center">
                            <img class="send-money-h-icon" src="{{asset('./assets/image/icons/dollar.png')}}" alt="">
                            <p class="send-money-h-c">@lang('en.send money')</p>
                        </div>
                        <button class="col-2 btn btn-white"><i class="fa-solid fa-question"></i></button>
                    </div>
                    <div class="p-5">
                        <strong>@lang('en.rymn')</strong>
                        <small>@lang('en.tctp')</small>
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
                            <p class="send-money-h-c">@lang('en.send money')</p>
                        </div>
                        <button class="col-2 btn btn-white"><i class="fa-solid fa-question"></i></button>
                    </div>
                    <form class="send-money-form" action="{{route('transaction')}}">
                        @csrf
                        {{-- receiver --}}
                            <div class="input-group send-money-menu rec-first receiver-btn">
                                <div class="send-money-icon-bg">
                                    <img class="send-money-icon" src="{{asset('./assets/image/icons/user.png')}}" alt="">
                                </div>
                                <div class="send-money-contact" id="final-result-contact">
                                    <strong for="" >@lang('en.recver')</strong>
                                    <p class="text-muted">@lang('en.ephonen')</p>
                                    <input type="hidden" name="phone" value="" required>
                                </div>
                                <div class="send-money-right-arrow">
                                    <span class="float-end">
                                        <img class="send-money-icon-right" src="{{asset('./assets/image/icons/right-arrow.png')}}" alt="">
                                    </span>
                                </div>
                            </div>
                        {{-- amount --}}
                            <div class="input-group send-money-menu amount-btn">
                                <div class="send-money-icon-bg">
                                    <img class="send-money-icon" src="{{asset('./assets/image/icons/dollar.png')}}" alt="">
                                </div>
                                <div class="send-money-contact" id="final-amount">
                                    <strong for="" >@lang('en.amo')</strong>
                                    <p class="text-muted">@lang('en.eamount')</p>
                                    <input type="hidden" name="amount" value="">
                                </div>
                                <div class="send-money-right-arrow">
                                    <span class="float-end">
                                        <img class="send-money-icon-right" src="{{asset('./assets/image/icons/right-arrow.png')}}" alt="">
                                    </span>
                                </div>
                            </div>
                        {{-- paymethod --}}
                            <div class="input-group send-money-menu">
                                <div class="send-money-icon-bg">
                                    <img class="send-money-icon" src="{{asset('./assets/image/icons/more.png')}}" alt="">
                                </div>
                                <div class="send-money-contact">
                                    <strong for="" >@lang('en.mpm')</strong>
                                    <p class="text-muted">@lang('en.cpt')</p>
                                    <input type="hidden" name="amount">
                                </div>
                                <div class="send-money-right-arrow">
                                    <span class="float-end">
                                        <img class="send-money-icon-right" src="{{asset('./assets/image/icons/right-arrow.png')}}" alt="">
                                    </span>
                                </div>
                            </div>
                        <hr>
                        <button type="submit" class="btn btn-secondary send-money-btn " disabled>@lang('en.confim')</button>
                    </form>

                    <div class="mess-info-bg"></div>
                    <div class="mess-info">
                        <div class="bubble">@lang('en.ctrpnf')</div>                
                    </div>
                </div>

                {{-- for receiver --}}
                <div class="receiver">
                    <div class="sticky-top">
                        <div class="row receiver-header ">
                            <div class="col-2">
                                <button class="btn receiver-btn">
                                    <img src="{{asset('./assets/image/icons/left-arrow.png')}}" width="20" height="20" alt="">
                                </button>
                            </div>
                            <div class="col">
                                <button class="btn history-h-t">
                                    @lang('en.recver')
                                </button>
                            </div>
                        </div>
                        <div class="container">
                            <div class="sticky-top">
                                <div class="search-contact bg-info">
                                    <label for=""><b>@lang('en.recver')</b></label>
                                    <div class="input-group">
                                        <img src="{{asset('./assets/image/icons/pngwing.com.png')}}" width="30" alt="">
                                        <input type="text" class="form-control bg-info" id="search-receiver" name="search" placeholder="09-XXX-XXXXXX-XX">
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        {{-- this place will be fill with JQuery after ajax request   --}}
                        <div id="buttonContainer"></div>
                    </div>
                </div>
                {{-- for amount  --}}
                <div class="transaction-amount">
                    <div class="row transaction-amount-header">
                        <div class="col-2">
                            <button class="btn amount-btn">
                                <img src="{{asset('./assets/image/icons/left-arrow.png')}}" width="20" height="20" alt="">
                            </button>
                        </div>
                        <div class="col">
                            <button class="btn history-h-t">
                                @lang('en.amo')
                            </button>
                        </div>
                    </div>
                    <div class="container">
                        <div class="search-contact bg-info" id="one">
                            <form id="form-one">
                                <label for="" class="amount-one"><b>@lang('en.amo')</b></label>
                                <div class="input-group">
                                    <img src="{{asset('./assets/image/icons/coin.png')}}" width="30" alt="">
                                    <input type="text" class="form-one form-control bg-info" id="search-amount-one" name="search" placeholder="10000 kyat" required>
                                    <button type="submit" class="btn btn-secondary">@lang('en.continue')</button>
                                </div>
                            </form>
                        </div>

                        {{-- for error messages --}}
                        <div class="message"></div>
                        {{--  --}}

                        <div class="row">
                            <div class="col text-center">
                                <button class="btn col kyat-btn btn-1">5,000</button>
                            </div>
                            <div class="col text-center">
                                <button class="btn col kyat-btn btn-2">10,000</button>
                            </div>
                            <div class="col text-center">
                                <button class="btn col kyat-btn btn-3">20,000</button>
                            </div>
                            <div class="col text-center">
                                <button class="btn col kyat-btn btn-4">50,000</button>
                            </div>
                        </div>
                        <div class="d-flex ms-5 mt-3">
                            <img src="{{asset('./assets/image/logo/logo.png')}}" width="40" alt="">
                            <div class="my-auto ps-2">
                                <p class="my-auto my-amount">@lang('en.balance') <strong>{{auth()->user()->amount}}</strong> kyat</p>
                            </div>
                        </div>
                        <hr>
                        <div id="buttonContainer"></div>
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
                    <p><b>@lang('en.igymntr')</b></p>
                    <p>@lang('en.or')</p>
                    <p><b>@lang('en.lwtd')</b></p>
                </div>
                <a href="{{route('login')}}" class="btn btn-primary pls-login-btn mt-4">@lang('en.log')</a>
                <a href="{{route('register')}}" class="btn btn-white pls-register-btn mt-2">@lang('en.reg')</a>
            </div>
        @endguest
    {{-- for history --}}
        @auth
            <div class="history" id="history">
                <div class="row sticky-top" style="background: rgb(168, 168, 168)">
                    <div class="col-2">
                        <button class="btn history-btn">
                            <img src="{{asset('./assets/image/icons/left-arrow.png')}}" width="20" height="20" alt="">
                        </button>
                    </div>
                    <div class="col">
                        <button class="btn history-h-t">
                            @lang('en.history')
                        </button>
                    </div>
                </div>
                @foreach($history as $item)
                    @if(auth()->user()->id == $item->receiver_user_id)
                        <div class="list-group">
                            <div class="list-group-item">
                                <div>{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</div>
                                <div class="row">
                                    <div class="col-1 m-auto text-center">
                                        <img class="history-icon-1" src="{{asset('./assets/image/icons/income.png')}}" alt="">
                                    </div>
                                    <div class="col">
                                        <strong>@lang('en.rm')</strong>
                                        <div>
                                            From- {{$item->sender->phone}}
                                        </div>
                                        <p>Transaction ID - {{$item->transaction_id}}</p>
                                        <small>{{$item->created_at->diffForHumans()}}</small>
                                    </div>
                                    <div class="col-3">
                                        <p>+<span class="text-success">{{$item->amount}}</span> Kyat</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(auth()->user()->id == $item->transfer_user_id)
                        @if($item->transaction_type == 'Local Transaction')
                            <div class="list-group">
                                <div class="list-group-item">
                                    <div>{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</div>
                                    <div class="row">
                                        <div class="col-1 m-auto text-center">
                                            <img class="history-icon" src="{{asset('./assets/image/icons/coin.png')}}" alt="">
                                        </div>
                                        <div class="col">
                                            <strong>@lang('en.send money')</strong>
                                            <div>To- {{$item->receiver->phone}}</div>
                                            <p>Transaction ID - {{$item->transaction_id}}</p>
                                            <small>{{$item->created_at->diffForHumans()}}</small>

                                        </div>
                                        <div class="col-3">
                                            <p> <span class="text-danger">-{{$item->amount}}</span>  Kyat</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                        <div class="list-group">
                            <div class="list-group-item">
                                <div>{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</div>
                                <div class="row">
                                    <div class="col-1 m-auto text-center">
                                        <img class="history-icon" src="{{asset('./assets/image/icons/coin.png')}}" alt="">
                                    </div>
                                    <div class="col">
                                        <strong>@lang('en.onlind payments')</strong>
                                        <p>Transaction ID - {{$item->transaction_id}}</p>
                                        <small>{{$item->created_at->diffForHumans()}}</small>

                                    </div>
                                    <div class="col-3">
                                        <p> <span class="text-danger">-{{$item->amount}}</span>  Kyat</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endif
                    @endif
                @endforeach
            </div>
        @endauth
    {{-- for shopping --}}
        @auth
            <div class="shopping-bg">
            </div>
            <div class="shopping">
                <button class="btn shopping-btn"><strong>X</strong></button>
                <div class="row mx-5 my-2">
                    <a class="btn col" href="https://emophiso.000webhostapp.com/" target="_blank">
                        <img src="{{asset('assets/image/icons/shop.png')}}" width="120" alt=""><br>
                        <b>Code Online-shop</b>
                    </a>
                    <a class="btn col" href="">
                        <img src="{{asset('assets/image/icons/coming soon.png')}}" width="120" alt=""><br>
                        <b>Amazon</b>
                    </a>
                    <a class="btn col" href="">
                        <img src="{{asset('assets/image/icons/coming soon.png')}}" width="120" alt=""><br>
                        <b>Coda-shop</b>
                    </a>
                    <a class="btn col" href="">
                        <img src="{{asset('assets/image/icons/coming soon.png')}}" width="120" alt=""><br>
                        <b>Unique</b>
                    </a>
                </div>
            </div>
        @endauth        
        @guest
            <div class="pls-login-bg">
            </div>
            <div class="pls-login">
                <button class="btn send-money btn"><strong>X</strong></button>
                <div class="text-center mt-5">
                    <h3>Mingalarbar</h3>
                    <p><b>@lang('en.igymntr')</b></p>
                    <p>@lang('en.or')</p>
                    <p><strong>@lang('en.reg') </strong> @lang('en.lwtd')</p>
                </div>
                <a href="{{route('login')}}" class="btn btn-primary pls-login-btn mt-4">@lang('en.log')</a>
                <a href="{{route('register')}}" class="btn btn-white pls-register-btn mt-2">@lang('en.reg')</a>
            </div>
        @endguest

    {{-- for profile --}}
        @auth
            <div class="history" id="profile">
                <div class="row" style="background: rgb(168, 168, 168)">
                    <div class="col-1">
                        <button class="btn profile-btn">
                            <img src="{{asset('./assets/image/icons/left-arrow.png')}}" width="20" height="20" alt="">
                        </button>
                    </div>
                    <div class="col text-center">
                        <button class="btn ">
                            <img src="{{asset('./assets/image/logo/logo.png')}}" width="30" alt="">
                            <strong class="pay-head">BCM Pay</strong>
                        </button>
                    </div>
                </div>
            </div>
        @endauth
        
    {{-- for INBOX --}}        
        @auth
            <div class="inbox" id="history">
                <div class="row sticky-top" style="background: rgb(168, 168, 168)">
                    <div class="col-2">
                        <button class="btn inbox-btn">
                            <img src="{{asset('./assets/image/icons/left-arrow.png')}}" width="20" height="20" alt="">
                        </button>
                    </div>
                    <div class="col">
                        <button class="btn history-h-t">
                            Inbox
                        </button>
                    </div>
                </div>
                @auth
                    @foreach($notifications as $item)
                        @if($item->data['type'] == 'system')
                            <div class="list-group noti{{$item->id}}">
                                <div class="list-group-item">
                                    <div class="ms-3">{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</div>
                                    <div class="row">
                                        <div class="col ms-3">
                                            <strong>{{$item->data['title']}}</strong>
                                            <div>
                                                {{$item->data['message']}}
                                            </div>
                                            <small class="text-success">{{$item->created_at->diffForHumans()}}</small>
                                        </div>
                                        <div class="col-3">
                                            <p></p>
                                            <button class="btn markas-btn" data-id="{{$item->id}}">Mark as read</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($item->data['type'] == 'transfer')
                            <div class="list-group noti{{$item->id}}">
                                <div class="list-group-item">
                                    <div class="ms-3">{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</div>
                                    <div class="row">
                                        <div class="col ms-3">
                                            <strong>{{$item->data['title']}}</strong>
                                            <div>
                                                {{$item->data['amount']}} kyat send to <a href="">#TNF-000{{$item->data['receiver']}}</a> 
                                            </div>
                                            <small class="text-success">{{$item->created_at->diffForHumans()}}</small>
                                        </div>
                                        <div class="col-3">
                                            <p></p>
                                            <button class="btn markas-btn" data-id="{{$item->id}}">Mark as read</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($item->data['type'] == 'receive')
                            <div class="list-group noti{{$item->id}}">
                                <div class="list-group-item">
                                    <div class="ms-3">{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</div>
                                    <div class="row">
                                        <div class="col ms-3">
                                            <strong>{{$item->data['title']}}</strong>
                                            <div>
                                                {{$item->data['amount']}} kyat send to <a href="">#TNF-000{{$item->data['receiver']}}</a> 
                                            </div>
                                            <small class="text-success">{{$item->created_at->diffForHumans()}}</small>
                                        </div>
                                        <div class="col-3">
                                            <p></p>
                                            <button class="btn markas-btn" data-id="{{$item->id}}">Mark as read</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($item->data['type'] == 'online_payment')
                            <div class="list-group noti{{$item->id}}">
                                <div class="list-group-item">
                                    <div class="ms-3">{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</div>
                                    <div class="row">
                                        <div class="col ms-3">
                                            <strong>{{$item->data['title']}}</strong>
                                            <div>
                                                <b class="text-danger">{{$item->data['amount']}}</b> kyat was <span class="text-danger">reduced</span> from your account balance
                                            </div>
                                            <small class="text-success">{{$item->created_at->diffForHumans()}}</small>
                                        </div>
                                        <div class="col-3">
                                            <p></p>
                                            <button class="btn markas-btn" data-id="{{$item->id}}">Mark as read</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endauth
            </div>
        @endauth
 
    {{-- for my qr --}}
        @auth
            <div class="my-qr">
                <div class="row" style="background: rgb(168, 168, 168)">
                    <div class="col-2">
                        <button class="btn my-qr-btn">
                            <img src="{{asset('./assets/image/icons/left-arrow.png')}}" width="20" height="20" alt="">
                        </button>
                    </div>
                    <div class="col">
                        <button class="btn history-h-t">
                            @lang('en.recver')
                        </button>
                    </div>
                </div>
                <div class="container">
                    <div class="qr-body bg-dark mx-5 mt-5 p-5"> 
                        <p class="text-muted">{{auth()->user()->name}}({{auth()->user()->phone}})</p>
                        <p class="text-white text-center"><strong>Scan to pay me</strong></p>
                        <div class="qr">
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
    {{-- footer --}}
        <div class="footer">
            <div class="row footer-menu">
                <div class="col footer-menu-btn">
                    <a href="" class="btn">
                        <div>
                            <img class="footer-menu-icon" src="{{asset('./assets/image/icons/logo-home-png-7412.png')}}" alt="">
                            <p class="footer-menu-content">@lang('en.home')</p>
                        </div>
                    </a>
                </div>
                @auth
                    <div class="col footer-menu-btn">
                        <button class="btn my-qr-btn">
                            <div>
                                <img class="footer-menu-icon" src="{{asset('./assets/image/icons/coming soon.png')}}" alt="">
                                <p class="footer-menu-content">My QR</p>
                            </div>
                        </button>
                    </div>
                @endauth
                       <div class="col footer-menu-btn">
                    <a href="{{route('chat.index')}}" class="btn btn-white">
                        <div class="notification-badge">
                            @auth
                                @if($message->count() > 0)
                                    <span class="badge">{{$message->count()}}</span>
                                @endif
                            @endauth
                            <img class="" src="{{asset('assets/image/icons/message.png')}}" width="50" alt="Message Icon">
                        </div>  
                    </a>
                </div>
                {{-- <div class="col footer-menu-btn">                  
                    <button class="btn btn-white inbox-btn">
                        <div class="inbox-icons">
                            <img class="footer-menu-icon" src="{{asset('./assets/image/icons/—Pngtree—email vector icon_3876244.png')}}" alt=""> 
                            @auth
                                @if($notifications->count() > 0)
                                    <sup class="bg-danger text-white noti-amount" style="border-radius: 50%;padding:3px 4px"></sup>                            
                                @else
                                @endif
                            @endauth
                            <p class="footer-menu-content">Inbox</p>
                        </div>
                    </button>
                </div> --}}
            </div>
        </div>
    @if(session('message'))
        <div class="information alert alert-danger row">
            <div class="col-1">        
                <img class="info-img-1" src="{{asset('./assets/image/icons/exclimation.png')}}" alt="">
            </div>
            <div class="col">        
                <div class="info-message mt-1">
                    {{session('message')}}
                </div>
            </div>
            <div class="col-1">        
                <img class="info-img-2" src="{{asset('./assets/image/icons/cross.png')}}" alt="">
            </div>
        </div>
    @endif
    @if(session('info'))
        <div class="information alert alert-success row">
            <div class="col-1">        
                <img class="info-img-1" src="{{asset('./assets/image/icons/greenmark.png')}}" alt="">
            </div>
            <div class="col">        
                <div class="info-message mt-1">
                    {{session('info')}}
                </div>
            </div>
            <div class="col-1">        
                <img class="info-img-2" src="{{asset('./assets/image/icons/cross.png')}}" alt="">
            </div>
        </div>
    @endif
    
    {{-- //   for amount auto resize in main profile  --}}
    @auth
        <script>
            function resizable (el, factor) {
                var int = Number(factor) || 7.7;
                function resize() {el.style.width = ((el.value.length+1) * int) + 'px'}
                var e = 'keyup,keypress,focus,blur,change'.split(',');
                for (var i in e) el.addEventListener(e[i],resize,false);
                resize();
                }
                resizable(document.getElementById('txt'),11);
        </script>
    @endauth

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script type="text/javascript">

        // Language switch
        $('.lang-en').click(function(en){
            window.location.href = '/change-language/' + en;
        })  
        $('.lang-mm').click(function(my){
            window.location.href = '/change-language/' + my;
        })
        $(".navigation li").hover(function() {
            var isHovered = $(this).is(":hover");
            if (isHovered) {
                $(this).children("ul").stop().slideDown(300);
            } else {
                $(this).children("ul").stop().slideUp(300);
            }
            });

            
            // read single noti
            $('.markas-btn').click(function(){
                var id = $('.markas-btn').attr('data-id');
                $.ajax({
                    url: '{{URL::to('readnoti')}}/' +id,
                    method: 'get',
                    data: { $id: id },
                    success: function (response) {
                        $('.noti'+id).remove();
                        console.log(response.data)
                        if(response.data == 1){
                            $('.noti-amount').remove();
                        }
                        else{
                            $('.noti-amount').html(response.data - 1);
                        }
                }})
            })
            // to check first element go first in send money
            let firstElementClicked = false;

            //  for receiver in the Send money feature
            $('#search-receiver').keyup(function() {
                var searchText = $(this).val();
                $.ajax({
                    url : '{{URL::to('search')}}',
                    method: 'get',
                    data: { searchText: searchText },
                    success: function(response) {
                        var buttons = '';
                        $.each(response.data, function(index, item) {
                            // buttons += '<button class="myButton" data-id="' + item.id + '">' + item.name + '</button>';
                            if(item.position == "agent"){
                                buttons += '<div id="result-contact" class="btn result-contact d-flex p-3 mx-5 mb-2" data-id = "'+ item.id + '" >'+
                                                '<div class="profile-icon-bg my-auto">'+
                                                    '<i class="fa fa-user">'+'</i>'+
                                                '</div>'+
                                                '<div class="phone-num ms-3 my-auto">'+
                                                    '<small class="my-auto">'+ item.phone +'</small>'+
                                                    '<small class="badge bg-success rounded-pill ms-2" style="font-size: 10px">Agent</small>'+
                                                    '<p class="my-auto">'+'<strong>'+ item.name +'</strong>'+'</p>'+
                                                '</div>'+
                                            '</div>';   
                            }else{
                                buttons += '<div id="result-contact" class="btn result-contact d-flex p-3 mx-5 mb-2" data-id = "'+ item.id + '" >'+
                                                '<div class="profile-icon-bg my-auto">'+
                                                    '<i class="fa fa-user">'+'</i>'+
                                                '</div>'+
                                                '<div class="phone-num ms-3 my-auto">'+
                                                    '<small class="my-auto">'+ item.phone +'</small>'+
                                                    '<small class="badge bg-primary rounded-pill ms-2" style="font-size: 10px">User</small>'+
                                                    '<p class="my-auto">'+'<strong>'+ item.name +'</strong>'+'</p>'+
                                                '</div>'+
                                            '</div>';   
                            }
                        });
                        $('#buttonContainer').html(buttons);
                        firstElementClicked = true;
                    },
                });
            });

            // receiver btn
            $(".receiver-btn").click(function(){
            $(".receiver").toggle("slide", {direction: 'right'})
            });
            // amount btn
            $(".amount-btn").click(function(){
                if(firstElementClicked === true){
                    $(".transaction-amount").toggle("slide", {direction: 'right'});
                }else{
                    $('.mess-info-bg').fadeIn();
                    $('.bubble').show();
                }
            });
            $('.mess-info-bg').click(function(){
                $('.mess-info-bg').fadeOut();
                $('.bubble').hide();
            })

            // for 
            $('#buttonContainer').on('click', '.result-contact', function() {
                var id = $(this).attr("data-id")
                $.ajax({
                    url: '{{URL::to('process')}}/' +id,
                    method: 'get',
                    data: { $id: id },
                    success: function (response) {
                        var result = '';
                        var result1 = '';
                        var result2 = '';
                        // alert(response.data);
                        $('.receiver').hide();
                        $('.transaction-amount').show();
                        result = '<div>'+
                                    '<strong for="" >'+response.data.name + '</strong>' +
                                    '<p class="text-muted">' + response.data.phone + '</p>' +
                                    '<input type="hidden" class="hidden-form-one" name="phone" wire:model="phoneNub">'+
                                    '</div>';
                        result1 =  '<div class="semi-final-amount" data-id="'+ response.data.id + '">'+
                                        '<strong for="" >Amount</strong>'+
                                        '<p class="text-muted">Enter Amount</p>'+
                                    '</div>';

                        $('#final-result-contact').html(result);
                        $('#final-amount').html(result1);
                        $('.hidden-form-one').val(response.data.phone);
                    },
                });
            });


            $('#final-amount').on('click','.semi-final-amount',function(){
                var id = $(this).attr("data-id");
                $.ajax({
                    url: '{{URL::to('process')}}/' +id,
                    method: 'get',
                    data: { $id: id },
                    success: function (response) {
                        var rsl = '';
                    }
                });
            });
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

        </script>

</div>
