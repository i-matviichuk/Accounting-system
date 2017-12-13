<div class="header-top">
    <!-- container -->
    <div class="container">
        <!--       <div class="social w3-agileitsicons">
                  <ul>
                      <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                      <li><a class="twt" href="#"><i class="fa fa-twitter" aria-hidden="true"></i> </a></li>
                      <li><a class="drbl" href="#"><i class="fa fa-linkedin" aria-hidden="true"></i> </a></li>
                      <li><a class="be" href="#"><i class="fa fa-dribbble" aria-hidden="true"></i> </a></li>
                  </ul>
              </div> -->
        <div class="w3layouts-details">
            <ul>
                <li><a href="mailto:vocnuft@gmail.com"><span class="glyphicon glyphicon-envelope"
                                                             aria-hidden="true"></span>vocnuft@gmail.com</a></li>
                <li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>(+1) 000 123 456789</li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- //container -->
</div>
<!-- //header-top -->
<!-- header -->
<div class="header">
    <!-- container -->
    <div class="container">
        <div class="header-bottom">
            <div class="w3ls-logo">
                <h1><a href="/">Система обліку</a></h1>
                <h2><span>академічної успішності студентів ВоК НУХТ</span></h2>
            </div>
            <div class="header-top-right">
                {{--<form action="#" method="post">--}}
                {{--<input type="text" name="Search" placeholder="Search" required="">--}}
                {{--<input type="submit" value="">--}}
                {{--<div class="clearfix"> </div>--}}
                {{--</form>--}}
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="top-nav">
            <nav class="navbar navbar-default">
                <div class="container">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">Menu
                    </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="home-icon"><a href="/"><span class="fa fa-mortar-board"
                                                                aria-hidden="true"></span></a></li>
                        <li><a @yield('home') href="/">Головна</a>
                        @auth
                        <!-- <li><a @yield ('profile') href="{{ url('/profile/' . Auth::user()->id ) }}">Моя сторінка</a></li> -->
                        @role('admin')
                        <li><a @yield('users') href="/users">Користувачі</a></li>
                        <li><a @yield('groups') href="/groups">Групи</a></li>
                        <li><a @yield('professions') href="/professions">Спеціальності</a></li>
                        @endrole
                        @role('operator')
                        <li><a @yield('users') href="/users">Користувачі</a></li>
                        <li><a @yield('groups') href="/groups">Групи</a></li>
                        <li><a @yield('professions') href="/professions">Спеціальності</a></li>
                        @endrole
                        @role('teacher')
                        <li><a @yield('users') href="/users">Користувачі</a></li>
                        <li><a @yield('groups') href="/groups">Групи</a></li>
                        <li><a @yield('professions') href="/professions">Спеціальності</a></li>
                        @endrole
                        @role('student')
                        {{--@if(Auth::user()->group != NULL)--}}
                            <li><a @yield('marks') href="{{route('marks', Auth::user()->id)}}">Оцінки</a></li>
                            <li><a @yield('visitings') href="#">Відвідування</a></li>
                        {{--@endif--}}
                        @endrole
                        @endauth
                        @if (!Auth::check())
                            <li style="margin-left: 70% !important;" class="login w3">
                                <div id="loginContainer"><a style="padding: 0;" href="#" id="loginButton"><span
                                                style="padding: 1.5em;"><i class="fa fa-sign-in" aria-hidden="true"></i> Увійти</span></a>
                                    <div id="loginBox">
                                        <form id="loginForm" action="{{route('login')}}" method="post">
                                            {{ csrf_field() }}
                                            <fieldset id="body">
                                                <fieldset>
                                                    <label for="login">Login</label>
                                                    <input type="text" name="login" id="login" required="" autofocus>
                                                    @if ($errors->has('login'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('login') }}</strong>
                                                    </span>
                                                    @endif
                                                </fieldset>
                                                <fieldset>
                                                    <label for="password">Password</label>
                                                    <input type="password" name="password" id="password">
                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                    @endif
                                                </fieldset>
                                                <input type="submit" id="login" value="Увійти">
                                                <label for="checkbox"><input type="checkbox" id="checkbox"> <i>Remember
                                                        me</i></label>
                                            </fieldset>
                                            <div style="display: flex; justify-content: space-around;">
                                                <span><a href="#">Forgot your password?</a></span>
                                                {{--<span><a href="/register">Register</a></span>--}}
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @else
                            {{--<li style="margin-left: 20% !important;" class="login w3">--}}
                            {{--<div id="loginContainer"><a id="loginButton"><span>{{Auth::user()->name}}</span></a>--}}
                            {{--<div id="loginBox">--}}
                            {{--<form id="loginForm" action="{{ route('logout') }}" method="post">--}}
                            {{--{{ csrf_field() }}--}}
                            {{--<fieldset id="body">--}}
                            {{--<input type="submit" id="login" value="Sign out">--}}
                            {{--</fieldset>--}}
                            {{--</form>--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            {{--</li>--}}
                        @role('student')
                            <li @yield('profile') style="font-size: 16px; margin-left: 42% !important;"
                                class="dropdown w3-agile login w3"><a href="#" data-toggle="dropdown" role="button"
                                                                      aria-haspopup="true" aria-expanded="true">
                                    {{Auth::user()->name}} {{Auth::user()->lastname}}
                                    <span class="fa fa-cog dropdown-toggle"><span class="caret"></span></span></a>
                                <ul class="dropdown-menu">
                                    <li><a @yield ('profile') href="{{ url('/profile/' . Auth::user()->id ) }}"
                                           style="font-size: 16px"><i class="fa fa-user" aria-hidden="true"> Моя
                                                сторінка</i></a></li>
                                    <!-- <li><a href="/add_article"><i class="fa fa-user" aria-hidden="true"> Add article</i></a></li> -->
                                    <!-- <li><a href="#">Edit profile</a></li> -->
                                    <li role="separator" class="divider w3-agile"></li>
                                    <li>
                                        <form id="loginForm" action="{{ route('logout') }}" method="post">
                                            {{ csrf_field() }}
                                            <input style="font-size: 14px" type="submit" id="login" value="Sign out">
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endrole
                            @role('admin')
                            <li @yield('profile') style="font-size: 16px; margin-left: 30% !important;"
                                class="dropdown w3-agile login w3"><a href="#" data-toggle="dropdown" role="button"
                                                                      aria-haspopup="true" aria-expanded="true">
                                    {{Auth::user()->name}} {{Auth::user()->lastname}}
                                    <span class="fa fa-cog dropdown-toggle"><span class="caret"></span></span></a>
                                <ul class="dropdown-menu">
                                    <li><a @yield ('profile') href="{{ url('/profile/' . Auth::user()->id ) }}"
                                           style="font-size: 16px"><i class="fa fa-user" aria-hidden="true"> Моя
                                                сторінка</i></a></li>
                                    <li role="separator" class="divider w3-agile"></li>
                                    <li>
                                        <form id="loginForm" action="{{ route('logout') }}" method="post">
                                            {{ csrf_field() }}
                                            <input style="font-size: 14px" type="submit" id="login" value="Sign out">
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endrole
                            @role('operator')
                            <li @yield('profile') style="font-size: 16px; margin-left: 30% !important;"
                                class="dropdown w3-agile login w3"><a href="#" data-toggle="dropdown" role="button"
                                                                      aria-haspopup="true" aria-expanded="true">
                                    {{Auth::user()->name}} {{Auth::user()->lastname}}
                                    <span class="fa fa-cog dropdown-toggle"><span class="caret"></span></span></a>
                                <ul class="dropdown-menu">
                                    <li><a @yield ('profile') href="{{ url('/profile/' . Auth::user()->id ) }}"
                                           style="font-size: 16px"><i class="fa fa-user" aria-hidden="true"> Моя
                                                сторінка</i></a></li>
                                    <!-- <li><a href="/add_article"><i class="fa fa-user" aria-hidden="true"> Add article</i></a></li> -->
                                    <!-- <li><a href="#">Edit profile</a></li> -->
                                    <li role="separator" class="divider w3-agile"></li>
                                    <li>
                                        <form id="loginForm" action="{{ route('logout') }}" method="post">
                                            {{ csrf_field() }}
                                            <input style="font-size: 14px" type="submit" id="login" value="Sign out">
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endrole
                            @role('teacher')
                            <li @yield('profile') style="font-size: 16px; margin-left: 30% !important;"
                                class="dropdown w3-agile login w3"><a href="#" data-toggle="dropdown" role="button"
                                                                      aria-haspopup="true" aria-expanded="true">
                                    {{Auth::user()->name}} {{Auth::user()->lastname}}
                                    <span class="fa fa-cog dropdown-toggle"><span class="caret"></span></span></a>
                                <ul class="dropdown-menu">
                                    <li><a @yield ('profile') href="{{ url('/profile/' . Auth::user()->id ) }}"
                                           style="font-size: 16px"><i class="fa fa-user" aria-hidden="true"> Моя
                                                сторінка</i></a></li>
                                    <!-- <li><a href="/add_article"><i class="fa fa-user" aria-hidden="true"> Add article</i></a></li> -->
                                    <!-- <li><a href="#">Edit profile</a></li> -->
                                    <li role="separator" class="divider w3-agile"></li>
                                    <li>
                                        <form id="loginForm" action="{{ route('logout') }}" method="post">
                                            {{ csrf_field() }}
                                            <input style="font-size: 14px" type="submit" id="login" value="Вийти">
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endrole
                        @endif
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </nav>
        </div>
    </div>
    <!-- //container -->
</div>
<!-- //header