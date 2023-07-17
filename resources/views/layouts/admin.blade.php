<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/dashboard.css')

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min-dashboard-5.0.2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dir-ltr.css') }}">

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets-admin/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets-admin/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/7b5e9f3ec6.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets-admin/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <script src="{{ asset('js/flasher.min.js') }}"></script>
    <link id="pagestyle" href="{{ asset('assets-admin/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />


    <style type="text/css">
        html {
            --background-0: #eef4f5;
            --background-1: #fff;
            --background-aside: #11233b;
            --background-active-link: #141e2e;
            --background-form-control-focus: #161d26;
            --color-1: #fff;
            --color-2: #575f66;
            --border-color: #f1f1f1;
            --bs-table-hover-color: #f7f7f7 !important;
        }


        .nav-link.active {
            color: #38b59c !important;
        }
    </style>
    @php
        $page_title = 'Dashboard';
    @endphp
    @include('seo.index')
    @livewireStyles
    @yield('styles')
    @if (auth()->check())
        @php
            if (session('seen_notifications') == null) {
                session(['seen_notifications' => 0]);
            }
            $notifications = auth()
                ->user()
                ->notifications()
                ->orderBy('created_at', 'DESC')
                ->limit(50)
                ->get();
            $unreadNotifications = auth()
                ->user()
                ->unreadNotifications()
                ->count();
        @endphp
    @endif
    @if ($settings['dashboard_dark_mode'] == '1')
        <style type="text/css">
            html {

                --background-0: #131923;
                --background-1: #1c222b;
                --background-aside: #11233b;
                --background-active-link: #141e2e;
                --background-form-control-focus: #161d26;

                --color-1: #fff;
                --color-2: #f1f1f1;
                --border-color: #282b2f;
                --bs-table-hover-color: #f7f7f7 !important;
            }

            .select2-dropdown,
            .select2-container--default .select2-selection--multiple,
            .select2-container--default .select2-selection--multiple .select2-selection__choice {
                background-color: var(--background-0) !important;
            }

            td,
            th {
                border-color: var(--border-color) !important;
            }

            .aside {
                background: #171f2a !important;
            }

            .aside * {
                color: var(--color-1) !important;
            }

            .aside .item-container.active {
                background: #192230 !important;
                box-shadow: 0px 12px 17px #101d30 !important;
                border-bottom: unset !important;
            }

            .aside .item-container.active * {
                color: #38b59c !important;
            }

            .sub-item.active a.active *,
            .sub-item.active a.active {
                color: #38b59c !important;
            }

            #home-dashboard-divider {
                background: #0194fe !important;
            }

            body {
                color: var(--color-1) !important;
                background: #131923 !important;
            }

            .main-box-wedit {
                box-shadow: unset;
                border-radius: 10px 25px 10px 25px;
                background: #1c222b !important;
            }

            .main-box {
                background: #1c222b !important;
                box-shadow: unset !important;
            }

            .btn {
                color: var(--color-2) !important;
            }

            table {
                color: var(--color-2) !important;
                border-color: var(--border-color) !important;
            }

            thead th {
                border-color: var(--border-color) !important;
            }

            .table-hover>tbody>tr:hover {}

            *,
            .dropdown-item {
                color: var(--color-1);
            }

            .dropdown-menu {
                background-color: var(--background-1) !important;
            }

            .dropdown-item:focus,
            .dropdown-item:hover {
                color: var(--color-1);
                background-color: var(--background-2) !important;
            }

            *[class*='border-'] {
                border-color: var(--border-color) !important;
            }

            hr {
                background: var(--border-color);
            }

            .form-control {
                background: rgb(39 38 37 / 20%);
                border-color: #8c6934;
            }

            .form-control {
                background: var(--background-1);
                border-color: var(--border-color);
            }

            .form-control:focus {
                box-shadow: unset !important;
                border: 1px solid #ff9800 !important;
                background: #0e0d0c !important;
            }

            /*.form-control:focus {
            box-shadow: unset!important;
            border: 1px solid var(--border-color)!important;
            background: var(--background-form-control-focus)!important;
        }*/
            .form-control,
            .form-control:focus {
                color: var(--color-1);
            }

            .settings-tab-opener.active,
            .settings-tab-opener {
                box-shadow: unset !important;
            }
        </style>
    @endif
