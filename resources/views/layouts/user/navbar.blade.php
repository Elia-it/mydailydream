      {{-- <nav id="sidebar">
                <!-- Sidebar Content -->
                <div class="sidebar-content">
                    <!-- Side Header -->
                    <div class="content-header content-header-fullrow bg-black-op-10">
                        <div class="content-header-section text-center align-parent">
                            <!-- Close Sidebar, Visible only on mobile screens -->
                            <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                            <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-l" data-toggle="layout" data-action="sidebar_close">
                                <i class="fa fa-times text-danger"></i>
                            </button>
                            <!-- END Close Sidebar -->

                            <!-- Logo -->
                            <div class="content-header-item">
                                <a class="link-effect font-w700" href="">
                                    <i class="si si-fire text-primary"></i>
                                    <span class="font-size-xl text-dual-primary-dark">code</span><span class="font-size-xl text-primary">base</span>
                                </a>
                            </div>
                            <!-- END Logo -->
                        </div>
                    </div>
                    <!-- END Side Header -->

                    <!-- Side Main Navigation -->
                    <div class="content-side content-side-full">
                        <!-- --}}
                        {{-- Mobile navigation, desktop navigation can be found in #page-header

                        If you would like to use the same navigation in both mobiles and desktops, you can use exactly the same markup inside sidebar and header navigation ul lists
                        --> --}}
                        {{-- <ul class="nav-main">


                              @guest
                                <li>
                                <a href="{{ route('login') }}">{{__('Login')}}

                                </a>
                                @if (Route::has('register'))
                                        <li>
                                            <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                @endif
                              @else
                                <a class="active" href="/home">Home
                                </a>
                            </li>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#">
                                    <i class="si si-puzzle"></i>{{Auth::user()->first_name}}
                                </a>
                                <ul>
                                    <li>
                                        <a href="/profile">Profile</a>
                                    </li>
                                    <li>
                                      <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li> --}}
                                    {{-- <li>
                                        <a class="nav-submenu" data-toggle="nav-submenu" href="#">Dropdown</a>
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)">Link #1</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">Link #2</a>
                                            </li>
                                        </ul>
                                    </li> --}}
                                {{-- </ul>
                            </li>
                            <li class="nav-main-heading">Vital</li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="si si-wrench"></i>Page
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="si si-wrench"></i>Page
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="si si-wrench"></i>Page
                                </a>
                            </li>
                          @endguest
                        </ul>
                    </div>
                    <!-- END Side Main Navigation -->
                </div>
                <!-- Sidebar Content -->
            </nav>
            <!-- END Sidebar -->
 --}}




