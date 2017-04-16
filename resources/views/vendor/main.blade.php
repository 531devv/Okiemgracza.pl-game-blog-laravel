@include('vendor._head')
<body>
<!--header-->
<div class="header" >
    <div class="top-header" >
        <div class="container">
            <div class="top-head" >
                <ul class="header-in">
                    <li><a href="/contact">Kontakt</a></li>
                </ul>
                <div class="search">
                    <form>
                        <input type="text" value="Szukaj frazy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Szukaj frazy';}" >
                        <input type="submit" value="" >
                    </form>
                </div>

                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!---->

    <div class="header-top">
        <div class="container">
            <div class="head-top">
                <div class="logo">

                    <h1><a href="/">Okiemgracza.pl</a></h1>

                </div>
                <div class="top-nav">
                    <span class="menu"><img src="images/menu.png" alt=""> </span>
                    <ul>
                        <li class="active"><a class="color1" href="/"  >Strona Główna</a></li>
                        <li><a class="color1" href="/blog"  >Nowości</a></li>
                        @if(Auth::check())
                        <li class="dropdown">
                         <a href="/" class="dropdown-toggle color1" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false">Witaj {{Auth::user()->name}}<span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="{{route('posts.index')}}">Panel redaktora głównego</a></li>
                            <li role="separator" class="divider"></li>
                           <li><a href="{{route('logout')}}">Wyloguj</a></li>
                          </ul>
                        </li>
                      @else
                        <li><a class="color1" href="{{route('login')}}">Zaloguj się</a></li>
                      @endif
                        <li><a class="color1" href="/contact" >Kontakt</a></li>

                        <div class="clearfix"> </div>
                    </ul>
                    <!--script-->
                    <script>
                        $("span.menu").click(function(){
                            $(".top-nav ul").slideToggle(500, function(){
                            });
                        });
                    </script>

                </div>

                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
@include('vendor._messages')
@yield('content')
@yield('scripts')
</div>
@include('vendor._footer')
