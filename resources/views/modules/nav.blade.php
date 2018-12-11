<header class="header-area">
    <!-- Top Header Area -->
    <div class="top-header-area bg-img bg-overlay" style="background-image: url(img/bg-img/header.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-between">
                <div class="col-12 col-sm-12">
                    <h3>FooooooooooD</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar Area -->
    <div class="bueno-main-menu" id="sticker">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="buenoNav">          
                        <div id="toggler">                         
                        </div>
                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>
                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="/photos">Home</a></li>
        @if(Auth::check())
            <li><a href="/photos/create">New Post</a></li>
            <li>
                {{ Auth::user()->name }}
                <ul class="dropdown">
                    <li>
                        <form method='POST' id='logout' action='/logout'>
                            {{ csrf_field() }}
                            <a href='#' onClick='document.getElementById("logout").submit();'>
                             Logout</a>
                        </form>
                    </li>
                </ul>
            </li>
        @else

            <a href="/login">Login</a>            
        @endif

                            </ul>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>    
</header>
