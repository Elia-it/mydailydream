<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="no-focus">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>MyDailyDream</title>

        <meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Icons -->
        <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
        <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

        <!-- Fonts and Styles -->
        @yield('css_before')
        <style>
          body{
            margin-top: 100px;
          }
        </style>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
        <link rel="stylesheet" id="css-main" href="{{ asset ('/css/codebase.css') }}">

        <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="{{ mix('/css/themes/corporate.css') }}"> -->
        @yield('css_after')

        <!-- Scripts -->
        <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
    </head>
    <body>
        <!-- Page Container -->
        <!--
            Available classes for #page-container:

        GENERIC

            'enable-cookies'                            Remembers active color theme between pages (when set through color theme helper Template._uiHandleTheme())

        SIDEBAR & SIDE OVERLAY

            'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
            'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
            'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
            'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
            'sidebar-inverse'                           Dark themed sidebar

            'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
            'side-overlay-o'                            Visible Side Overlay by default

            'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

            'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

        HEADER

            ''                                          Static Header if no class is added
            'page-header-fixed'                         Fixed Header

        HEADER STYLE

            ''                                          Classic Header style if no class is added
            'page-header-modern'                        Modern Header style
            'page-header-inverse'                       Dark themed Header (works only with classic Header style)
            'page-header-glass'                         Light themed Header with transparency by default
                                                        (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
            'page-header-glass page-header-inverse'     Dark themed Header with transparency by default
                                                        (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

        MAIN CONTENT LAYOUT

            ''                                          Full width Main Content if no class is added
            'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
            'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
        -->
        <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-fixed main-content-boxed">
            <!-- Side Overlay-->
                <!-- END Side Header -->

                <!-- Side Content -->

                <!-- END Side Content -->

            <!-- END Side Overlay -->

            <!-- Sidebar -->
            <!--
                Helper classes

                Adding .sidebar-mini-hide to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
                Adding .sidebar-mini-show to an element will make it visible (opacity: 1) when the sidebar is in mini mode
                    If you would like to disable the transition, just add the .sidebar-mini-notrans along with one of the previous 2 classes

                Adding .sidebar-mini-hidden to an element will hide it when the sidebar is in mini mode
                Adding .sidebar-mini-visible to an element will show it only when the sidebar is in mini mode
                    - use .sidebar-mini-visible-b if you would like to be a block when visible (display: block)
            -->
            <nav id="sidebar">
                <!-- Sidebar Content -->
                <div class="sidebar-content">
                    <!-- Side Header -->
                    <div class="content-header content-header-fullrow px-15">
                        <!-- Mini Mode -->
                        <div class="content-header-section sidebar-mini-visible-b">
                            <!-- Logo -->
                            <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                                <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                            </span>
                            <!-- END Logo -->
                        </div>
                        <!-- END Mini Mode -->

                        <!-- Normal Mode -->
                        <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                            <!-- Close Sidebar, Visible only on mobile screens -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                                <i class="fa fa-times text-danger"></i>
                            </button>
                            <!-- END Close Sidebar -->
                            <div class="content-header-item">
                              {{-- <a href="" style="font-size:90%"><i class="fa fa-chevron-left fa-2x"></i></a> --}}
                              <a class="link-effect font-w700 mr-5" href="{{ url()->previous() }}"><i class="fa fa-chevron-left fa-2x" style="font-size:150%; position: absolute; right:18px; top:1%" title="Go Back"></i></a>
                              {{-- <a href="" style="font-size:90%"><i class="fa fa-chevron-right fa-2x"></i></a> --}}
                            </div>
                            <!-- Logo -->
                            <div class="content-header-item">
                                <a class="link-effect font-w700" href="/home">

                                    <span class="font-size-xl text-dual-primary-dark">MyDaily</span><span class="font-size-xl text-primary">Dream</span>
                                </a>
                            </div>
                            <!-- END Logo -->
                        </div>
                        <!-- END Normal Mode -->
                    </div>
                    <!-- END Side Header -->

                    <!-- Side User -->
                    <div class="content-side content-side-full content-side-user px-10 align-parent">
                        <!-- Visible only in mini mode -->
                        <div class="sidebar-mini-visible-b align-v animated fadeIn">
                            <img class="img-avatar" @if(Auth::user()->userattachment->checkImg())  src="{{asset(Auth::user()->userattachment->path_avatar)}}" @else src="{{url("profiles/avatars/" . Auth::user()->userattachment->path_avatar . "") }}"  @endif alt="">
                        </div>
                        <!-- END Visible only in mini mode -->

                        <!-- Visible only in normal mode -->
                        <div class="sidebar-mini-hidden-b text-center">
                            <a class="img-link" href="javascript:void(0)">
                                <img class="img-avatar" @if(Auth::user()->userattachment->checkImg()) src="{{asset(Auth::user()->userattachment->path_avatar)}}" @else src="{{url("profiles/avatars/" . Auth::user()->userattachment->path_avatar . "") }}"  @endif alt="">
                            </a>
                            <ul class="list-inline mt-10">
                                <li class="list-inline-item">
                                    <a class="link-effect text-dual-primary-dark font-size-sm font-w600 text-uppercase" href="{{route('admin.user.edit', Auth::user()->id)}}">{{Auth::user()->first_name . " " . Auth::user()->last_name}} </a>
                                </li>
                                {{-- <li class="list-inline-item">
                                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                    <a class="link-effect text-dual-primary-dark" data-toggle="layout" data-action="sidebar_style_inverse_toggle" href="javascript:void(0)">
                                        <i class="si si-drop"></i>
                                    </a>
                                </li> --}}
                                <li class="list-inline-item">
                                    <a class="link-effect text-dual-primary-dark" href="{{route('logout')}}">
                                        <i class="si si-logout"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- END Visible only in normal mode -->
                    </div>
                    <!-- END Side User -->

                    <!-- Side Navigation -->
                    <div class="content-side content-side-full">
                        <ul class="nav-main">
                            <li>
                                <a class="{{ request()->is('admin_pages/dashboard/dashboard') ? ' active' : '' }}" href="{{route('admin.dashboard')}}">
                                    <i class="si si-cup"></i><span class="sidebar-mini-hide">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-main-heading">
                                <span class="sidebar-mini-visible">VR</span><span class="sidebar-mini-hidden">Data</span>
                            </li>
                            <li class="{{ request()->is('pages/*') ? ' open' : '' }}">
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-bulb"></i><span class="sidebar-mini-hide">Data</span></a>
                                <ul>
                                  <li>
                                    <a class="{{ request()->is('admin_pages/users/index') ? ' active' : ''}}" href="{{route('users.table')}}">Users</a>
                                  </li>
                                    <li>
                                        <a class="{{ request()->is('admin_pages/emotions/index') ? ' active' : '' }}" href="{{route('admin.emotion.index')}}">Emotions</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('admin_pages/techniques/index') ? ' active' : '' }}" href="{{route('admin.technique.index')}}">Techniques</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('admin_pages/moods/index') ? ' active' : '' }}" href="{{route('admin.mood.index')}}">Moods</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('admin_pages/colors/index') ? ' active' : '' }}" href="{{route('admin.color.index')}}">Colors</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('admin_pages/tags/index') ? ' active' : '' }}" href="{{route('admin.tag.index')}}">Tags</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('admin_pages/types/index') ? ' active' : '' }}" href="{{route('admin.type.index')}}">Types</a>
                                    </li>
                                </ul>
                            </li>



                            {{-- <li class="nav-main-heading">
                                <span class="sidebar-mini-visible">VR</span><span class="sidebar-mini-hidden">Route</span>
                            </li>
                            <li class="{{ request()->is('pages/*') ? ' open' : '' }}">
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-bulb"></i><span class="sidebar-mini-hide">Examples</span></a>
                                <ul>
                                    <li>
                                        <a class="{{ request()->is('pages/datatables') ? ' active' : '' }}" href="/pages/datatables">DataTables</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('pages/slick') ? ' active' : '' }}" href="/pages/slick">Slick Slider</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('pages/blank') ? ' active' : '' }}" href="/pages/blank">Blank</a>
                                    </li>
                                </ul>
                            </li> --}}
                            <li class="nav-main-heading">
                                <span class="sidebar-mini-visible">MR</span><span class="sidebar-mini-hidden">More</span>
                            </li>
                            <li>
                                <a href="{{route('home')}}">
                                    <i class="si si-globe"></i><span class="sidebar-mini-hide">Go to MyDailyDreams</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END Side Navigation -->
                </div>
                <!-- Sidebar Content -->
            </nav>
            <!-- END Sidebar -->
            <!-- Header -->
            @include('layouts.admin.navbar')
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                @yield('content')

                <button class="btn btn-lg btn-circle btn-outline-info mr-5 mb-5" onclick="gotopFunction()" id="btnGoToTop" title="Go to top"><i class="fa fa-arrow-up"></i></button>
            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="opacity-0">
                <div class="content py-20 font-size-sm clearfix">
                    {{-- <div class="float-right">
                        Crafted with <i class="fa fa-heart text-pulse"></i> by <a class="font-w600" href="#" target="_blank">pixelcave</a>
                    </div> --}}
                    <div class="float-left">
                        <a class="font-w600" href="#" target="_blank">MyDailyDreams</a> &copy; <span class="js-year-copy"></span>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        <!-- Codebase Core JS -->
        <script src="{{ asset ('js/codebase.app.js') }}"></script>

        <!-- Laravel Scaffolding JS -->
        <!-- <script src="{{ mix('js/laravel.app.js') }}"></script> -->

        <script>



        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
          if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            $('#btnGoToTop').fadeIn("slow");
          } else {
            $('#btnGoToTop').fadeOut("slow");
          }
        }

        function gotopFunction() {
          document.body.scrollTop = 0;
          document.documentElement.scrollTop = 0;
        }
        </script>

        @yield('js_after')
    </body>
</html>
