<aside id="side-overlay">
                <!-- Side Header -->
                <div class="content-header content-header-fullrow">
                    <div class="content-header-section align-parent">
                        <!-- Close Side Overlay -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-circle btn-dual-secondary align-v-r" data-toggle="layout" data-action="side_overlay_close">
                            <i class="fa fa-times text-danger"></i>
                        </button>
                        <!-- END Close Side Overlay -->

                        <!-- User Info -->
                        <div class="content-header-item">
                            <a class="img-link mr-5" @if(Auth::user()->userattachment->checkImg()) href="{{asset(Auth::user()->userattachment->path_avatar)}}" @else href="{{url("profiles/avatars/" . Auth::user()->userattachment->path_avatar . "") }}"  @endif>

                                <img class="img-avatar img-avatar32" @if(Auth::user()->userattachment->checkImg()) src="{{asset(Auth::user()->userattachment->path_avatar)}}" @else src="{{url("profiles/avatars/" . Auth::user()->userattachment->path_avatar . "") }}"  @endif alt="">
                            </a>
                            <a class="align-middle link-effect text-primary-dark font-w600" href="{{route('admin.user.edit', auth()->id())}}">{{Auth::user()->first_name . " " . Auth::user()->last_name}}</a>
                        </div>
                        <!-- END User Info -->
                    </div>
                </div>
                <!-- END Side Header -->

                <!-- Side Content -->
                <div class="content-side">
                    <!-- Search -->
                    {{-- <div class="block pull-t pull-r-l">
                        <div class="block-content block-content-full block-content-sm bg-body-light">
                            <form action="be_pages_generic_search.html" method="post">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="side-overlay-search" name="side-overlay-search" placeholder="Search..">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-secondary px-10">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> --}}
                    <!-- END Search -->

                    <!-- Mini Stats -->
                    <div class="block pull-r-l">
                        <div class="block-content block-content-full block-content-sm bg-body-light">
                            <div class="row">
                                <div class="col-4">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Clients</div>
                                    <div class="font-size-h4">460</div>
                                </div>
                                {{-- <div class="col-4">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Sales</div>
                                    <div class="font-size-h4">728</div>
                                </div>
                                <div class="col-4">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Earnings</div>
                                    <div class="font-size-h4">$7,860</div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <!-- END Mini Stats -->

                    <!-- Friends -->
                    <div class="block pull-r-l">
                        <div class="block-header bg-body-light">
                            <h3 class="block-title"><i class="fa fa-fw fa-users font-size-default mr-5"></i>Friends</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                    <i class="si si-refresh"></i>
                                </button>
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                            </div>
                        </div>
                        {{-- <div class="block-content">
                            <ul class="nav-users push">
                                <li>
                                    <a href="be_pages_generic_profile.html">
                                        <img class="img-avatar" src="assets/media/avatars/avatar1.jpg" alt="">
                                        <i class="fa fa-circle text-success"></i> Betty Kelley
                                        <div class="font-w400 font-size-xs text-muted">Photographer</div>
                                    </a>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                    <!-- END Friends -->

                    <!-- Activity -->
                    <div class="block pull-r-l">
                        <div class="block-header bg-body-light">
                            <h3 class="block-title">
                                <i class="fa fa-fw fa-clock-o font-size-default mr-5"></i>Activity
                            </h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                    <i class="si si-refresh"></i>
                                </button>
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                            </div>
                        </div>
                        {{-- <div class="block-content">
                            <ul class="list list-activity">
                                <li>
                                    <i class="si si-wallet text-success"></i>
                                    <div class="font-w600">+$29 New sale</div>
                                    <div>
                                        <a href="javascript:void(0)">Admin Template</a>
                                    </div>
                                    <div class="font-size-xs text-muted">5 min ago</div>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                    <!-- END Activity -->

                    <!-- Profile -->
                    <div class="block pull-r-l">
                        <div class="block-header bg-body-light">
                            <h3 class="block-title">
                                <i class="fa fa-fw fa-pencil font-size-default mr-5"></i>Profile
                            </h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                            </div>
                        </div>
                        {{-- <div class="block-content">
                            <form action="be_pages_dashboard.html" method="post" onsubmit="return false;">
                                <div class="form-group mb-15">
                                    <label for="side-overlay-profile-name">Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="side-overlay-profile-name" name="side-overlay-profile-name" placeholder="Your name.." value="John Smith">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-user"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-15">
                                    <label for="side-overlay-profile-email">Email</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control" id="side-overlay-profile-email" name="side-overlay-profile-email" placeholder="Your email.." value="john.smith@example.com">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-15">
                                    <label for="side-overlay-profile-password">New Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="side-overlay-profile-password" name="side-overlay-profile-password" placeholder="New Password..">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-asterisk"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-15">
                                    <label for="side-overlay-profile-password-confirm">Confirm New Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="side-overlay-profile-password-confirm" name="side-overlay-profile-password-confirm" placeholder="Confirm New Password..">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-asterisk"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-block btn-alt-primary">
                                            <i class="fa fa-refresh mr-5"></i> Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div> --}}
                    </div>
                    <!-- END Profile -->

                    <!-- Settings -->
                    <div class="block pull-r-l">
                        <div class="block-header bg-body-light">
                            <h3 class="block-title">
                                <i class="fa fa-fw fa-wrench font-size-default mr-5"></i>Settings
                            </h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                            </div>
                        </div>
                        {{-- <div class="block-content">
                            <div class="row gutters-tiny">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="side-overlay-settings-status" name="side-overlay-settings-status" value="1" checked>
                                        <label class="custom-control-label" for="side-overlay-settings-status">Online Status</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="side-overlay-settings-public-profile" name="side-overlay-settings-public-profile" value="1">
                                        <label class="custom-control-label" for="side-overlay-settings-public-profile">Public Profile</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="side-overlay-settings-notifications" name="side-overlay-settings-notifications" value="1" checked>
                                        <label class="custom-control-label" for="side-overlay-settings-notifications">Notifications</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="side-overlay-settings-updates" name="side-overlay-settings-updates" value="1">
                                        <label class="custom-control-label" for="side-overlay-settings-updates">Auto updates</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="side-overlay-settings-api-access" name="side-overlay-settings-api-access" value="1" checked>
                                        <label class="custom-control-label" for="side-overlay-settings-api-access">API Access</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="side-overlay-settings-limit-requests" name="side-overlay-settings-limit-requests" value="1">
                                        <label class="custom-control-label" for="side-overlay-settings-limit-requests">API Requests</label>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <!-- END Settings -->
                </div>
                <!-- END Side Content -->
            </aside>
            <!-- END Side Overlay -->





<header id="page-header">
               <!-- Header Content -->
               <div class="content-header">
                   <!-- Left Section -->
                   <div class="content-header-section">
                       <!-- Toggle Sidebar -->
                       <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                       <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="sidebar_toggle">
                           <i class="fa fa-navicon"></i>
                       </button>
                       <!-- END Toggle Sidebar -->

                       <!-- Open Search Section -->
                       <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                       {{-- <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="header_search_on">
                           <i class="fa fa-search"></i>
                       </button> --}}
                       <!-- END Open Search Section -->

                       <!-- Layout Options (used just for demonstration) -->
                       <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                       <div class="btn-group" role="group">
                           <button type="button" class="btn btn-circle btn-dual-secondary" id="page-header-options-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <i class="fa fa-wrench"></i>
                           </button>
                           <div class="dropdown-menu min-width-300" aria-labelledby="page-header-options-dropdown">
                               <h5 class="h6 text-center py-10 mb-10 border-b text-uppercase">Settings</h5>
                               <h6 class="dropdown-header">Color Themes</h6>
                               <div class="row no-gutters text-center mb-5">
                                   <div class="col-2 mb-5">
                                       <a class="text-default" data-toggle="theme" data-theme="{{asset('css/themes/default.css')}}" href="javascript:void(0)">
                                           <i class="fa fa-2x fa-circle"></i>
                                       </a>
                                   </div>
                                   <div class="col-2 mb-5">
                                       <a class="text-elegance" data-toggle="theme" data-theme="{{asset('css/themes/elegance.css')}}" href="javascript:void(0)">
                                           <i class="fa fa-2x fa-circle"></i>
                                       </a>
                                   </div>
                                   <div class="col-2 mb-5">
                                       <a class="text-pulse" data-toggle="theme" data-theme="{{asset('css/themes/pulse.css')}}" href="javascript:void(0)">
                                           <i class="fa fa-2x fa-circle"></i>
                                       </a>
                                   </div>
                                   <div class="col-2 mb-5">
                                       <a class="text-flat" data-toggle="theme" data-theme="{{asset('css/themes/flat.css')}}" href="javascript:void(0)">
                                           <i class="fa fa-2x fa-circle"></i>
                                       </a>
                                   </div>
                                   <div class="col-2 mb-5">
                                       <a class="text-corporate" data-toggle="theme" data-theme="{{asset('css/themes/corporate.css')}}" href="javascript:void(0)">
                                           <i class="fa fa-2x fa-circle"></i>
                                       </a>
                                   </div>
                                   <div class="col-2 mb-5">
                                       <a class="text-earth" data-toggle="theme" data-theme="{{asset('css/themes/earth.css')}}" href="javascript:void(0)">
                                           <i class="fa fa-2x fa-circle"></i>
                                       </a>
                                   </div>
                               </div>
                               <h6 class="dropdown-header">Header</h6>
                               <div class="row gutters-tiny text-center mb-5">
                                   <div class="col-6">
                                       <button type="button" class="btn btn-sm btn-block btn-alt-secondary" data-toggle="layout" data-action="header_fixed_toggle">Fixed Mode</button>
                                   </div>
                                   <div class="col-6">
                                       <button type="button" class="btn btn-sm btn-block btn-alt-secondary d-none d-lg-block mb-10" data-toggle="layout" data-action="header_style_classic">Classic Style</button>
                                   </div>
                               </div>
                               <h6 class="dropdown-header">Sidebar</h6>
                               <div class="row gutters-tiny text-center mb-5">
                                   <div class="col-6">
                                       <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10" data-toggle="layout" data-action="sidebar_style_inverse_off">Light</button>
                                   </div>
                                   <div class="col-6">
                                       <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10" data-toggle="layout" data-action="sidebar_style_inverse_on">Dark</button>
                                   </div>
                               </div>
                               <div class="d-none d-xl-block">
                                   <h6 class="dropdown-header">Main Content</h6>
                                   <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10" data-toggle="layout" data-action="content_layout_toggle">Toggle Layout</button>
                               </div>
                               <div class="dropdown-divider"></div>
                               {{-- <div class="row gutters-tiny text-center">
                                   <div class="col-6">
                                       <a class="dropdown-item mb-0" href="be_layout_api.html">
                                           <i class="si si-chemistry mr-5"></i> Layout API
                                       </a>
                                   </div>
                                   <div class="col-6">
                                       <a class="dropdown-item mb-0" href="be_ui_color_themes.html">
                                           <i class="fa fa-paint-brush mr-5"></i> Color Themes
                                       </a>
                                   </div>
                               </div> --}}
                           </div>
                       </div>
                       <!-- END Layout Options -->
                   </div>
                   <!-- END Left Section -->

                   <!-- Right Section -->
                   <div class="content-header-section">
                       <!-- User Dropdown -->
                       <div class="btn-group" role="group">
                           <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <i class="fa fa-user d-sm-none"></i>
                               <span class="d-none d-sm-inline-block">{{Auth::user()->first_name}}</span>
                               <i class="fa fa-angle-down ml-5"></i>
                           </button>
                           <div class="dropdown-menu dropdown-menu-right min-width-200" aria-labelledby="page-header-user-dropdown">
                               <h5 class="h6 text-center py-10 mb-5 border-b text-uppercase">User</h5>
                               <a class="dropdown-item" href="{{route('admin.user.edit', Auth::user()->id)}}">
                                   <i class="si si-user mr-5"></i> Profile
                               </a>
                               {{-- <a class="dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_inbox.html">
                                   <span><i class="si si-envelope-open mr-5"></i> Inbox</span>
                                   <span class="badge badge-primary">3</span>
                               </a>
                               <a class="dropdown-item" href="be_pages_generic_invoice.html">
                                   <i class="si si-note mr-5"></i> Invoices
                               </a> --}}
                               <div class="dropdown-divider"></div>

                               <!-- Toggle Side Overlay -->
                               <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                               <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                                   <i class="si si-wrench mr-5"></i> Settings
                               </a>
                               <!-- END Side Overlay -->

                               <div class="dropdown-divider"></div>
                               <a class="dropdown-item" href="{{route('logout')}}">
                                   <i class="si si-logout mr-5"></i> Logout
                               </a>
                           </div>
                       </div>
                       <!-- END User Dropdown -->

                       <!-- Notifications -->
                       <div class="btn-group" role="group">
                           <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <i class="fa fa-flag"></i>
                               <span class="badge badge-primary badge-pill">5</span>
                           </button>
                           <div class="dropdown-menu dropdown-menu-right min-width-300" aria-labelledby="page-header-notifications">
                               <h5 class="h6 text-center py-10 mb-0 border-b text-uppercase">Notifications</h5>
                               <ul class="list-unstyled my-20">
                                   <li>
                                       <a class="text-body-color-dark media mb-15" href="javascript:void(0)">
                                           <div class="ml-5 mr-15">
                                               <i class="fa fa-fw fa-check text-success"></i>
                                           </div>
                                           <div class="media-body pr-10">
                                               <p class="mb-0">You’ve upgraded to a VIP account successfully!</p>
                                               <div class="text-muted font-size-sm font-italic">15 min ago</div>
                                           </div>
                                       </a>
                                   </li>
                                   <li>
                                       <a class="text-body-color-dark media mb-15" href="javascript:void(0)">
                                           <div class="ml-5 mr-15">
                                               <i class="fa fa-fw fa-exclamation-triangle text-warning"></i>
                                           </div>
                                           <div class="media-body pr-10">
                                               <p class="mb-0">Please check your payment info since we can’t validate them!</p>
                                               <div class="text-muted font-size-sm font-italic">50 min ago</div>
                                           </div>
                                       </a>
                                   </li>
                                   <li>
                                       <a class="text-body-color-dark media mb-15" href="javascript:void(0)">
                                           <div class="ml-5 mr-15">
                                               <i class="fa fa-fw fa-times text-danger"></i>
                                           </div>
                                           <div class="media-body pr-10">
                                               <p class="mb-0">Web server stopped responding and it was automatically restarted!</p>
                                               <div class="text-muted font-size-sm font-italic">4 hours ago</div>
                                           </div>
                                       </a>
                                   </li>
                                   <li>
                                       <a class="text-body-color-dark media mb-15" href="javascript:void(0)">
                                           <div class="ml-5 mr-15">
                                               <i class="fa fa-fw fa-exclamation-triangle text-warning"></i>
                                           </div>
                                           <div class="media-body pr-10">
                                               <p class="mb-0">Please consider upgrading your plan. You are running out of space.</p>
                                               <div class="text-muted font-size-sm font-italic">16 hours ago</div>
                                           </div>
                                       </a>
                                   </li>
                                   <li>
                                       <a class="text-body-color-dark media mb-15" href="javascript:void(0)">
                                           <div class="ml-5 mr-15">
                                               <i class="fa fa-fw fa-plus text-primary"></i>
                                           </div>
                                           <div class="media-body pr-10">
                                               <p class="mb-0">New purchases! +$250</p>
                                               <div class="text-muted font-size-sm font-italic">1 day ago</div>
                                           </div>
                                       </a>
                                   </li>
                               </ul>
                               <div class="dropdown-divider"></div>
                               <a class="dropdown-item text-center mb-0" href="javascript:void(0)">
                                   <i class="fa fa-flag mr-5"></i> View All
                               </a>
                           </div>
                       </div>
                       <!-- END Notifications -->

                       <!-- Toggle Side Overlay -->
                       <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                       <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="side_overlay_toggle">
                           <i class="fa fa-tasks"></i>
                       </button>
                       <!-- END Toggle Side Overlay -->
                   </div>
                   <!-- END Right Section -->
               </div>
               <!-- END Header Content -->

               <!-- Header Search -->
               <div id="page-header-search" class="overlay-header">
                   <div class="content-header content-header-fullrow">
                       <form action="be_pages_generic_search.html" method="post">
                           <div class="input-group">
                               <div class="input-group-prepend">
                                   <!-- Close Search Section -->
                                   <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                   <button type="button" class="btn btn-secondary" data-toggle="layout" data-action="header_search_off">
                                       <i class="fa fa-times"></i>
                                   </button>
                                   <!-- END Close Search Section -->
                               </div>
                               <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                               <div class="input-group-append">
                                   <button type="submit" class="btn btn-secondary">
                                       <i class="fa fa-search"></i>
                                   </button>
                               </div>
                           </div>
                       </form>
                   </div>
               </div>
               <!-- END Header Search -->

               <!-- Header Loader -->
               <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
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