</head>

<body style="background: #eef4f5; overflow-x: hidden;" class="dash g-sidenav-show   bg-gray-100 ">

    <div style="position:fixed;top:0;bottom:0;left:0;right:0;display: flex;align-items: center;justify-content: center;width: 100%;height: 100vh;background: var(--background-1);z-index: 10000;"
        id="loading-image-container">
        <img src="/images/loading.gif" style="position:fixed;width: 120px;max-width: 80%;margin-top: -60px;"
            id="loading-image">
    </div>

    <div class="min-height-300 bg-primary position-absolute w-100"></div>

    <style type="text/css">
        #toast-container>div {
            opacity: 1;
        }

        .phpdebugbar * {
            direction: ltr !important
        }

        #notificationDropdown .dropdown-menu.dropdown-menu-end {
            right: 25% !important;
        }

        #notificationDropdown a.dropdown-item span {
            padding-right: 10px;
        }
    </style>
    @yield('after-body')
    <div class="col-12 justify-content-end d-flex">
        @if ($errors->any())
            <div class="col-12" style="position: absolute;top: 80px;left: 10px;">
                {!! implode(
                    '',
                    $errors->all(
                        '<div class="alert-click-hide alert alert-danger alert alert-danger col-9 col-xl-3 rounded-0 mb-1" style="position: fixed!important;z-index: 11;opacity:.9;left:25px;cursor:pointer;" onclick="$(this).fadeOut();">:message</div>',
                    ),
                ) !!}
            </div>
        @endif
    </div>
    @php
        $plugins = Module::allEnabled();
    @endphp
    <form method="POST" action="{{ route('logout') }}" id="logout-form" class="d-none">@csrf</form>


    <aside
        class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="{{ url('admin') }}" target="_blank">
                <img src="{{ asset('assets-admin/img/logo-ct-dark.png') }}" class="navbar-brand-img h-100"
                    alt="main_logo">
                <span class="ms-1 font-weight-bold">Diamond Dashboard</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <div class="col-12 px-0 pb-4 text-center justify-content-center align-items-center ">
                        <a href="{{ route('admin.profile.edit') }}">

                            <img src="{{ auth()->user()->getUserAvatar() }}"
                                style="width: 80px;height: 80px;color: var(--background-1);border-radius: 50%"
                                class="d-inline-block">
                        </a>
                        <div class="col-12 px-0 mt-2 text-center" style="">
                            welcome {{ auth()->user()->name }}
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.index') ? 'active' : '' }}"
                        href="{{ route('admin.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>

                @can('roles-read')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}"
                            href="{{ route('admin.roles.index') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-key-25 text-warning text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Roles</span>
                        </a>
                    </li>
                @endcan

                @can('users-read')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}"
                            href="{{ route('admin.users.index') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <span class="fal fa-users text-success font-2"> </span>
                            </div>
                            <span class="nav-link-text ms-1">Managers</span>
                        </a>
                    </li>
                @endcan

                <!--- Start Plugins -->
                {{-- @foreach ($plugins as $plugin)
                        @if ($plugin->get('type') == 'main')
                            @can($plugin->get('route') . '-read')
                            <div class="nav-item ">

                                <a href="{{ route('admin.' . $plugin->get('route') . '.index') }}" class="nav-link">
                                    <div style="width: 50px" class="px-3 text-center">
                                        <span class="{{ $plugin->get('icon') }} font-2"> </span>
                                    </div>
                                    <span class="nav-link-text ms-1">{{ $plugin->get('title') }}</span>
                                </a>
                              </div>
                            @endcan
                        @endif
                    @endforeach --}}

                <!--- End Plugins -->


                <!-- Start Content--->
                <li class="container nav-item py-3 ">
                    <div class="nav-item px-0" style="cursor: pointer;">
                        <div class="nav-item active">
                            <div class="nav-item d-flex px-0 item-container active">
                                <div style="width: 50px" class="px-3 text-center">
                                    <span class="fal fa-newspaper font-2"> </span>
                                </div>
                                <div style="width: calc(100% - 50px)" class="px-2 item-container-title has-sub-menu ">
                                    Content
                                </div>
                            </div>
                            <div class="nav-item px-0 ">
                                <ul class="sub-item font-1  {{ request()->routeIs(['admin.categories.*', 'admin.articles.*', 'admin.article-comments.*', 'admin.announcements.*', 'admin.pages.*', 'admin.menus.*', 'admin.redirections.*', 'admin.faqs.*', 'admin.tags.*']) ? 'active' : '' }}"
                                    style="list-style:none;">

                                    {{-- @can('categories-read')
                                        <li><a class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}"
                                                href="{{ route('admin.categories.index') }}" style="font-size: 16px;"><span
                                                    class="fal fa-tag px-2" style="width: 28px;font-size: 15px;"></span>
                                                Categories</a></li>
                                    @endcan --}}


                                    @can('articles-read')
                                        <li><a class="nav-link {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}"
                                                href="{{ route('admin.articles.index') }}" style="font-size: 16px;"><span
                                                    class="fal fa-book px-2" style="width: 28px;font-size: 15px;"></span>
                                                News</a></li>
                                    @endcan

                                    {{-- @can('comments-read')
                                        <li><a class="nav-link {{ request()->routeIs('admin.article-comments.*') ? 'active' : '' }}"
                                                href="{{ route('admin.article-comments.index') }}"
                                                style="font-size: 16px;"><span class="fal fa-comments px-2"
                                                    style="width: 28px;font-size: 15px;"></span> Comments
                                                @php
                                                    $article_comments = \App\Models\ArticleComment::where('reviewed', 0)->count();
                                                @endphp
                                                @if ($article_comments)
                                                    <span
                                                        style="background: #d34339;border-radius: 2px;color:var(--background-1);display: inline-block;font-size: 11px;text-align: center;padding: 1px 5px;margin: 0px 8px">{{ $article_comments }}</span>
                                                @endif

                                            </a></li>
                                    @endcan --}}


                                    {{-- @can('announcements-read')
                                        <li><a class="nav-link {{ request()->routeIs('admin.announcements.*') ? 'active' : '' }}"
                                                href="{{ route('admin.announcements.index') }}"
                                                style="font-size: 16px;"><span class="fal fa-bullhorn px-2"
                                                    style="width: 28px;font-size: 15px;"></span> Ads
                                            </a></li>
                                    @endcan --}}


                                    @can('pages-read')
                                        <li><a class="nav-link {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}"
                                                href="{{ route('admin.pages.index') }}" style="font-size: 16px;"><span
                                                    class="fal fa-file-invoice px-2"
                                                    style="width: 28px;font-size: 15px;"></span> Pages
                                            </a></li>
                                    @endcan

                                    {{-- @can('menus-read')
                                        <li><a class="nav-link {{ request()->routeIs('admin.menus.*') ? 'active' : '' }}"
                                                href="{{ route('admin.menus.index') }}" style="font-size: 16px;"><span
                                                    class="fal fa-list px-2" style="width: 28px;font-size: 15px;"></span>
                                                Menus
                                            </a></li>
                                    @endcan --}}


                                    {{-- @can('faqs-read')
                                        <li><a class="nav-link {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}"
                                                href="{{ route('admin.faqs.index') }}" style="font-size: 16px;"><span
                                                    class="fal fa-question px-2"
                                                    style="width: 28px;font-size: 15px;"></span>Questions
                                            </a></li>
                                    @endcan --}}


                                    


                                    {{-- @can('tags-read')
                                        <li><a class="nav-link {{ request()->routeIs('admin.tags.*') ? 'active' : '' }}"
                                                href="{{ route('admin.tags.index') }}" style="font-size: 16px;"><span
                                                    class="fal fa-tags px-2" style="width: 28px;font-size: 15px;"></span>
                                                Tags
                                            </a></li>
                                    @endcan --}}



                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <!-- End Content--->

                @can('redirections-read')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.redirections.*') ? 'active' : '' }}"
                            href="{{ route('admin.redirections.index') }}"
                            style="font-size: 16px;">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <span class="fal fa-directions px-0" style="width: 28px;font-size: 15px;"></span>
                            </div>
                            Redirections
                        </a>
                    </li>
                @endcan


                @can('contacts-read')
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('admin.contacts.index') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-notification-70 text-danger text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Contact Us
                                @php
                                    $contacts_count = \App\Models\Contact::where('status', 'PENDING')->count();
                                @endphp
                                @if ($contacts_count)
                                    <span
                                        style="background: #d34339;border-radius: 2px;color:#fff;display: inline-block;font-size: 11px;text-align: center;padding: 1px 5px;margin: 0px 8px">{{ $contacts_count }}</span>
                                @endif
                            </span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('admin.career.index') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-solid fa-file-pdf text-secondary text-sm"></i>
                            </div>
                            <span class="nav-link-text ms-1">Career (CV)
                                @php
                                    $career_count = \App\Models\CareerForm::where('status', 'PENDING')->count();
                                @endphp
                                @if ($career_count)
                                    <span
                                        style="background: #d34339;border-radius: 2px;color:#fff;display: inline-block;font-size: 11px;text-align: center;padding: 1px 5px;margin: 0px 8px">{{ $career_count }}</span>
                                @endif
                            </span>
                        </a>
                    </li>
                @endcan

                @can('settings-update')
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('admin.settings.index') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-settings text-dark text-sm"></i>
                            </div>
                            <span class="nav-link-text ms-1">Settings</span>
                        </a>
                    </li>
                @endcan


                {{-- @can('plugins-read')
                    <div class="nav-item px-0" style="cursor: pointer;">
                        <div class="col-12 item px-0 d-flex row ">
                            <div class="col-12 d-flex px-0 item-container">
                                <div style="width: 50px" class="px-3 text-center">
                                    <span class="far fa-box-open font-2" style="color:#ff9800"> </span>
                                </div>
                                <div style="width: calc(100% - 50px)" class="px-2 item-container-title has-sub-menu">
                                    الاضافات
                                </div>
                            </div>
                            <div class="col-12 px-0">
                                <ul class="sub-item font-1" style="list-style:none;">

                                    @can('plugins-read')
                                        <li><a href="{{ route('admin.plugins.index') }}" style="font-size: 16px;"><span
                                                    class="fal fa-box-open px-2"
                                                    style="width: 28px;font-size: 15px;"></span> كل الاضافات

                                                @if (count($plugins))
                                                    <span
                                                        style="background: #d34339;border-radius: 2px;color:var(--background-1);display: inline-block;font-size: 11px;text-align: center;padding: 1px 5px;margin: 0px 8px">{{ count($plugins) }}</span>
                                                @endif


                                            </a></li>
                                    @endcan


                                    @foreach ($plugins as $plugin)
                                        @if ($plugin->get('type') == 'plugin')
                                            @can($plugin->get('route') . '-read')
                                                <li><a href="{{ route('admin.teams.index') }}"
                                                        style="font-size: 16px;"><span
                                                            class="{{ $plugin->get('icon') }} px-2"
                                                            style="width: 28px;font-size: 15px;"></span>
                                                        {{ $plugin->get('title') }}
                                                    </a></li>
                                            @endcan
                                        @endif
                                    @endforeach


                                </ul>
                            </div>
                        </div>
                    </div>
                @endcan --}}


                <li class="nav-item">
                    <a class="nav-link " onclick="document.getElementById('logout-form').submit();" href="#">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <span class="fal fa-sign-out-alt text-warning text-sm opacity-10 font-2"> </span>
                        </div>
                        <span class="nav-link-text ms-1">Logout</span>
                    </a>
                </li>
            </ul>
        </div>

    </aside>



    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        {{-- <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search"
                                    aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="Type here...">
                        </div> --}}
                    </div>
                    <ul class="navbar-nav  justify-content-end">

                        <li class="nav-item dropdown pe-2 d-flex align-items-center" id="notificationDropdown">
                            <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ auth()->user()->getUserAvatar() }}"
                                    style="padding: 10px;border-radius: 50%;width: 55px;height: 55px;">
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4 shadow border-0"
                                aria-labelledby="dropdownMenuButton1" style="top: -1px">
                                <li><a class="dropdown-item font-1" href="/" target="_blank"><span
                                            class="fal fa-desktop font-1"></span>View Website</a></li>
                                <li><a class="dropdown-item font-1" href="{{ route('admin.profile.index') }}"><span
                                            class="fal fa-user font-1"></span> My Profile </a></li>

                                <li><a class="dropdown-item font-1" href="{{ route('admin.profile.edit') }}"><span
                                            class="fal fa-edit font-1"></span>Edit My Profile</a></li>




                                @can('hub-files-read')
                                    <li><a class="dropdown-item font-1" href="{{ route('admin.files.index') }}"><span
                                                class="fal fa-file font-1"></span> Files </a></li>
                                @endcan


                                @can('traffics-read')
                                    <li><a class="dropdown-item font-1" href="{{ route('admin.traffics.index') }}"><span
                                                class="fal fa-traffic-light font-1"></span> Traffic </a></li>
                                @endcan

                                @can('error-reports-read')
                                    <li><a class="dropdown-item font-1"
                                            href="{{ route('admin.traffics.error-reports') }}"><span
                                                class="fal fa-bug font-1"></span>Error Reports</a></li>
                                @endcan

                                <li>
                                    <hr style="height: 1px;margin: 10px 0px 5px;">
                                </li>
                                <li><a class="dropdown-item font-1" href="#"
                                        onclick="document.getElementById('logout-form').submit();"><span
                                            class="fal fa-sign-out-alt font-1"></span> Logout </a></li>
                            </ul>
                        </li>


                        <!-- Start Icon in Phone Screeen to start Sidebare -->
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                </div>
                            </a>
                        </li>
                        <!-- End Icon in Phone Screeen to start Sidebare -->

                        @can('settings-update')
                            <li class="nav-item px-3 d-flex align-items-center">
                                <a href="javascript:;" class="nav-link text-white p-0">
                                    <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                                </a>
                            </li>
                        @endcan

                        <!--- Start Notification Static -->
                        {{-- <li class="nav-item dropdown pe-2 d-flex align-items-center" id="notificationDropdown">
                            <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell cursor-pointer"></i>
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                                aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="{{ asset('assets-admin/img/team-2.jpg') }}"
                                                    class="avatar avatar-sm  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New message</span> from Laur
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    13 minutes ago
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="{{ asset('assets-admin/img/small-logos/logo-spotify.svg') }}"
                                                    class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New album</span> by Travis Scott
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    1 day
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                                <svg width="12px" height="12px" viewBox="0 0 43 36"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>credit-card</title>
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g transform="translate(-2169.000000, -745.000000)"
                                                            fill="#FFFFFF" fill-rule="nonzero">
                                                            <g transform="translate(1716.000000, 291.000000)">
                                                                <g transform="translate(453.000000, 454.000000)">
                                                                    <path class="color-background"
                                                                        d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                        opacity="0.593633743"></path>
                                                                    <path class="color-background"
                                                                        d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    Payment successfully completed
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    2 days
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}
                        <!--- End Notification Static -->




                        <!--- Start Notification Dynamic -->
                        {{-- <div data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" class="nav-item dropdown pe-2 d-flex align-items-center" id="notificationDropdown">

                            <div class=" px-0 d-flex justify-content-center align-items-center"
                                style="cursor: pointer;" data-bs-toggle="dropdown" aria-expanded="false"
                                id="dropdown-notifications">
                                <span class="fal fa-bell font-3 d-inline-block"
                                    style="color: var(--color-2);transform: rotate(15deg)"></span>
                                <span
                                    style="position: absolute;min-width: 15px;min-height: 15px;
                                @if ($unreadNotifications != 0) display: inline-block;
                                @else
                                display: none; @endif
                                right: 0px;top: 0px;border-radius: 20px;background: #c00;color:#fff;font-size: 14px;"
                                    class="text-center"
                                    id="dropdown-notifications-icon">{{ $unreadNotifications }}</span>

                            </div>

                            
                        </div> --}}
                        <!--- End Notification Dynamic -->



                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid">

            @yield('content')

            {{-- <footer class="footer pt-3  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                made with <i class="fa fa-heart"></i> by
                                <a href="https://www.creative-tim.com" class="font-weight-bold"
                                    target="_blank">Creative Tim</a>
                                for a better web.
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com" class="nav-link text-muted"
                                        target="_blank">Creative Tim</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                        target="_blank">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                        target="_blank">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                        target="_blank">License</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer> --}}

        </div>
    </main>


    @vite('resources/js/dashboard.js')

    <!--- Start Notification Dynamic -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Notifications</h5>
            <button type="button" class="btn-close text-dark" data-bs-dismiss="offcanvas" aria-label="Close">
                {{-- <i class="fa fa-close py-2"> </i> --}}
            </button>
        </div>
        <div class="offcanvas-body">

            <div>
                <div class="col-12 notifications-container" style="height:406px;overflow: auto;">
                    <x-notifications :notifications="$notifications" />
                </div>
                <div class="col-12 d-flex border-top">
                    <a href="{{ route('admin.notifications.index') }}" class="d-block py-2 px-3 ">
                        <div class="col-12 align-items-center">
                            <span class="fal fa-bells"></span> View all notifications
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
    <!--- End Notification Dynamic -->


    <!-- Start Setting Dashboard Color --->
    @can('settings-update')
        <div class="fixed-plugin">
            <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
                <i class="fa fa-cog py-2"> </i>
            </a>
            <div class="card shadow-lg">
                <div class="card-header pb-0 pt-3 ">
                    <div class="float-start">
                        <h5 class="mt-3 mb-0">Setting Dashboard Color</h5>

                    </div>
                    <div class="float-end mt-4">
                        <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                            <i class="fa fa-close"></i>
                        </button>
                    </div>
                    <!-- End Toggle Button -->
                </div>
                <hr class="horizontal dark my-1">
                <div class="card-body pt-sm-3 pt-0 overflow-auto">
                    <!-- Sidebar Backgrounds -->
                    {{-- <div>
                        <h6 class="mb-0">Sidebar Colors</h6>
                    </div>
                    <a href="javascript:void(0)" class="switch-trigger background-color">
                        <div class="badge-colors my-2 text-start">
                            <span class="badge filter bg-gradient-primary active" data-color="primary"
                                onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-dark" data-color="dark"
                                onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-info" data-color="info"
                                onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-success" data-color="success"
                                onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-warning" data-color="warning"
                                onclick="sidebarColor(this)"></span>
                            <span class="badge filter bg-gradient-danger" data-color="danger"
                                onclick="sidebarColor(this)"></span>
                        </div>
                    </a> --}}


                    {{-- <hr class="horizontal dark my-sm-4"> --}}
                    <div class="mt-2 mb-5 d-flex">
                        <h6 class="mb-0">Light / Dark</h6>
                        <div class="form-check form-switch ps-0 ms-auto my-auto">
                            <input class="form-check-input mt-1 ms-auto"
                                {{ $settings['dashboard_dark_mode'] == '1' ? 'checked' : '' }} type="checkbox"
                                id="dark-version">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endcan
    <!-- End Setting Dashboard Color --->



    @livewireScripts
    @include('layouts.scripts')
    @yield('scripts')
    @stack('scripts')

    @if ($settings['dashboard_dark_mode'] == 1)
        <script>
            darkMode(document.getElementById('dark-version'));
        </script>
        <style>
            .dark-version .sidenav.bg-white {
                background: #111C44 !important;
            }

            /* .navbar-vertical .navbar-nav>.nav-item .nav-link.active {
                color: #344767 !important;
                background-color: rgba(255, 255, 255, 0.13) !important
            } */

            .dark-version .offcanvas {
                background-color: #111c44 !important
            }

            .dark-version .fixed-plugin .fixed-plugin-button i {
                color: #111c44 !important
            }
        </style>
    @endif

    @can('settings-update')
        <script type="module">
            $('#dark-version').on('change',function(){
                setTimeout(function(){
                    $('#loading-image-container').show();
                },500);
                darkMode(this);
                $.ajax({
                method: "PUT",
                url: "{{route('admin.settings.updateDashboardColor')}}",
                data: { _token: "{{csrf_token()}}", dashboard_dark_mode: this.getAttribute("checked") }
                }).done(function(res){
                    if(res.dashboard_dark_mode=="1"){ 
                        location.reload();
                    }
                    else{
                        location.reload();
                    }
                });
            });
        </script>
    @endcan


</body>

</html>
