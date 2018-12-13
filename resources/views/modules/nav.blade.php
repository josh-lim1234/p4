<header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header-area bg-img bg-overlay" style="background-image: url(/img/bg-img/header.jpg);">
        </div>

        <!-- Logo Area -->
        <div class="logo-area">
            <a href="/photos"><img src="/img/core-img/logo.png" alt=""></a>
        </div>

        <!-- Navbar Area -->
<div class="bueno-main-menu" id="sticker">
    <div class="classy-nav-container breakpoint-off">
        <div class="container">
            <!-- Menu -->
            <nav class="classy-navbar justify-content-between" id="buenoNav">
                <!-- Menu -->
                <div class="classy-menu">

                    <!-- Close Button -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="/photos">Home</a>
                            </li>
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
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
