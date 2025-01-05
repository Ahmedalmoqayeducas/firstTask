<header id="header" class=" fixed-top  header-transparent  ">
    <div class="container">

        <div class="logo float-left">
            <h1 class="text-white "><a href="{{ route('home') }}"><img
                        src="
              @if (Route::currentRouteName() == 'home') {{ asset('org/img/logo-avada-business-02.png') }}
              @else {{ asset('org/img/logo-avada-business-01.png') }} @endif
                "></a>
            </h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav class="nav-menu float-right d-none d-lg-block">
            <ul>
                <li class=" @if (Route::currentRouteName() == 'home') active @endif"><a
                        class="  @if (Route::currentRouteName() == 'home') text-light @else text-dark @endif

                        "
                        href="{{ route('home') }}">
                        <h5>

                            Home
                        </h5>
                    </a>
                </li>
                <li class="@if (Route::currentRouteName() == 'activities') active @endif"><a
                        class="@if (Route::currentRouteName() == 'home') text-light
                                @elseif (Route::currentRouteName() == 'activities') text-danger
                                @else text-dark @endif"
                        href="{{ route('activities') }}">
                        <h5>

                            Activities
                        </h5>
                    </a></li>
                <li class="@if (Route::currentRouteName() == 'team') active @endif"><a
                        class="@if (Route::currentRouteName() == 'home') text-light
                    @elseif (Route::currentRouteName() == 'team') text-danger
                    @else text-dark @endif"
                        href="{{ route('team') }}">
                        <h5>

                            Team
                        </h5>
                    </a></li>
                {{-- <li class="@if (Route::currentRouteName() == 'home') active @endif"><a href="blog.html">Blog</a></li> --}}
                <li class="@if (Route::currentRouteName() == 'about') active @endif"><a
                        class="@if (Route::currentRouteName() == 'home') text-light
                    @elseif (Route::currentRouteName() == 'about') text-danger
                    @else text-dark @endif"
                        href="{{ route('about') }}">
                        <h5>

                            About Us
                        </h5>
                       </a>
                </li>


                <li class="pl-5 @if (Route::currentRouteName() == 'contact') active @endif"><a
                        class="@if (Route::currentRouteName() == 'home') text-light
                                @elseif (Route::currentRouteName() == 'contact') text-danger
                                @else text-dark @endif"
                        href="{{ route('contact') }}">
                        <h5>

                            Contact Us
                        </h5>
                         </a>
                </li>
            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header>