{{-- ----------------- ----------------- ----------------- ----------------- ----------------- ----------------- ----------------- ----------------- -----------------

DESKTOP

---------------------------------- ----------------- ----------------- ----------------- ----------------- ----------------- ----------------- -----------------  --}}


                  <!-- Header -->
                  <header id="page-header">
                    <!-- Header Content -->
                    <div class="content-header">
                        <!-- Right Section -->
                        <div class="content-header-section">
                            <!-- Logo -->
                            <div class="content-header-item">
                                <a class="link-effect font-w700 mr-5" href="/home">
                                    {{-- <i class="si si-fire text-primary"></i> --}}
                                    <span class="font-size-xl text-dual-primary-dark">MyDaily</span><span class="font-size-xl text-primary">Dream</span>
                                </a>
                            </div>
                            <!-- END Logo -->
                        </div>
                        <!-- END Right Section -->

                        <!-- Left Section -->
                        <div class="content-header-section">
                            <!-- Header Navigation -->




                      <!--
                      Desktop Navigation, mobile navigation can be found in #sidebar

                      If you would like to use the same navigation in both mobiles and desktops, you can use exactly the same markup inside sidebar and header navigation ul lists
                      If your sidebar menu includes headings, they won't be visible in your header navigation by default
                      If your sidebar menu includes icons and you would like to hide them, you can add the class 'nav-main-header-no-icons'
                      -->
                      <ul class="nav-main-header nav-main-header-no-icons">

                        @guest
                          <a href="{{route('login')}}">{{__('Login')}}

                          </a>
                          @if (Route::has('register'))
                                  <li>
                                      <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                  </li>
                          @endif
                        @else



                          <li>
                              <a class="active" href="/home">Home
                              </a>
                          </li>
                          <li>
                              <a href="/dream/create">MyDream
                              </a>
                          </li>
                          {{-- <li>
                              <a href="javascript:void(0)">
                                  <i class="si si-wrench"></i>Page
                              </a>
                          </li> --}}
                          <li>
                              <a class="nav-submenu" data-toggle="nav-submenu" href="#">
                                  <i class="si si-puzzle"></i>{{Auth::user()->first_name}}
                              </a>
                              <ul>
                                <li>
                                    @if(Auth::user()->role->role == "admin")
                                      <a href="/adminpanel">Admin Panel</a>
                                    @endif
                                </li>
                                  <li>
                                      <a href="/profile/{{Auth::user()->id}}">Profile</a>
                                  </li>

                                  <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                  </li>

                              </ul>
                          </li>

                          @endguest

                      </ul>
                      <!-- END Header Navigation -->

                      <!-- Color Themes (used just for demonstration) -->
                      <!-- Themes functionality initialized in Codebase() -> uiHandleTheme() -->
                      <div class="btn-group mr-5" role="group">
                          <button type="button" class="btn btn-circle btn-dual-secondary" id="page-header-themes-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fa fa-paint-brush"></i>
                          </button>
                          <div class="dropdown-menu min-width-150" aria-labelledby="page-header-themes-dropdown">
                              <h6 class="dropdown-header text-center">Color Themes</h6>
                              <div class="row no-gutters text-center">
                                  <div class="col-4 mb-5">
                                      <a class="text-default" data-toggle="theme" data-theme="default" href="javascript:void(0)">
                                          <i class="fa fa-2x fa-circle"></i>
                                      </a>
                                  </div>
                                  <div class="col-4 mb-5">
                                      <a class="text-elegance" data-toggle="theme" data-theme="{{asset('/css/themes/elegance.css')}}" href="javascript:void(0)">
                                          <i class="fa fa-2x fa-circle"></i>
                                      </a>
                                  </div>
                                  <div class="col-4 mb-5">
                                      <a class="text-pulse" data-toggle="theme" data-theme="{{asset('/css/themes/pulse.css')}}" href="javascript:void(0)">
                                          <i class="fa fa-2x fa-circle"></i>
                                      </a>
                                  </div>
                                  <div class="col-4 mb-5">
                                      <a class="text-flat" data-toggle="theme" data-theme="{{asset('/css/themes/flat.css')}}" href="javascript:void(0)">
                                          <i class="fa fa-2x fa-circle"></i>
                                      </a>
                                  </div>
                                  <div class="col-4 mb-5">
                                      <a class="text-corporate" data-toggle="theme" data-theme="{{asset('/css/themes/corporate.css')}}" href="javascript:void(0)">
                                          <i class="fa fa-2x fa-circle"></i>
                                      </a>
                                  </div>
                                  <div class="col-4 mb-5">
                                      <a class="text-earth" data-toggle="theme" data-theme="{{asset('/css/themes/earth.css')}}" href="javascript:void(0)">
                                          <i class="fa fa-2x fa-circle"></i>
                                      </a>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- END Color Themes -->

                      <!-- Open Search Section -->
                      <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                      <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="header_search_on">
                          <i class="fa fa-search"></i>
                      </button>
                      <!-- END Open Search Section -->

                      <!-- Toggle Sidebar -->
                      <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                      <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                          <i class="fa fa-navicon"></i>
                      </button>
                      <!-- END Toggle Sidebar -->

                  </div>
                  <!-- END Left Section -->
              </div>
              <!-- END Header Content -->

              <!-- Header Search -->
              <div id="page-header-search" class="overlay-header">
                  <div class="content-header content-header-fullrow">
                      <form>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <!-- Close Search Section -->
                                  <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                                  <button type="button" class="btn btn-square btn-secondary px-15" data-toggle="layout" data-action="header_search_off">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <!-- END Close Search Section -->
                              </div>
                              <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                              <div class="input-group-append">
                                  <button type="submit" class="btn btn-square btn-secondary px-15">
                                      <i class="fa fa-search"></i>
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
              <!-- END Header Search -->

              <!-- Header Loader -->
              <div id="page-header-loader" class="overlay-header bg-primary">
                  <div class="content-header content-header-fullrow text-center">
                      <div class="content-header-item">
                          <i class="fa fa-sun-o fa-spin text-white"></i>
                      </div>
                  </div>
              </div>
              <!-- END Header Loader -->
          </header>
          <!-- END Header -->
